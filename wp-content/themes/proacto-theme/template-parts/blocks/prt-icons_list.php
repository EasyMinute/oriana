<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$block = get_field('icon_list');
?>

<section class="<?php echo  esc_attr($className)?> prt-icons_list">
    <div class="container">
        <div class="prt-icons_list-wrap">
            <h2 class="heading-h2">
                <?= $block['title'] ?>
            </h2>
            <?php if ($block['list']): ?>
                <ul class="icons_list-container">
                    <?php foreach ($block['list'] as $item): ?>
                        <li>
                            <img src="<?= esc_url( $item['icon']['url'] ) ?>" alt="<?= esc_attr($item['icon']['alt']) ?>">
                            <p class="body-1">
                                <?= $item['text'] ?>
                            </p>
                        </li>
                    <?php endforeach ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</section>
