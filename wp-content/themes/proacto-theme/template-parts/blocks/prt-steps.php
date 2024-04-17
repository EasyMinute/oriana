<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$steps = get_field('steps');
?>

<section class="<?php echo  esc_attr($className)?> prt-steps">
	<div class="container">
        <h2 class="underlined title heading-h2">
            <?= $steps['title'] ?>
        </h2>
        <div class="prt-steps__wrap">
            <?php foreach ($steps['list'] as $key => $item) : ?>
                <div class="step-card">
                    <p class="number heading-h2">
                        <?= $key + 1 ?>
                    </p>
                    <p class="heading-h3">
                        <?= $item['text'] ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>