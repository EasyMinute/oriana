<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$graduates = get_field('graduates');

if ($graduates['choose']) {
	$terms = $graduates['years'];
} else {
	$terms = get_terms( array(
		'taxonomy'   => 'graduates_years',
		'hide_empty' => true,
	) );
}

$args = array(
	'post_type' => 'graduates', // Custom post type
	'posts_per_page' => -1, // Number of posts to show, -1 for all posts
	'tax_query' => array(
		array(
			'taxonomy' => 'graduates_years', // Replace with your taxonomy name
			'field'    => 'term_id',
			'terms'    => $terms[0]->term_id,
		),
	),
);

$query = new WP_Query($args);

?>

<section class="<?php echo  esc_attr($className)?> graduates">
	<div class="container">
		<div class="graduates__header">
			<h3 class="heading-h3">
				<?= get_the_title() ?>
			</h3>
			<?php if(!empty($terms)) : ?>
				<div class="default-dropdown">
					<button class="default-dropdown__opener body-1">
						<?= $terms[0]->name ?>
					</button>
					<ul class="default-dropdown__list">
						<?php foreach($terms as $term) : ?>
							<li class="body-1" data-cat="<?= $term->term_id ?>">
								<?= $term->name ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
		<div class="graduates__wrap" id="graduates_response" data-url="<?= admin_url('admin-ajax.php'); ?>">
			<?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : ?>
                    <?php
					$query->the_post();
					$id = get_the_ID();
					$title = get_the_title();
					if (has_post_thumbnail()) {
						$img_url = esc_url(get_the_post_thumbnail_url());
						$img_alt = esc_attr(get_the_post_thumbnail_caption());
					} else {
						$img_url = false;
					}

					$options = get_field('graduate_options', $id);
					?>

					<div class="graduates_card">
						<div class="graduates_card__header underlined">
							<h3 class="heading-h3">
								<?= $title ?>
							</h3>
							<p class="body-1">
								<?= __('Класний керівник: ', 'proacto') . $options['teacher'] ?>
							</p>
						</div>
						<?php if ($img_url): ?>
							<img class="graduates_card__img" src="<?= $img_url ?>" alt="<?= $img_alt ?>">
						<?php endif; ?>

						<?php if(!empty($options['list'])): ?>
							<div class="accordeons-card graduates_card__list">
								<div class="accordeons-card__title">
									<h3 class="heading-h4">
										<?= __('Список випускників', 'proacto') ?>
									</h3>
								</div>
								<div class="accordeons-card__content body-1">
									<ol>
										<?php foreach ( $options['list'] as $item ) : ?>
											<li>
												<?= $item['item'] ?>
											</li>
										<?php endforeach; ?>
									</ol>
								</div>
							</div>
						<?php endif; ?>
					</div>

				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata() ?>
		</div>
	</div>
</section>
