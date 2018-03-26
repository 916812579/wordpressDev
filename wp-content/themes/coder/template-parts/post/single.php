<?php
?>
<div class="content">
    <header class="article-header-meta">
        <h3 class="article-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="meta">
			<span id="mute-category"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;<?php
                if (!is_category()) {
                    $categories = get_the_category();
                    foreach ($categories as $cat) :
                        echo '<a href="' . get_category_link($cat->term_id) . '">' . $cat->cat_name . '</a>&nbsp;';
                    endforeach;
                };
                ?></span>
            <time class="meta-ele">
                <i class="fa fa-clock-o"></i><?php echo timeago(get_gmt_from_date(get_the_time('Y-m-d G:i:s'))) ?>
            </time>
            <span class="meta-ele"><i class="fa fa-eye"></i><?php deel_views('℃'); ?></span>
            <span class="meta-ele"><i class="fa fa-comments-o"></i> <a
                        href="<?php echo get_comments_link(); ?>"><?php echo get_comments_number('0', '1', '%'); ?>
                    评论</a></span>

            <?php if (get_edit_post_link($post->ID)) : ?>
                <i class="fa fa-pencil-square-o"></i>
                <?php edit_post_link('编辑'); endif; ?>
        </div>
    </header>
</div>

<article class="article-content">
    <?php the_content(); ?>
    <div class="article-social">
        <?php wp_custom_zan(); ?>
    </div>
</article>

 <?php
        $tags = wp_get_post_tags($post->ID);
        if (!empty($tags)) :
        ?>
<footer class="article-footer">
    <div class="article-tags">
        <i class="fa fa-tags"></i>
        <?php
        $tags = wp_get_post_tags($post->ID);
        $count = 1;
        foreach ($tags as $tag) :
            ?>
            <a href="<?php echo get_tag_link($tag->term_id); ?>"
               data-toggle="tooltip" rel="tag"
               class="post_tag post_tag_<?php echo $count; ?>" data-original-title=""
               title="<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a>
            <?php $count++; endforeach; ?>
    </div>
</footer>
<?php endif;?>

<nav class="article-nav">
    <?php if (get_previous_post()) : ?>
        <span class="article-nav-prev">
        <i class="fa fa-angle-double-left"></i>
        <?php previous_post_link('%link') ?>
        </span><?php endif; ?>
    <?php if (get_next_post()) : ?>
        <span class="article-nav-next pull-right">
	    <?php next_post_link('%link'); ?>
            <i class="fa fa-angle-double-right"></i></span>
    <?php endif; ?>
</nav>


