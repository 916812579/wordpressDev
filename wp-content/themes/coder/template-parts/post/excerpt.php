<article class="excerpt">
    <div class="col-xs-6">
        <div class="thumbnail">
            <?php if (has_post_thumbnail()) { ?>
                <a href="<?php the_permalink(); ?>"><img
                            src="<?php echo get_bloginfo('template_url') ?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=200&w=380&q=90&zc=1&ct=1"
                            alt=""></a>
            <?php } else { ?>
                <a href="<?php the_permalink(); ?>"><img
                            src="<?php echo get_bloginfo('template_url') ?>/images/default.jpg" alt=""></a>
            <?php } ?>
            <div class="caption">
                <h3>
                    <?php
                    if (!is_category()) {
                        $category = get_the_category();
                        if ($category[0]) {
                            echo '<a class="label label-important" href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '<i class="label-arrow"></i></a>';
                        }
                    };
                    ?>
                    <a class="post_title_link" href="<?php the_permalink(); ?>"><?php subStrTitle(); ?></a>
                </h3>
                <p><?php get_post_excerpt(); ?></p>
                <p class="post_info">
                    <span><i class="fa fa-clock-o"></i><?php echo timeago(get_gmt_from_date(get_the_time('Y-m-d G:i:s'))) ?></span>
                    <a href="#"><i class="fa fa-comments-o"></i> <span
                                class="badge"><?php echo $post->comment_count; ?></span></a>
                    &nbsp;&nbsp;
                    <a href="#"><i class="fa fa-heart-o"></i><span
                                class="badge"><?php wp_zan_count(); ?></span></a>
                    &nbsp;&nbsp;
                    <a href="#"><i class="fa fa-eye"></i><span
                                class="badge"><?php deel_views('℃'); ?></span></a>
                    &nbsp;&nbsp;
                </p>
            </div>
        </div>
    </div>
</article>