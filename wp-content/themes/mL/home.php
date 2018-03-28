<?php
get_header();
?>
<div class="row content-body">
    <main class="col-md-9 post-wrapper">
        <div class="panel panel-default row">
            <div>
                <h3 class="hot h3_title">热门阅读</h3>
            </div>
            <?php
            $most_viewed = get_hot_posts(6);
            $count = 0;
            if ($most_viewed->have_posts()) :
                while ($most_viewed->have_posts()) :
                    $count ++;
                    $most_viewed->the_post();
                    get_template_part('template-parts/post/excerpt', get_post_format());
                    if ($count % 2 == 0) {
                        echo '<div class="clearfix"></div>';
                    }
                    ?>
                <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <div class="panel panel-default row">
            <div>
                <h3 class="recent h3_title">文章</h3>
            </div>
            <?php
            if (have_posts()) :
                ?>
                <?php
                $count = 0;
                while (have_posts()) :
                    the_post();
                    $count++;
                    get_template_part('template-parts/post/excerpt', get_post_format());
                    if ($count % 2 == 0) {
                        echo '<div class="clearfix"></div>';
                    }
                endwhile;
            else :
                // get_template_part('content', 'none');
                echo "敬请期待！！！";
            endif;
            ?>
        </div>
        <div class="page_navigation" aria-label="Page navigation">
            <?php echo paginate_links( $args ); ?>
        </div>
    </main>
    <?php
    // 获取侧边栏
    get_template_part('template-parts/sidebar');
    ?>
</div>
<?php get_footer(); ?>
