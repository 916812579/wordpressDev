<?php
?>

<aside id="sidebar" class="col-xs-3 post-sidebar">

    <div class="panel panel-default row site_summary">
        <a href="<?php echo esc_url(home_url('/')); ?>"><img class="site_img img-circle"
                                                             src="<?php echo get_bloginfo('template_url') ?>/images/mocky.png"
                                                             class="img-circle"></a>
        <div class="caption ">
            <p>文章&nbsp;&nbsp;<?php echo wp_count_posts()->publish; ?></p>
        </div>
    </div>

    <div class="panel panel-default row">
        <div class="social">
            <a href="tencent://message/?uin=916812579&amp;Site=&amp;Menu=yes"
               rel="external nofollow" target="_blank"><i class="qq fa fa-qq"
                                                          title="联系QQ" data-toggle="tooltip"
                                                          data-placement="top"></i></a>
        </div>
    </div>

    <?php
    $numberposts = 6;
    $args = array(
        'numberposts' => $numberposts,
        'orderby' => 'rand',
        'post_status' => 'publish'
    );

    if (is_category()) {
        $categories = get_the_category();
        $category = 0;
        if ($categories[0]) {
            $category = $category[0]->term_id;
        }
        $args = array(
            'numberposts' => $numberposts,
            'orderby' => 'rand',
            'post_status' => 'publish',
            'category' => $category
        );
    }
    $rand_posts = get_posts($args);
    ?>

    <div class="panel panel-default row like_panel">
        <div>
            <h3 class="like">猜你喜欢</h3>
        </div>
        <ul class="list-group">
            <?php
            $count = 0;
            foreach ($rand_posts as $rand_post) :
                $count++;
                ?>
                <li class="list-group-item"><span class="count_seq"><?php echo $count; ?></span><a
                            href="<?php the_permalink($rand_post); ?>"><?php subStrTitle($rand_post, 12); ?></a></li>
            <?php
            endforeach;
            ?>
        </ul>
    </div>

    <div class="panel panel-default row ">
        <div>
            <h3 class="category">文章分类</h3>
        </div>
        xxx
    </div>
</aside>
