<?php
//main class name for block
$className = 'default';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$className .= ' align' . $block['align'];
}

$where_contacts = get_field('where_contacts');
$contacts_admin = get_field('contacts_admin');
$contacts_waiting = get_field('contacts_waiting');
?>

<section class="<?php echo  esc_attr($className)?> prt-contacts" >
	<div class="container">
		<div class="contacts__wrap">
			<div class="contacts__part">
				<h3 class="heading-h2 underlined">
					<?= $where_contacts['title'] ?>
				</h3>
				<div class="contacts__item">
					<div class="contacts__subtitle">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M11.7292 21.5965C6.05352 13.3684 5 12.5239 5 9.5C5 5.35785 8.35785 2 12.5 2C16.6421 2 20 5.35785 20 9.5C20 12.5239 18.9465 13.3684 13.2708 21.5965C12.8983 22.1345 12.1016 22.1345 11.7292 21.5965ZM12.5 12.625C14.2259 12.625 15.625 11.2259 15.625 9.5C15.625 7.7741 14.2259 6.375 12.5 6.375C10.7741 6.375 9.375 7.7741 9.375 9.5C9.375 11.2259 10.7741 12.625 12.5 12.625Z" fill="#F79F79"/>
						</svg>
						<h4 class="heading-h3">
							<?= __('Адреса', 'proacto') ?>
						</h4>
					</div>
                    <p class="body-1">
                        <?= $where_contacts['address'] ?>
                    </p>
				</div>
				<div class="contacts__item">
					<div class="contacts__subtitle">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M21.6211 8.95312C21.7734 8.83203 22 8.94531 22 9.13672V17.125C22 18.1602 21.1602 19 20.125 19H3.875C2.83984 19 2 18.1602 2 17.125V9.14062C2 8.94531 2.22266 8.83594 2.37891 8.95703C3.25391 9.63672 4.41406 10.5 8.39844 13.3945C9.22266 13.9961 10.6133 15.2617 12 15.2539C13.3945 15.2656 14.8125 13.9727 15.6055 13.3945C19.5898 10.5 20.7461 9.63281 21.6211 8.95312ZM12 14C12.9062 14.0156 14.2109 12.8594 14.8672 12.3828C20.0508 8.62109 20.4453 8.29297 21.6406 7.35547C21.8672 7.17969 22 6.90625 22 6.61719V5.875C22 4.83984 21.1602 4 20.125 4H3.875C2.83984 4 2 4.83984 2 5.875V6.61719C2 6.90625 2.13281 7.17578 2.35938 7.35547C3.55469 8.28906 3.94922 8.62109 9.13281 12.3828C9.78906 12.8594 11.0938 14.0156 12 14Z" fill="#F79F79"/>
						</svg>
						<h4 class="heading-h3">
							<?= __('Електронна пошта', 'proacto') ?>
						</h4>
					</div>
                    <p class="body-1">
						<?= $where_contacts['elektronna_poshta'] ?>
                    </p>
                </div>
				<div class="contacts__item">
					<div class="contacts__subtitle">
						<h4 class="heading-h3">
							<?= __('Ми у соцмережах', 'proacto') ?>
						</h4>
					</div>
					<?php if(!empty($where_contacts['socials'])): ?>
                        <div class="contacts__socials">
							<?php foreach($where_contacts['socials'] as $link): ?>
                                <a href="<?= $link['url'] ?>" target="_blank">
                                    <img src="<?= esc_url( $link['icon']['url'] ) ?>" alt="<?= esc_attr( $link['icon']['alt'] ) ?>">
                                </a>
							<?php endforeach; ?>
                        </div>
					<?php endif; ?>
                </div>
			</div>
            <div class="contacts__part">
                <h3 class="heading-h2 underlined">
		            <?= $contacts_admin['title'] ?>
                </h3>
                <div class="contacts__item">
                    <div class="contacts__subtitle">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" fill="#F79F79"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 7.25C12.4142 7.25 12.75 7.58579 12.75 8V11.6893L15.0303 13.9697C15.3232 14.2626 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2626 15.3232 13.9697 15.0303L11.4697 12.5303C11.329 12.3897 11.25 12.1989 11.25 12V8C11.25 7.58579 11.5858 7.25 12 7.25Z" fill="white"/>
                        </svg>
                        <h4 class="heading-h3">
				            <?= __('Години роботи', 'proacto') ?>
                        </h4>
                    </div>
                    <p class="body-1">
                        <?= $contacts_admin['times'] ?>
                    </p>
                </div>
                <div class="contacts__item">
                    <div class="contacts__subtitle">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.8333 20.6668C13.4311 20.6623 10.1694 19.3089 7.76367 16.9031C5.35791 14.4973 4.00441 11.2357 4 7.83343C4 6.81677 4.40387 5.84174 5.12276 5.12285C5.84165 4.40396 6.81667 4.0001 7.83333 4.0001C8.04862 3.99846 8.26354 4.01799 8.475 4.05843C8.67943 4.08868 8.88039 4.13892 9.075 4.20843C9.21187 4.25645 9.33384 4.33937 9.42884 4.44899C9.52384 4.5586 9.58858 4.69112 9.61667 4.83343L10.7583 9.83343C10.7891 9.96915 10.7854 10.1104 10.7476 10.2443C10.7097 10.3782 10.6389 10.5006 10.5417 10.6001C10.4333 10.7168 10.425 10.7251 9.4 11.2584C10.2208 13.0591 11.661 14.5052 13.4583 15.3334C14 14.3001 14.0083 14.2918 14.125 14.1834C14.2245 14.0862 14.3468 14.0154 14.4808 13.9775C14.6147 13.9397 14.7559 13.936 14.8917 13.9668L19.8917 15.1084C20.0294 15.1404 20.1568 15.2069 20.2617 15.3016C20.3667 15.3964 20.4458 15.5163 20.4917 15.6501C20.562 15.8479 20.615 16.0514 20.65 16.2584C20.6835 16.4679 20.7003 16.6797 20.7 16.8918C20.6846 17.9041 20.2694 18.8692 19.545 19.5765C18.8205 20.2837 17.8457 20.6757 16.8333 20.6668Z" fill="#F79F79"/>
                        </svg>
                        <h4 class="heading-h3">
				            <?= __('Телефони', 'proacto') ?>
                        </h4>
                    </div>
                    <p class="body-1">
		                <?= $contacts_admin['phones'] ?>
                    </p>
                </div>
            </div>
            <div class="contacts__part">
                <h3 class="heading-h2 underlined">
					<?= $contacts_waiting['title'] ?>
                </h3>
                <div class="contacts__item">
                    <div class="contacts__subtitle">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" fill="#F79F79"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 7.25C12.4142 7.25 12.75 7.58579 12.75 8V11.6893L15.0303 13.9697C15.3232 14.2626 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2626 15.3232 13.9697 15.0303L11.4697 12.5303C11.329 12.3897 11.25 12.1989 11.25 12V8C11.25 7.58579 11.5858 7.25 12 7.25Z" fill="white"/>
                        </svg>
                        <h4 class="heading-h3">
							<?= __('Години роботи', 'proacto') ?>
                        </h4>
                    </div>
                    <p class="body-1">
		                <?= $contacts_waiting['time'] ?>
                    </p>
                </div>
                <div class="contacts__item">
                    <div class="contacts__subtitle">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.8333 20.6668C13.4311 20.6623 10.1694 19.3089 7.76367 16.9031C5.35791 14.4973 4.00441 11.2357 4 7.83343C4 6.81677 4.40387 5.84174 5.12276 5.12285C5.84165 4.40396 6.81667 4.0001 7.83333 4.0001C8.04862 3.99846 8.26354 4.01799 8.475 4.05843C8.67943 4.08868 8.88039 4.13892 9.075 4.20843C9.21187 4.25645 9.33384 4.33937 9.42884 4.44899C9.52384 4.5586 9.58858 4.69112 9.61667 4.83343L10.7583 9.83343C10.7891 9.96915 10.7854 10.1104 10.7476 10.2443C10.7097 10.3782 10.6389 10.5006 10.5417 10.6001C10.4333 10.7168 10.425 10.7251 9.4 11.2584C10.2208 13.0591 11.661 14.5052 13.4583 15.3334C14 14.3001 14.0083 14.2918 14.125 14.1834C14.2245 14.0862 14.3468 14.0154 14.4808 13.9775C14.6147 13.9397 14.7559 13.936 14.8917 13.9668L19.8917 15.1084C20.0294 15.1404 20.1568 15.2069 20.2617 15.3016C20.3667 15.3964 20.4458 15.5163 20.4917 15.6501C20.562 15.8479 20.615 16.0514 20.65 16.2584C20.6835 16.4679 20.7003 16.6797 20.7 16.8918C20.6846 17.9041 20.2694 18.8692 19.545 19.5765C18.8205 20.2837 17.8457 20.6757 16.8333 20.6668Z" fill="#F79F79"/>
                        </svg>
                        <h4 class="heading-h3">
							<?= __('Телефони', 'proacto') ?>
                        </h4>
                    </div>
                    <p class="body-1">
		                <?= $contacts_waiting['phones'] ?>
                    </p>
                </div>
            </div>
		</div>
	</div>
</section>
