<?php
if (is_singular('projects')) {
	$post_id = get_the_ID();
	$options = get_field( 'project_options', $post_id );
	$title   = get_the_title();
	$date    = $options['date'];
	$chip_class =  $options['status']['value'];
	$status =  $options['status']['label'];
} else {
	$post_id = get_the_ID();
	$title   = get_the_title();
	$date    = get_the_date();
	$term    = get_the_terms( $post_id, 'category' )[0];
	$options = get_field( 'category_options', 'category_' . $term->term_id );
}
?>

<section class="sp-header">
	<h1 class="heading-h2">
		<?= $title ?>
	</h1>
	<div class="sp-header-meta underlined">
		<div class="body-1 date">
			<?= $date ?>
		</div>
        <?php if (is_singular('projects')) : ?>
            <div class="tag-chip body-1 <?= $chip_class ?>">
		        <?= $status ?>
            </div>
        <?php else : ?>
            <div class="tag-chip body-1"
                 style="
                     border-color: <?= $options['main_color'] ?>;
                     color: <?= $options['main_color'] ?>;
                     background-color: <?= $options['secondary_color'] ?>;"
            >
                <?= $term->name ?>
            </div>
        <?php endif; ?>
	</div>
</section>
