<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$photo_gallery = get_field('photo_gallery');
?>

<section class="<?php echo  esc_attr($className)?> photo_gallery">
    <div class="container-small">
        <div class="photo_gallery-head">
            <h3 class="heading-h3">
                <?= $photo_gallery['title'] ?>
            </h3>
            <div class="swiper-buttons">
                <button class="swiper-button swiper-button-next"></button>
                <button class="swiper-button swiper-button-prev"></button>
            </div>
        </div>
        <div class="photo_gallery-wrap swiper">
		<div class="swiper-wrapper">
			<?php foreach($photo_gallery['photo'] as $image): ?>
				<div class="swiper-slide">
					<img src="<?= esc_url( $image['url'] ) ?>" alt="<?= esc_attr( $image['alt'] ) ?>">
				</div>
			<?php endforeach; ?>
		</div>
	</div>
    </div>
</section>
