<?php
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>


<meta name="baidu_union_verify"
	content="c8f70520af4aa3d3549a78c0508fb377">
<meta name="360-site-verification"
	content="90fcad26cd20548190701436b8a50e11" />
<meta name="sogou_site_verification" content="xrRpH3BikJ" />

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script>
 
(function(){
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



<script>
(function(){
   var src = (document.location.protocol == "http:") ? "http://js.passport.qihucdn.com/11.0.1.js?4bebbde77b222012a466cb5174e83357":"https://jspassport.ssl.qhimg.com/11.0.1.js?4bebbde77b222012a466cb5174e83357";
   document.write('<script src="' + src + '" id="sozz"><\/script>');
})();
</script>



<?php
$description = '';
$keywords = '';

if (is_home() || is_page()) {
    $description = '猿乐园博客是专注于IT开发工作经验分享的个人博客，博客内容基本都经过个人验证。涵盖了java开发、移动端开发、大数据开发、数据库技术领域等相关技能。猿乐园坚持开源软件的开源思想，站内所有文章不受版权约束，如果喜欢可以任意转载。';
    $categories = get_categories();
    $keywords = "";
    if (! is_wp_error($categories)) {
        $categories = (array) $categories;
        foreach (array_keys($categories) as $k) {
            $keywords .= $categories[$k]->name;
            $keywords .= " ";
        }
    }
} elseif (is_single()) {
    $description1 = get_post_meta($post->ID, "description", true);
    $description2 = str_replace("\n", "", mb_strimwidth(strip_tags($post->post_content), 0, 200, "…", 'utf-8'));
    // 填写自定义字段description时显示自定义字段的内容，否则使用文章内容前200字作为描述
    $description = $description1 ? $description1 : $description2;
    // 填写自定义字段keywords时显示自定义字段的内容，否则使用文章tags作为关键词
    $keywords = get_post_meta($post->ID, "keywords", true);
    if ($keywords == '') {
        $tags = wp_get_post_tags($post->ID);
        foreach ($tags as $tag) {
            $keywords = $keywords . $tag->name . ", ";
        }
        $keywords = rtrim($keywords, ', ');
    }
    
    if ($keywords == '') {
        $keywords = $post->post_title;
    }
} elseif (is_category()) {
    // 分类的description可以到后台 - 文章 -分类目录，修改分类的描述
    $description = category_description();
    $keywords = single_cat_title('', false);
} elseif (is_tag()) {
    // 标签的description可以到后台 - 文章 - 标签，修改标签的描述
    $description = tag_description();
    $keywords = single_tag_title('', false);
}
$description = trim(strip_tags($description));
$keywords = trim(strip_tags($keywords));
?>
<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />


<title><?php
if (is_home() || is_page()) {
    bloginfo('name');
} else {
    $title = ($post->post_title) . "-";
    echo $title;
    bloginfo('name');
}
?></title>


<?php 

//get_js("/js/flexible.js");
?>

<link rel="profile" href="http://gmpg.org/xfn/11">
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri());?>/plugins/syntaxhighlighter/scripts/shCore.js"></script>
<script type="text/javascript" src="<?php  echo esc_url(get_template_directory_uri());?>/plugins/syntaxhighlighter/scripts/shBrushBash.js"></script>
<script type="text/javascript" src="<?php  echo esc_url(get_template_directory_uri());?>/plugins/syntaxhighlighter/scripts/shBrushCss.js"></script>
<script type="text/javascript" src="<?php  echo esc_url(get_template_directory_uri());?>/plugins/syntaxhighlighter/scripts/shBrushCSharp.js"></script>
<script type="text/javascript" src="<?php  echo esc_url(get_template_directory_uri());?>/plugins/syntaxhighlighter/scripts/shBrushJScript.js"></script>
<script type="text/javascript" src="<?php  echo esc_url(get_template_directory_uri());?>/plugins/syntaxhighlighter/scripts/shBrushPhp.js"></script>
<script type="text/javascript" src="<?php  echo esc_url(get_template_directory_uri());?>/plugins/syntaxhighlighter/scripts/shBrushPlain.js"></script>
<script type="text/javascript" src="<?php  echo esc_url(get_template_directory_uri());?>/plugins/syntaxhighlighter/scripts/shBrushPython.js"></script>
<script type="text/javascript" src="<?php  echo esc_url(get_template_directory_uri());?>/plugins/syntaxhighlighter/scripts/shBrushJava.js"></script>
<script type="text/javascript" src="<?php  echo esc_url(get_template_directory_uri());?>/plugins/syntaxhighlighter/scripts/shBrushScala.js"></script>
<script type="text/javascript" src="<?php  echo esc_url(get_template_directory_uri());?>/plugins/syntaxhighlighter/scripts/shBrushSql.js"></script>
<script type="text/javascript" src="<?php  echo esc_url(get_template_directory_uri());?>/plugins/syntaxhighlighter/scripts/shBrushXml.js"></script>
<script type="text/javascript" src="<?php  echo esc_url(get_template_directory_uri());?>/plugins/syntaxhighlighter/scripts/shBrushPerl.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/plugins/syntaxhighlighter/styles/shCore.css" />
<link type="text/css" rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri());?>/plugins/syntaxhighlighter/styles/shCoreRDark.css" />




<link rel="stylesheet"
	href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	crossorigin="anonymous">

<link rel="stylesheet"
	href="//cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css">
	

<?php wp_head(); ?>


    <link rel="shortcut icon"
	href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon.ico">





<link type="text/css" rel="stylesheet"
	href='<?php bloginfo("stylesheet_url") ?>' />
	
	
	<?php

//get_css("/css/animate.min.css");



?>


</head>

<body class="post_body">
		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>
		<?php if ( has_nav_menu( 'top' ) ) : ?>
			 
					<?php
    // 加载菜单
    get_template_part('template-parts/navigation/navigation', 'top');
    ?>
				 
		<?php endif; ?>

<section class="content-wrap content-width">
		
