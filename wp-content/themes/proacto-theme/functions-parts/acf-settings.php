<?php
/**
 * This file is used to register ACF Gutenberg blocks
 *
 * @package Proacto
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * This class customizes and configures the plugin ACF
 */
class Acf_Config {

    /**
     * Constructor
     */
    public function __construct() {

        $this->int_add_option_pages();
        add_action( 'acf/init', array( $this, 'pr_register_acf_gutenberg_block_types' ), 10 );
        add_filter( 'block_categories_all', array( $this, 'pr_add_custom_block_category' ), 10, 2 );

    }
    protected function int_add_option_pages() {

        if( function_exists('acf_add_options_page') ) {

            acf_add_options_page(array(
                'page_title' 	=> 'Загальні налаштування теми',
                'menu_title'	=> 'Налаштування теми',
                'menu_slug' 	=> 'theme-general-settings',
                'capability'	=> 'edit_posts',
                'redirect'		=> false
            ));

            acf_add_options_sub_page(array(
                'page_title' 	=> 'Налаштування Хедера',
                'menu_title'	=> 'Хедер',
                'parent_slug'	=> 'theme-general-settings',
            ));

            acf_add_options_sub_page(array(
                'page_title' 	=> 'Налаштування Футера',
                'menu_title'	=> 'Футер',
                'parent_slug'	=> 'theme-general-settings',
            ));

        }

    }

    /**
     * Register acf blocks for Gutenberg editor
     *
     * @return void
     */
    public function pr_register_acf_gutenberg_block_types() {
        //Set block names comma separated
        $block_names = array(
            array(
                'name' => 'baner',
                'title' => __('Головна - Банер', 'proacto'),
                'category' => 'proacto-custom-blocks',
                'icon' => 'cover-image',
            ),
	        array(
		        'name' => 'listing-quote',
		        'title' => __('Головна - Список', 'proacto'),
		        'category' => 'proacto-custom-blocks',
		        'icon' => 'media-document',
	        ),
	        array(
		        'name' => 'icons_list',
		        'title' => __('Головна - Перелік іконок', 'proacto'),
		        'category' => 'proacto-custom-blocks',
		        'icon' => 'align-center',
	        ),
	        array(
		        'name' => 'masonry_gallery',
		        'title' => __('Плиткова галерея', 'proacto'),
		        'category' => 'proacto-custom-blocks',
		        'icon' => 'format-gallery',
	        ),
	        array(
		        'name' => 'contact_form',
		        'title' => __('Контактна Форма', 'proacto'),
		        'category' => 'proacto-custom-blocks',
		        'icon' => 'buddicons-pm',
	        ),
	        array(
		        'name' => 'short_baner',
		        'title' => __('Банер сторінки', 'proacto'),
		        'category' => 'proacto-custom-blocks',
		        'icon' => 'align-wide',
	        ),
	        array(
		        'name' => 'news_grid',
		        'title' => __('Сітка новин', 'proacto'),
		        'category' => 'proacto-custom-blocks',
		        'icon' => 'grid-view',
	        ),
	        array(
		        'name' => 'news_slider',
		        'title' => __('Слайдер новин', 'proacto'),
		        'category' => 'proacto-custom-blocks',
		        'icon' => 'columns',
	        ),
	        array(
		        'name' => 'photo_gallery',
		        'title' => __('Галерея фото', 'proacto'),
		        'category' => 'proacto-custom-blocks',
		        'icon' => 'columns',
	        ),
	        array(
		        'name' => 'accordeons',
		        'title' => __('Випадайки', 'proacto'),
		        'category' => 'proacto-custom-blocks',
		        'icon' => 'arrow-down-alt2',
	        ),
        );

        if ( function_exists( 'acf_register_block_type' ) ) {

            foreach ( $block_names as $block ) {
                acf_register_block_type(
                    array(
                        'name'            => $block['name'] . '-block',
                        'title'           => $block['title'],
                        'description'     => ucwords( str_replace( '-', ' ', $block['name'] ) ) . __( ': ACF block for Gutenberg Editor', 'proacto' ),
                        'render_template' => 'template-parts/blocks/prt-' . $block['name'] . '.php',
                        'category'        => $block['category'],
                        'icon'            => $block['icon'],
                        'mode'            => 'edit',
                        'supports'        => array(
                            'mode' => false,
                        ),
                    )
                );
            }
        }
    }

    /**
     * Add custom block category
     */
    public function pr_add_custom_block_category( $categories, $post ) {
        $desired_position = 0;
        $pr_category = array(
            'slug'  => 'proacto-custom-blocks',
            'title' => __('Оріяна', 'proacto'),
            'icon'  => 'block-default',
        );

        array_splice( $categories, $desired_position, 0, array( $pr_category ) );

        return $categories;
    }
}

if ( class_exists( 'Acf_Config' ) ) {

    new Acf_Config();
}
