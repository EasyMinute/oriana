<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$text_image = get_field('text_image');
$title = $text_image['title'];
$images = $text_image['images'];
$text = $text_image['text'];
$background = $text_image['background'];
?>

<section class="<?php echo  esc_attr($className) . ' ' . $background ?> text_image">
	<div class="container-small">
		<div class="text_image__head underlined">
			<h3 class="heading-h2">
				<?= $title ?>
			</h3>
		</div>
		<div class="text_image__wrap">
			<div class="text_image__text paragraph wysiwyg-container">
				<?= $text ?>
			</div>
			<?php if(!empty($images)): ?>
				<div class="text_image__images">
					<?php foreach ( $images as $image ) : ?>
                        <img src="<?= esc_url( $image['url'] ) ?>" alt="<?= esc_attr($image['alt']) ?>">
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

	</div>
</section>
