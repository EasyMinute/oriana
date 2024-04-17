<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$structure = get_field('structure');
$president = $structure['card_president'];
$premiere = $structure['card_premiere_card_president'];
$cards = $structure['ministers'];
?>

<section class="<?php echo  esc_attr($className)?> structure">
    <div class="container">
        <h2 class="underlined heading-h2 title">
            <?= $structure['zagolovok'] ?>
        </h2>
        <div class="structure-cards">
            <div class="structure-card top">
                <img src="<?= esc_url( $president['image']['url'] ) ?>"
                     alt="<?= esc_attr( $president['image']['alt'] ) ?>">
                <div class="structure-card__texts">
                    <h3 class="body-2">
                        <?= $president['role'] ?>
                    </h3>
                    <p class="body-1">
                        <?= $president['name'] ?>
                    </p>
                </div>
            </div>
            <div class="structure-card top">
                <img src="<?= esc_url( $premiere['image']['url'] ) ?>"
                     alt="<?= esc_attr( $premiere['image']['alt'] ) ?>">
                <div class="structure-card__texts">
                    <h3 class="body-2">
				        <?= $premiere['role'] ?>
                    </h3>
                    <p class="body-1">
				        <?= $premiere['name'] ?>
                    </p>
                </div>
            </div>
            <div class="structure-cards__wrap">
                <?php foreach ($cards as $item): ?>
                    <?php $guy = $item['minister_card_president']; ?>
                    <div class="structure-card">
                        <img src="<?= esc_url( $guy['image']['url'] ) ?>"
                             alt="<?= esc_attr( $guy['image']['alt'] ) ?>">
                        <div class="structure-card__texts">
                            <h3 class="body-2">
				                <?= $guy['role'] ?>
                            </h3>
                            <p class="body-1">
				                <?= $guy['name'] ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>