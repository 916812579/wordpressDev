<?php
get_header();
?>
<div class="row">
    <header class="col-xs-12 article-header">
        <div class="mbx-dh">
            当前位置：<a href="<?php echo get_bloginfo('url') ?>">首页</a>
            &gt;&gt; <?php $categorys = get_the_category();
            $category = $categorys[0];
            echo(get_category_parents($category->term_id, true, '&gt;&gt;')); ?>
            <?php the_title(); ?>
        </div>
    </header>
    <main class="col-xs-9 article-content-wrapper">
        <article class="panel panel-default article-panel">
            <?php if (have_posts()) : ?>
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/post/single', get_post_format());
                endwhile;
                ?>
            <?php
            endif;
            ?>

        </article>
        <section class="panel panel-default">
            <?php include('modules/related.php'); ?>
        </section>
        <section>
            <?php comments_template('', true); ?>
        </section>
    </main>
    <?php
    get_template_part('template-parts/sidebar');
    ?>
</div>
<?php get_footer(); ?>
