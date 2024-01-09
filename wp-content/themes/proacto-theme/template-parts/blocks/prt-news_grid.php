<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

global $wp;

$current_url = home_url(add_query_arg(array(), $wp->request));

$categories = get_categories(array(
	'hide_empty' => true, // Set this to true to hide categories without posts
));

$args = array(
	'post_type'      => 'post', // Change to your desired post type
	'posts_per_page' => 9,      // Number of posts to show
	'orderby'        => 'date', // Order by post date
	'order'          => 'DESC', // Use 'ASC' for ascending order
);
// Check if term_id is set and add it to the query
$current_id = 0;
if (!empty($_GET['term_id']) && is_numeric($_GET['term_id'])) {
	$current_id = $_GET['term_id'];
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'category',  // Change to your desired taxonomy
			'field'    => 'term_id',
			'terms'    => $_GET['term_id'],
		),
	);
}

$posts = new WP_Query($args);

?>

<section class="<?php echo  esc_attr($className)?> news_grid">
	<div class="container">
		<div class="news_grid-categories">
			<?php foreach ($categories as $term): ?>
				<a class="choise-chips <?php echo $current_id==$term->term_id ? 'active' : '' ?>"
				   href="<?= $current_url . '?term_id=' . $term->term_id ?>"
				>
					<?= $term->name ?>
				</a>
			<?php endforeach; ?>
		</div>
		<div class="news_grid-posts">
			<?php while ($posts->have_posts()) : $posts->the_post(); ?>
				<?php
				$post_id = get_the_ID();
                if(has_post_thumbnail()) {
	                $thumbnail_url = get_the_post_thumbnail_url();
	                $thumbnail_alt = get_the_post_thumbnail_caption();
                } else {
	                $thumbnail_url = get_template_directory_uri() . '/assets/img/icons/new-thumb.png';
	                $thumbnail_alt = 'fingerprint';
                }
				$title = get_the_title();
				$url = get_the_permalink();
				$date = get_the_date();
				$options = get_field('news_options', $post_id);
				$text = $options['short_text'];
				$term = get_the_terms($post_id, 'category')[0];
				$options = get_field('category_options','category_' . $term->term_id);

				?>
				<div class="post_card">
                    <div class="post_card-img">
					    <img src="<?= esc_url( $thumbnail_url ) ?>" alt="<?= esc_attr($thumbnail_alt) ?>">
                    </div>
					<div class="post_card-content">
						<div class="post_card-meta">
							<div class="post_card-term body-1"
							     style="
								     border-color: <?= $options['main_color'] ?>;
								     color: <?= $options['main_color'] ?>;
								     background-color: <?= $options['secondary_color'] ?>;"
							>
								<?= $term->name ?>
							</div>
							<span class="post_card-date body-1">
								<?= $date ?>
							</span>
						</div>
						<div class="post_card_texts">
							<h3 class="heading heading-h3">
								<?= $title ?>
							</h3>
							<p class="body-1">
								<?= $text ?>
							</p>
						</div>
						<a href="<?= $url ?>" class="post_card-link secondary-button">
							<?= __('Читати далі', 'proacto') ?>
						</a>
					</div>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>
