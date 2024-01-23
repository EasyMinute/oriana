<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$news_slider = get_field('news_slider');

if ($news_slider['choose_news']) {
	$posts = $news_slider['news'];
} else {
	$posts = get_posts(array(
		'post_type' => 'post',
		'numberposts' => 5,
		'orderby' => 'date',
		'order' => 'DESC'
	));
}
?>

<section class="<?php echo  esc_attr($className)?> news_slider">
	<div class="container">
		<div class="news_slider-head underlined">
			<h2 class="heading-h2">
				<?= $news_slider['title'] ?>
			</h2>
			<div class="swiper-buttons">
				<button class="swiper-button swiper-button-next"></button>
				<button class="swiper-button swiper-button-prev"></button>
			</div>
		</div>
		<div class="news_slider-wrap swiper">
			<div class="swiper-wrapper">
				<?php foreach ( $posts as $post ) : ?>
					<?php
					setup_postdata($post);

					$post_id  = $post->ID;
					if(has_post_thumbnail($post)) {
						$thumbnail_url = get_the_post_thumbnail_url($post);
						$thumbnail_alt = get_the_post_thumbnail_caption($post);
					} else {
						$thumbnail_url = get_template_directory_uri() . '/assets/img/icons/new-thumb.png';
						$thumbnail_alt = 'fingerprint';
					}
					$title = get_the_title($post);
					$url = get_the_permalink($post);
					$date = get_the_date('d.m.Y', $post);
					$options = get_field('news_options', $post);
					$text = $options['short_text'];
					$term = get_the_terms($post_id, 'category')[0];
					$options = get_field('category_options','category_' . $term->term_id);

					?>
					<div class="swiper-slide">
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
					</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata() ?>
			</div>
		</div>
        <?php if($news_slider['button']['url']): ?>
            <a class="news_slider-button primary-button" href="<?= $news_slider['button']['url'] ?>">
                <?= $news_slider['button']['title'] ?>
            </a>
        <?php endif; ?>
	</div>
</section>