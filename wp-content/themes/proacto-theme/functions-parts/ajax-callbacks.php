<?php
// Hook for handling AJAX request on the admin side
add_action('wp_ajax_filter_grads', 'filter_grads');

// Hook for handling AJAX request on the front-end
add_action('wp_ajax_nopriv_filter_grads', 'filter_grads');

function filter_grads() {
	$term_id = isset($_POST['id']) ? $_POST['id'] : '';
	$args = array(
		'post_type' => 'graduates', // Custom post type
		'posts_per_page' => -1, // Number of posts to show, -1 for all posts
		'tax_query' => array(
			array(
				'taxonomy' => 'graduates_years', // Replace with your taxonomy name
				'field'    => 'term_id',
				'terms'    => $term_id,
			),
		),
	);

	$query = new WP_Query($args); ?>

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
    <?php die(); ?>
<?php }