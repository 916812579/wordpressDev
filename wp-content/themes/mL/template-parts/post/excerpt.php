<article class="col-md-6 article wow bounceInUp animated">
    <div class="thumbnail" title="<?php echo the_title(); ?>" data-toggle="tooltip" data-placement="top">
        <?php if (has_post_thumbnail()) { ?>
            <a href="<?php the_permalink(); ?>"><img
                        src="<?php echo get_bloginfo('template_url') ?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=200&w=380&q=90&zc=1&ct=1"
                        alt=""></a>
        <?php } else { ?>
            <a href="<?php the_permalink(); ?>"><img
                        src="<?php echo get_bloginfo('template_url') ?>/images/default.jpg" alt=""></a>
        <?php } ?>

        <?php
        $s = trim(get_search_query()) ? trim(get_search_query()) : 0;
        ?>
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
                <a class="post_title_link" href="<?php the_permalink(); ?>"><?php
                    if (is_search()) {
                        echo highlightKeyWord($s, the_title());
                    } else {
                        the_title();
                    }
                    ?></a>
            </h3>

            <p><?php
                if (is_search()) {
                    global $encoding;
                    $content = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 260, "...", $encoding);
                    $content = highlightKeyWord($s, $content);
                    echo $content;
                } else {
                    get_post_excerpt();
                }
                ?></p>
            <p class="post_info">
                <span><i class="fa fa-clock-o"></i><?php echo timeago(get_gmt_from_date(get_the_time('Y-m-d G:i:s'))) ?></span>
                <a href="#"> <span
                            class="badge"><i class="fa fa-comments-o"></i><span><?php echo $post->comment_count; ?></span></span></a>
                &nbsp;&nbsp;
                <a href="#"><span
                            class="badge"><i class="fa fa-thumbs-up"></i><span><?php wp_zan_count(); ?></span></span></a>
                &nbsp;&nbsp;
                <a href="#"><span
                            class="badge"><i class="fa fa-eye"></i><span><?php deel_views('℃'); ?></span></span></a>
                &nbsp;&nbsp;
            </p>
        </div>
    </div>
</article>