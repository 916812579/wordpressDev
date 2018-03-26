<?php
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>

    <meta name="baidu_union_verify"
          content="c8f70520af4aa3d3549a78c0508fb377">
    <meta name="360-site-verification"
          content="90fcad26cd20548190701436b8a50e11"/>
    <meta name="sogou_site_verification" content="xrRpH3BikJ"/>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <?php
    get_js("/jquery-3.2.1/jquery-3.2.1.min.js");
    getSeo();
    global $description;
    global $keywords;
    ?>
    <meta name="description" content="<?php echo $description; ?>"/>
    <meta name="keywords" content="<?php echo $keywords; ?>"/>


    <title><?php
        $sr_1 = 0;
        $sr_2 = 0;
        $commenton = 0;
        if (is_home() || is_page()) {
            bloginfo('name');
        } else {
            $title = ($post->post_title) . "-";
            echo $title;
            bloginfo('name');
        }
        ?></title>

    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
    <link rel="shortcut icon"
          href="<?php echo esc_url(get_template_directory_uri()); ?>/images/favicon.ico">

    <?php get_css("/css/font-awesome.min.css"); ?>
    <?php get_css("/bootstrap-3.3.7/css/bootstrap.min.css"); ?>
    <link type="text/css" rel="stylesheet"
          href='<?php bloginfo("stylesheet_url") ?>'/>

    <script>
        window._deel = {
            name: '<?php bloginfo('name') ?>',
            url: '<?php echo get_bloginfo("template_url") ?>',
            ajaxpager: '<?php echo dopt('d_ajaxpager_b') ?>',
            commenton: <?php echo $commenton ?>,
            roll: [<?php echo $sr_1 ?>,<?php echo $sr_2 ?>]
        }
    </script>

    <script>

        (function () {
            var bp = document.createElement('script');
            var curProtocol = window.location.protocol.split(':')[0];
            if (curProtocol === 'https') {
                bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
            }
            else {
                bp.src = 'http://push.zhanzhang.baidu.com/push.js';
            }
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(bp, s);
        })();


    </script>
    <?php header("Access-Control-Allow-Origin:*"); ?>
</head>
<body class=" post_body">
<header class="header">
    <?php get_template_part('template-parts/header/header', 'image'); ?>
    <?php if (has_nav_menu('top')) : ?>
        <?php
        // 加载菜单
        get_template_part('template-parts/navigation/navigation', 'top');
        ?>
    <?php endif; ?>
</header>
<section class="container container-wrap">
