<?php get_header(); ?>
    <div class="row  content-body">
        <?php if (!have_posts()) : ?>
            <header class="col-md-12 article-header">
                <div class="mbx-dh">
                    当前搜索： <?php echo '<em>' . $s . '</em>, 没有相关内容，推荐如下'; ?>
                </div>
            </header>
        <?php else: ?>
            <header class="col-md-12 article-header">
                <div class="mbx-dh">
                    当前搜索： <?php echo '<em>' . $s . '</em>, 结果如下'; ?>
                </div>
            </header>
        <?php endif; ?>
        <main class="col-md-9">
            <div class="panel panel-default">
                <?php if (!have_posts()) : ?>
                    <div>
                        <h3 class="recent h3_title">推荐文章</h3>
                    </div>
                    <?php
                    global $paged;
                    global $showposts;
                    $args = array(
                        'showposts' => $showposts,
                        'post_status' => 'publish',
                        'caller_get_posts' => 1
                    );
                    query_posts($args);
                    ?>
                    <?php
                    if (have_posts()) :
                        $count = 0;
                        while (have_posts()) :
                            the_post();
                            $count++;
                            get_template_part('template-parts/post/excerpt', get_post_format());
                            if ($count % 2 == 0) {
                                echo '<div class="clearfix"></div>';
                            }
                        endwhile;
                    endif;
                    // 开发wordpress主题经常会用到的函数wp_reset_query，该函数使用在循环loop中，其作用是重置查询数据，一般与query_posts()配对出现
                    // 如果分页，就不能调用下面这个方法
                    wp_reset_query();
                    ?>
                <?php else: ?>
                    <div>
                        <h3 class="recent h3_title">相关文章</h3>
                    </div>
                    <?php include('modules/archive_title.php'); ?>
                <?php endif; ?>
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