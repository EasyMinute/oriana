<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$accordeons = get_field('accordeons');
?>

<section class="<?php echo  esc_attr($className)?> prt-accordeons" >
	<div class="container-small">
		<?php foreach($accordeons as $item): ?>
			<div class="accordeons-card">
				<div class="accordeons-card__title">
					<h3 class="heading-h4">
						<?= $item['title'] ?>
					</h3>
				</div>
				<div class="accordeons-card__content body-1">
					<?= $item['text'] ?>
				</div>
			</div>

		<?php endforeach; ?>
	</div>
</section>
