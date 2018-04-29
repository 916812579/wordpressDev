<?php
?>
<div class="content">
    <header class="article-header-meta">
        <h3 class="article-title">
            <a id="post_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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

            <span class="meta-ele">
            <?php if (get_edit_post_link($post->ID)) : ?>
                <i class="fa fa-pencil-square-o"></i>
                <?php edit_post_link('编辑'); endif; ?></span>
        </div>
    </header>
</div>

<article class="article-content">
    <div class="post-content">
        <?php the_content(); ?>
    </div>
    <div id="z_s_s">
        <div class="social-main">
            <span class="like"><?php wp_custom_zan(); ?></span>
            <span class="shang-p">
                <a href="#pay_shang" id="shang-main-p">赏</a>
                <div id="shang_box" class="shang_box" style="display: none;">
                    <div class="shang_box_content">
                            <div class="shang_tit">
                                <p>感谢您的支持，我会继续努力的!</p>
                            </div>
                            <div class="shang_payimg">
                                <img src="<?php echo get_bloginfo('template_url'); ?>/images/alipay-img.png" alt="扫码支持" title="扫一扫">
                            </div>
                            <div class="pay_explain">扫码打赏，你说多少就多少</div>
                            <div class="shang_payselect">
                                <div class="pay_item checked" data-id="alipay">
                                    <span class="radiobox"></span>
                                    <span class="pay_logo"><img
                                                src="<?php echo get_bloginfo('template_url') ?>/images/alipay.jpg" alt="支付宝"></span>
                                </div>
                                <div class="pay_item" data-id="weipay">
                                    <span class="radiobox"></span>
                                    <span class="pay_logo"><img
                                                src="<?php echo get_bloginfo('template_url') ?>/images/wechat.jpg" alt="微信"></span>
                                </div>
                                <div class="clearfix"></div>
                                <div class="shang_info">
                                    <p>打开<span id="shang_pay_txt">支付宝</span>扫一扫，即可进行扫码打赏哦</p>
                                </div>
                            </div>
                        </div>
                </div>
            </span>
            <span class="share-s">
                <a id="share-main-s"><i class="fa fa-share-alt"></i> 分享</a>
                <?php // 分享功能，参考：https://github.com/calledT/sosh ?>
                <div id="soshid" style="display: none;"></div>
            </span>
        </div>
    </div>

</article>
<div class="clear"></div>
<div></div>
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
                <a class="post-tag " style="background-color: <?php echo randomFromColorArray(); ?>"
                   href="<?php echo get_tag_link($tag->term_id); ?>"
                   data-toggle="tooltip" rel="tag"
                   class="post_tag post_tag_<?php echo $count; ?>" data-original-title=""
                   title="<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a>
                <?php $count++; endforeach; ?>
        </div>
    </footer>
<?php endif; ?>

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

<style type="text/css">
    .radiobox {
        width: 16px;
        height: 16px;
        background: url(<?php echo get_bloginfo('template_url') ?>/images/radio2.jpg);
        display: block;
        float: left;
        margin-top: 5px;
        margin-right: 14px;
    }

    .checked .radiobox {
        background: url(<?php echo get_bloginfo('template_url') ?>/images/radio1.jpg);
    }

</style>


