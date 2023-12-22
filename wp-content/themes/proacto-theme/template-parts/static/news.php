<?php
$cats = get_categories();
if (is_category()) {
    $page_for_posts_id = get_option('page_for_posts');
    $page = get_post($page_for_posts_id);
    $cur_cat = get_queried_object();
    setup_postdata($post);
     $archive_link = get_the_permalink($page);
    rewind_posts();
}
?>

<section class="news">
    <div class="container">
        <div class="news__cats">
            <ul class="tags_menu">
              <li>
                  <a href="<?php echo is_category() ? $archive_link : '#' ?>" class="post_hashtag <?php echo is_category() ? '' : 'current' ?>">
                      <?php echo __("#Всі новини", "proacto") ?>
                  </a>
              </li>
                <?php foreach($cats as $cat): ?>
                    <?php if (isset($cur_cat) && $cur_cat->term_id == $cat->term_id){
                        $class = 'current';
                    } else {
                        $class = '';
                    }?>
                    <li>
                        <a class="post_hashtag <?php echo $class ?>" href="<?php echo $class == "current" ? "#" : get_term_link($cat) ?>">
                            <?php echo '#' . $cat->name ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="news__wrap">
            <?php while (have_posts()) : the_post(); ?>
                <?php
                $img_url = has_post_thumbnail() ? get_the_post_thumbnail_url() : get_field('general', 'option')['logo']['url'];
                $img_alt = has_post_thumbnail() ? get_the_post_thumbnail_caption() : get_field('general', 'option')['logo']['alt'];
                ?>

                <div class="feed_card swiper-slide">
                    <figure>
                        <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo esc_attr($img_alt) ?>">
                    </figure>
                    <span class="feed_card__hash post_hashtag">
                                    <?php echo '#' . $cat->name ?>
                                </span>
                    <h3 class="title title-5">
                        <?php echo get_the_title() ?>
                    </h3>
                    <div class="feed_card__meta">
                                    <span class="feed_card__author caption">
                                        <?php echo get_the_author() ?>
                                    </span>
                        <span class="feed_card__date">
                                        <?php echo get_the_date('d.m.Y') ?>
                                    </span>
                    </div>
                    <a href="<?php echo get_the_permalink() ?>" class="link-overlay"></a>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="default_pagination">
            <?php
            echo paginate_links( [
                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'format'       => '?paged=%#%',
                'show_all'     => false,
                'type'         => 'plain',
                'end_size'     => 2,
                'mid_size'     => 1,
                'prev_next'    => true,
                'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
                'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
                'add_args'     => false,
                'add_fragment' => '',
            ] );
            ?>
        </div>
    </div>
    </div>
</section>
