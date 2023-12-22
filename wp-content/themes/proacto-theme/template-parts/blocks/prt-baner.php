<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
    $className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $className .= ' align' . $block['align'];
}

$baner = get_field('baner');
?>

<section class="<?php echo  esc_attr($className)?> prt-baner" style="background-image: url(<?php echo esc_url($baner['image']['url']) ?>);">
    <div class="container">
        <div class="prt-baner__wrap" >
            <h1 class="heading-h1">
                <?= $baner['title'] ?>
            </h1>
            <p class="subheading">
                <?= $baner['subtitle'] ?>
            </p>
        </div>
    </div>
</section>
