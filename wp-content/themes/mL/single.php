<?php
get_header();
?>
<div class="row">
    <header class="col-md-12 article-header">
        <div class="mbx-dh">
            当前位置：<a href="<?php echo get_bloginfo('url') ?>">首页</a>
            &gt;&gt; <?php $categorys = get_the_category();
            $category = $categorys[0];
            echo(get_category_parents($category->term_id, true, '&gt;&gt;')); ?>
            <?php the_title(); ?>
        </div>
    </header>
    <main class="col-md-9 article-content-wrapper">
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

<?php
get_css("/plugins/wangEditor-3.1.0/release/wangEditor.css");
get_js("/plugins/wangEditor-3.1.0/release/wangEditor.js");
?>
<script>

    var E = window.wangEditor;
    var editor = new E('#comment_editor')
    editor.customConfig.menus = ['head', 'bold', 'fontSize', 'fontName', 'italic', 'underline', 'strikeThrough', 'foreColor', 'backColor', 'link', 'list', 'justify', 'quote', 'emoticon', 'code', 'undo', 'redo']
    var comment = $("#comment");
    editor.customConfig.onchange = function (html) {
        // 监控变化，同步更新到 textarea
        comment.val(html)
    }
    editor.create();
    <?php
    // soshm('#share', {
    //     // 分享的链接，默认使用location.href
    //     url: '',
    //     // 分享的标题，默认使用document.title
    //     title: '',
    //     // 分享的摘要，默认使用<meta name="description" content="">content的值
    //     digest: '',
    //     // 分享的图片，默认获取本页面第一个img元素的src
    //     pic: '',
    //     // 默认显示的网站为以下六个个,支持设置的网站有
    //     // weixin,weixintimeline,qq,qzone,yixin,weibo,tqq,renren,douban,tieba
    //     sites: ['weixin', 'weixintimeline', 'yixin', 'weibo', 'qq', 'qzone']
    // });
    ?>
    var title = $("#post_title").html();
    var desc = $("#desc").attr("content");
    var url = location.href;
    var pic = "<?php echo get_bloginfo('template_url'); ?>" + "/images/default.jpg";
    sosh('#soshid', {
        url: url,
        title: title,
        digest: desc,
        pic: pic,
        sites: ['weixin', 'weibo', 'yixin', 'qzone', 'tqq', 'douban', 'renren', 'tieba']
    });

</script>


