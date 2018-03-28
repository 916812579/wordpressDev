<?php
/*
Template Name: Page 
*/
?>
<?php
get_header();
?>
    <div class="row">
        <main class="col-md-9">
            <div class="panel panel-default">
                <?php if (have_posts()) : ?>
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/post/page', get_post_format());
                    endwhile;

                endif;
                ?>
            </div>
        </main>
        <?php
        // 获取侧边栏
        get_template_part('template-parts/sidebar');
        ?>
    </div>
<?php get_footer(); ?>