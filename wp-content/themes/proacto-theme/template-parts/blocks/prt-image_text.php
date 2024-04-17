<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$image_text = get_field('image_text');
?>

<section class="<?php echo  esc_attr($className)?> image_text">
	<div class="container">
        <div class="image_text__wrap">
            <div class="image_text__texts">
                <h2 class="underlined heading-h2">
                    <?= $image_text['title'] ?>
                </h2>
                <div class="paragraph">
                    <?= $image_text['text'] ?>
                </div>
            </div>
            <img src="<?= esc_url( $image_text['image']['url'] ) ?>" alt="<?= esc_attr( $image_text['image']['alt'] ) ?>">
        </div>
	</div>
</section>