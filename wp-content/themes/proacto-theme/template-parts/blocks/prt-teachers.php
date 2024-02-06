<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$terms = get_terms(array(
	'taxonomy' => 'information_category',
	'hide_empty' => true,
));


$args = array(
	'post_type'      => 'informations',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
);

$query = new WP_Query($args);

?>

<section class="<?php echo  esc_attr($className)?> teachers">
	<div class="container">
		<?php if(!empty($terms)) : ?>
			<div class="teachers__header">
				<div class="default-dropdown">
					<button class="default-dropdown__opener body-1">
						<?= __('Всі вчителі', 'proacto') ?>
					</button>
					<ul class="default-dropdown__list">
						<li class="body-1" data-cat="all">
							<?= __('Всі вчителі', 'proacto') ?>
						</li>
						<?php foreach($terms as $term) : ?>
							<li class="body-1" data-cat="<?= $term->term_id ?>">
								<?= $term->name ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		<?php endif; ?>
		<div class="teachers__wrap">
			<?php if ($query->have_posts()): ?>
				<?php while ($query->have_posts()): ?>
					<?php
					$query->the_post();
					$id = get_the_ID();
					$terms = get_the_terms($id, 'information_category');
					$term_id = !empty($terms) ? $terms[0]->term_id : '';
					$title = get_the_title();
					$role = get_field('teacher_options', $id)['role'];
					if (has_post_thumbnail()) {
						$img_url = esc_url(get_the_post_thumbnail_url());
						$img_alt = esc_attr(get_the_post_thumbnail_caption());
					} else {
						$img_url = get_template_directory_uri() . "/assets/img/static/teacher-thumb.png";
						$img_alt = __('вчитель', 'proacto');
					}

					?>

					<div class="teacher_card" data-cat="<?= $term_id ?>">
                        <figure>
						    <img src="<?= $img_url ?>" alt="<?= $img_alt ?>">
                        </figure>
						<h3 class="heading-h4 teacher_card__title">
                            <?= $title ?>
                        </h3>
                        <p class="body-1 teacher_card__role">
                            <?= $role ?>
                        </p>
					</div>

				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>
