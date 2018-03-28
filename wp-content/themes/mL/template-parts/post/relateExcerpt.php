<article class="col-md-3 article">
    <div class="thumbnail" title="<?php echo the_title(); ?>" data-toggle="tooltip" data-placement="top">
        <?php if (has_post_thumbnail()) { ?>
            <a href="<?php the_permalink(); ?>"><img
                        src="<?php echo get_bloginfo('template_url') ?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=200&w=380&q=90&zc=1&ct=1"
                        alt=""></a>
        <?php } else { ?>
            <a href="<?php the_permalink(); ?>"><img
                        src="<?php echo get_bloginfo('template_url') ?>/images/default.jpg" alt=""></a>
        <?php } ?>
        <div class="caption">
            <p>
                <a class="post_title_link" href="<?php the_permalink(); ?>"><?php subStrTitle(); ?></a>
            </p>
        </div>
    </div>
</article>