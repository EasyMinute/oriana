<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$entertainment = get_field('entertainment');
if ($entertainment['choose']) {
	$posts = $entertainment['posts'];
} else {
	$posts = get_posts(array(
		'post_type' => 'entertainment',
		'post_status' => 'publish',
		'posts_per_page' => -1,
	));
}
?>

<section class="<?php echo  esc_attr($className)?> prt-entertainment">
	<div class="container">
		<?php foreach ($posts as $post) : ?>
			<?php
			setup_postdata($post);
			$options = get_field('entertainment_options', $post);
			?>

			<div class="entertainment-card">
				<div class="entertainment-card-head">
					<div class="entertainment-card-titles">
						<h3 class="heading-h3">
							<?= get_the_title($post) ?>
						</h3>
						<?php if ($options['pay']): ?>
							<div class="tag-chip pay">
								<?= __('Платно', 'proacto') ?>
							</div>
						<?php else: ?>
							<div class="tag-chip free">
								<?= __('Безкоштовно', 'proacto') ?>
							</div>
						<?php endif; ?>
					</div>
					<p class="body-1">
						<?= $options['description'] ?>
					</p>
				</div>
				<div class="entertainment-card-main">
					<?php foreach ($options['grades'] as $grade) : ?>
			            <div class="entertainment-card-grade">
				            <h4 class="heading-h4">
					            <?= $grade['name'] ?>
					            <ul class="entertainment-card-schedule">
						            <?php foreach ($grade['schedule'] as $item): ?>
						                <li class="body-1"><?= $item['day'] ?></li>
							            <li class="body-2"><?= $item['time'] ?></li>
						            <?php endforeach; ?>
					            </ul>
				            </h4>
			            </div>
					<?php endforeach; ?>
				</div>
				<div class="entertainment-card-foot">
					<a href="<?= $options['url_fb'] ?>" class="fb-link icon-link">
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M9.09837 15.2008V8.63227H11.4141L11.7608 6.07238H9.0983V4.43801C9.0983 3.69686 9.31444 3.19181 10.4308 3.19181L11.8545 3.19117V0.901639C11.6083 0.870498 10.7631 0.800781 9.7799 0.800781C7.72709 0.800781 6.32169 1.99372 6.32169 4.18456V6.07238H4V8.63227H6.32169V15.2007H9.09837V15.2008Z" fill="#1D7A85"/>
						</svg>
						<?= $options['tutor'] ?>
					</a>
					<a href="tel:<?= $options['phone'] ?>" class="phone icon-link">
						<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12.8333 16.6668C9.43107 16.6623 6.16943 15.3089 3.76367 12.9031C1.35791 10.4973 0.00440993 7.23569 0 3.83343C0 2.81677 0.403868 1.84174 1.12276 1.12285C1.84165 0.403963 2.81667 9.52457e-05 3.83333 9.52457e-05C4.04862 -0.00154459 4.26354 0.0179938 4.475 0.0584285C4.67943 0.0886789 4.88039 0.13892 5.075 0.208429C5.21187 0.256453 5.33384 0.339373 5.42884 0.448989C5.52384 0.558604 5.58858 0.691119 5.61667 0.833429L6.75833 5.83343C6.78911 5.96915 6.7854 6.11041 6.74755 6.24433C6.70971 6.37825 6.63892 6.50056 6.54167 6.60009C6.43333 6.71676 6.425 6.72509 5.4 7.25843C6.22083 9.05914 7.661 10.5052 9.45833 11.3334C10 10.3001 10.0083 10.2918 10.125 10.1834C10.2245 10.0862 10.3468 10.0154 10.4808 9.97754C10.6147 9.93969 10.7559 9.93599 10.8917 9.96676L15.8917 11.1084C16.0294 11.1404 16.1568 11.2069 16.2617 11.3016C16.3667 11.3964 16.4458 11.5163 16.4917 11.6501C16.562 11.8479 16.615 12.0514 16.65 12.2584C16.6835 12.4679 16.7003 12.6797 16.7 12.8918C16.6846 13.9041 16.2694 14.8692 15.545 15.5765C14.8205 16.2837 13.8457 16.6757 12.8333 16.6668Z" fill="#165C64"/>
						</svg>
						<?= $options['phone'] ?>
					</a>
				</div>
			</div>

		<?php endforeach; ?>
		<?php wp_reset_postdata() ?>
	</div>
</section>