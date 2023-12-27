<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$block = get_field('masonry_gallery');
?>

<section class="<?php echo  esc_attr($className)?> prt-masonry_gallery">
	<div class="container">
		<h2 class="heading-h2 title-divider">
			<?= $block['title'] ?>
		</h2>
		<?php if ($block['gallery']): ?>
			<ul class="masonry_gallery-grid">
				<?php foreach($block['gallery'] as $item): ?>
					<li class="masonry_gallery-grid-item">
						<img src="<?= esc_url($item['photo']['url']) ?>" alt="<?= esc_attr($item['photo']['alt']) ?>">
                        <div class="masonry_gallery-grid-item-texts">
                            <h3 class="heading-h3">
                                <?= $item['title'] ?>
                            </h3>
                            <p class="body-1">
                                <?= $item['text'] ?>
                            </p>
                        </div>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ($block['button']['url']): ?>
			<a href="<?= $block['button']['url'] ?>" class="primary-button">
				<?= $block['button']['title'] ?>
			</a>
		<?php endif; ?>
	</div>
</section>