<?php
//Register CPT and taxonomies for website

 function register_post_types() {
//     register_post_type( 'informations',
//         array(
//             'labels' => array(
//                 'name'          => __('Handbook'),
//                 'singular_name' => __('Handbook article'),
//                 'add_new'       => __('Add article')
//             ),
//             'public'        => true,
//             'publicly_queryable' => true,
//             'has_archive'   => true,
//             'menu_position' => 4,
//             'menu_icon'     => 'dashicons-book',
//             'supports'      => array('title','editor','thumbnail',' custom-fields')
//         )
//     );
 }
 add_action( 'init', 'register_post_types' );


?>