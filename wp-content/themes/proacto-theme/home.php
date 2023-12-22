<?php
get_header();
?>

    <main class="page-template">
        <?php global $post;
        $page_for_posts_id = get_option('page_for_posts');
        if ( $page_for_posts_id ) :
            $post = get_post($page_for_posts_id);
            setup_postdata($post);
                the_content();
            rewind_posts();
        endif; ?>
        <?php get_template_part('/template-parts/static/news') ?>
    </main>


<?php
get_footer();
