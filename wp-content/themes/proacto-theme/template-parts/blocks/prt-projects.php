<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$projects = get_field('projects');

$args = array(
	'post_type' => 'projects',
	'post_status' => 'publish',
	'posts_per_page' => -1, // Set to -1 to fetch all posts
	'meta_key' => 'project_options_date',
	'orderby' => 'meta_value',
	'order' => 'DESC', // Change to 'ASC' if you want ascending order
);

$query = new WP_Query( $args );
?>

<section class="<?php echo  esc_attr($className)?> projects">
	<div class="container">
		<div class="projects__header">
            <div class="projects__header__wrap">
                <button class="choise-chips active" data-target="all">
                    <?= __('Усі', 'proacto') ?>
                </button>
                <button class="choise-chips" data-target="teaser">
                    <?= __('Анонси', 'proacto') ?>
                </button>
                <button class="choise-chips" data-target="now">
                    <?= __('Тривають', 'proacto') ?>
                </button>
                <button class="choise-chips" data-target="finished">
                    <?= __('Заввум вершені', 'proacto') ?>
                </button>
            </div>
		</div>
		<div class="projects__list">
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php
					$post_id = get_the_ID();
					$options = get_field( 'project_options', $post_id );
					$title   = get_the_title();
					$date    = $options['date'];
					$chip_class =  $options['status']['value'];
					$status  =  $options['status']['label'];
					$text    =  $options['text'];
					$link    = get_the_permalink()
					?>
					<div class="project-card" data-target="<?= $chip_class ?>">
						<div class="project-card__header">
							<div class="tag-chip body-1 <?= $chip_class ?>">
								<?= $status ?>
							</div>
							<p class="date body-1">
								<?= $date ?>
							</p>
						</div>
						<h3 class="title heading-h3">
							<?= $title ?>
						</h3>
						<p class="text paragraph">
							<?= $text ?>
						</p>
						<a href="<?= $link ?>" class="link secondary-button long">
							<?= __('Переглянути детальніше', 'proacto') ?>
						</a>
					</div>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	</div>
</section>
