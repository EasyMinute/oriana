<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$welcome = get_field('welcome');
?>

<section class="<?php echo  esc_attr($className)?> prt-welcome">
    <div class="container">
        <div class="prt-welcome__wrap">
            <img class="welcome__image" src="<?= esc_url( $welcome['image']['url'] ) ?>" alt="<?= esc_attr($welcome['image']['alt']) ?>">
            <div class="welcome__texts">
                <h2 class="underlined title heading-h2">
                    <?= $welcome['title'] ?>
                </h2>
                <p class="paragraph">
	                <?= $welcome['text'] ?>
                </p>
                <div class="welcome__socials">
                    <?php foreach($welcome['socials'] as $item): ?>
                        <a href="<?= $item['url'] ?>" target="_blank">
                            <img src="<?= esc_url( $item['icon']['url'] ) ?>" alt="<?= esc_attr($item['icon']['alt']) ?>">
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>