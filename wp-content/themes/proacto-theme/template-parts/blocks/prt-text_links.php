<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$text_links = get_field('text_links');
?>

<section class="<?php echo  esc_attr($className)?> text_links">
	<div class="container-small">
		<div class="text_links__text paragraph">
			<?= $text_links['text'] ?>
		</div>
		<?php if(!empty($text_links['links'])): ?>
		<div class="text_links__links">
			<?php foreach ($text_links['links'] as $link): ?>
				<?php if ($link['type'] == 'file') : ?>
					<a href="<?= $link['file']['url'] ?>" class="link-card" download>
						<?php if($link['file_type'] == 'doc'): ?>
							<img src="<?= get_template_directory_uri() . '/assets/img/icons/Document.svg' ?>" alt="<?= __("Document", "proacto") ?>">
						<?php elseif($link['file_type'] == 'pdf'): ?>
                            <img src="<?= get_template_directory_uri() . '/assets/img/icons/PDF.svg' ?>" alt="<?= __("PDF", "proacto") ?>">
						<?php endif; ?>

                        <span class="body-2">
                            <?= $link['title'] ?>
                        </span>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.00016 1.33398C8.36835 1.33398 8.66683 1.63246 8.66683 2.00065V8.39118L10.1954 6.86258C10.4558 6.60223 10.8779 6.60223 11.1382 6.86258C11.3986 7.12293 11.3986 7.54504 11.1382 7.80539L8.47157 10.4721C8.21122 10.7324 7.78911 10.7324 7.52876 10.4721L4.86209 7.80539C4.60174 7.54504 4.60174 7.12293 4.86209 6.86258C5.12244 6.60223 5.54455 6.60223 5.8049 6.86258L7.3335 8.39118V2.00065C7.3335 1.63246 7.63197 1.33398 8.00016 1.33398ZM2.00016 9.33398C2.36835 9.33398 2.66683 9.63246 2.66683 10.0007V11.334C2.66683 11.7022 2.9653 12.0007 3.3335 12.0007H12.6668C13.035 12.0007 13.3335 11.7022 13.3335 11.334V10.0007C13.3335 9.63246 13.632 9.33398 14.0002 9.33398C14.3684 9.33398 14.6668 9.63246 14.6668 10.0007V11.334C14.6668 12.4386 13.7714 13.334 12.6668 13.334H3.3335C2.22893 13.334 1.3335 12.4386 1.3335 11.334V10.0007C1.3335 9.63246 1.63197 9.33398 2.00016 9.33398Z" fill="#444444"/>
                        </svg>
                    </a>
				<?php else: ?>
                    <a href="<?= $link['url'] ?>" class="link-card" target="_blank">
                        <img src="<?= get_template_directory_uri() . '/assets/img/icons/Link.svg' ?>" alt="<?= __("Link", "proacto") ?>">
                        <span class="body-2">
                            <?= $link['title'] ?>
                        </span>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.8 2H5C5.33137 2 5.6 2.26863 5.6 2.6C5.6 2.9077 5.36838 3.1613 5.06997 3.19596L5 3.2H3.8C3.4923 3.2 3.2387 3.43162 3.20404 3.73003L3.2 3.8V12.2C3.2 12.5077 3.43162 12.7613 3.73003 12.796L3.8 12.8H12.2C12.5077 12.8 12.7613 12.5684 12.796 12.27L12.8 12.2V11C12.8 10.6686 13.0686 10.4 13.4 10.4C13.7077 10.4 13.9613 10.6316 13.996 10.93L14 11V12.2C14 13.1586 13.2506 13.9422 12.3058 13.9969L12.2 14H3.8C2.84139 14 2.0578 13.2506 2.00306 12.3058L2 12.2V3.8C2 2.84139 2.74935 2.0578 3.69424 2.00306L3.8 2ZM13.4 2L13.4486 2.0018L13.5204 2.01214L13.5873 2.02984L13.6539 2.0562L13.7124 2.0876L13.7701 2.12767L13.8243 2.17574L13.8822 2.24282L13.9252 2.30956L13.9438 2.34614L13.9641 2.39501L13.9785 2.4404L13.9959 2.52914L14 2.6V6.2C14 6.53137 13.7314 6.8 13.4 6.8C13.0686 6.8 12.8 6.53137 12.8 6.2V4.0484L9.02426 7.82426C8.80797 8.04055 8.46764 8.05719 8.23226 7.87418L8.17574 7.82426C7.95945 7.60797 7.94281 7.26763 8.12582 7.03226L8.17574 6.97574L11.9504 3.2H9.8C9.46863 3.2 9.2 2.93137 9.2 2.6C9.2 2.26863 9.46863 2 9.8 2H13.4Z" fill="#444444"/>
                        </svg>
                    </a>
				<?php endif; ?>
			<?php endforeach ?>
		</div>
		<?php endif; ?>
	</div>
</section>