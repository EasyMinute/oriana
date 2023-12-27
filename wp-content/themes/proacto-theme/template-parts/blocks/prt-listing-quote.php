<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$block = get_field('listing-quote');
?>

<section class="<?php echo  esc_attr($className)?> prt-listing-quote">
	<div class="prt-listing-quote-wrap">
		<div class="left-part">
			<h2 class="heading-h2">
				<?= $block['title'] ?>
			</h2>
			<?php if ($block['list']) : ?>
				<ul class="mash-list">
					<?php foreach ($block['list'] as $item): ?>
						<li class="body-1">
							<?= $item['text'] ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>

		<div class="right-part">
			<h3 class="heading-h2">
				<?= $block['subtitle'] ?>
			</h3>
			<p class="body-1">
				<?= $block['text'] ?>
			</p>
		</div>
	</div>
</section>