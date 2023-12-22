<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package proacto
 */

get_header();
$id = get_the_ID();
?>
	<main class="post-template">
		
		<h1 class="single-post-title"><?php the_title() ?></h1>

	</main><!-- #main -->

<?php
get_footer();
