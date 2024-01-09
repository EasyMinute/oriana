<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$short_baner = get_field('short_baner');
$title = !empty($short_baner['title']) ? $short_baner['title'] : get_the_title();
?>

<section class="<?php echo  esc_attr($className)?> short_baner">
	<div class="container">
		<h1 class="heading heading-h1 short_baner-title">
			<?= $title ?>
		</h1>
	</div>
</section>