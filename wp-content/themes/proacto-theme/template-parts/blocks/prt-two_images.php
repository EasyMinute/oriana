<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$two_images = get_field('two_images');
?>

<section class="<?php echo  esc_attr($className)?> two_images">
	<div class="container-small">
		<div class="two_images__wrap">
			<img src="<?= esc_url( $two_images['left_image']['url'] ) ?>"
			     alt="<?= esc_attr( $two_images['left_image']['alt'] ) ?>">
			<img src="<?= esc_url( $two_images['right_image']['url'] ) ?>"
			     alt="<?= esc_attr( $two_images['right_image']['alt'] ) ?>">
		</div>
	</div>
</section>