<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$contact_form = get_field('contact_form');
?>

<section class="<?php echo  esc_attr($className)?> contact_form">
	<div class="container">
		<div class="contact_form-wrap">
			<div class="contact_form-texts">
				<h2 class="heading-h2">
					<?= $contact_form['title'] ?>
				</h2>
				<p class="body-1">
					<?= $contact_form['text'] ?>
				</p>
			</div>
			<div class="contact_form-item">
				<?php echo do_shortcode('[contact-form-7 id="'. $contact_form["form"] .'"]') ?>
			</div>
		</div>
	</div>
</section>