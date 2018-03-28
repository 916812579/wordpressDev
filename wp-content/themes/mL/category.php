<!-- 
  参考：
  http://www.xminseo.com/
  https://yusi123.com/
-->

<?php
get_header();
?>

<div class="row  content-body">
    <header class="col-md-12 article-header">
        <div class="mbx-dh">
            当前分类： <?php echo single_cat_title(); ?>
        </div>
    </header>

    <main class="col-md-9 post-wrapper">
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
                    $count ++;
                    the_post();
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
            <?php echo paginate_links($args); ?>
        </div>
    </main>
    <?php
    // 获取侧边栏
    get_template_part('template-parts/sidebar');
    ?>
</div>
<?php get_footer(); ?>
