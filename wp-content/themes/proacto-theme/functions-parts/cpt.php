<?php
//Register CPT and taxonomies for website

function register_post_types() {
	register_post_type( 'entertainment',
		array(
			'labels' => array(
				'name'          => __('Дозвілля'),
				'singular_name' => __('Дозвілля'),
				'add_new'       => __('Додати дозвілля')
			),
			'public'        => true,
			'publicly_queryable' => true,
			'has_archive'   => true,
			'menu_position' => 4,
			'menu_icon'     => 'dashicons-admin-customizer',
			'supports'      => array('title','thumbnail','custom-fields')
		)
	);

	register_post_type( 'informations',
		array(
			'labels' => array(
			'name'          => __('Педагоги'),
			'singular_name' => __('Педагог'),
			'add_new'       => __('Додати педагога')
		),
			'public'        => true,
			'publicly_queryable' => true,
			'has_archive'   => true,
			'menu_position' => 4,
			'menu_icon'     => 'dashicons-businesswoman',
			'supports'      => array('title','thumbnail','custom-fields')
		)
	);

	register_post_type( 'graduates',
		array(
			'labels' => array(
				'name'          => __('Випуски'),
				'singular_name' => __('Випуск'),
				'add_new'       => __('Додати випуск')
			),
			'public'        => true,
			'publicly_queryable' => true,
			'has_archive'   => true,
			'menu_position' => 4,
			'menu_icon'     => 'dashicons-smiley',
			'supports'      => array('title','thumbnail','custom-fields')
		)
	);
}
add_action( 'init', 'register_post_types' );

function register_custom_taxonomy() {
	$labels = array(
		'name'              => _x( 'Категорії', 'taxonomy general name' ),
		'singular_name'     => _x( 'Категорія', 'taxonomy singular name' ),
		'search_items'      => __( 'Знайти категорію' ),
		'all_items'         => __( 'Всі категорії' ),
		'parent_item'       => __( 'Батьківська категорія' ),
		'parent_item_colon' => __( 'Батьківська категорія:' ),
		'edit_item'         => __( 'Редагувати категорію' ),
		'update_item'       => __( 'Оновити категорію' ),
		'add_new_item'      => __( 'Додати нову категорію' ),
		'new_item_name'     => __( 'Нова назва категорії' ),
		'menu_name'         => __( 'Категорії' ),
	);

	$args = array(
		'hierarchical'      => true, // Set to true if you want hierarchy (like categories)
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'category' ),
	);

	register_taxonomy( 'information_category', array( 'informations' ), $args );

	$labels_grad = array(
		'name'              => _x( 'Роки випуску', 'taxonomy general name' ),
		'singular_name'     => _x( 'Рік випуску', 'taxonomy singular name' ),
		'search_items'      => __( 'Знайти рік' ),
	);

	$args_grad = array(
		'hierarchical'      => true, // Set to true if you want hierarchy (like categories)
		'labels'            => $labels_grad,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'category' ),
	);

	register_taxonomy( 'graduates_years', array( 'graduates' ), $args_grad );
}
add_action( 'init', 'register_custom_taxonomy' );
?>