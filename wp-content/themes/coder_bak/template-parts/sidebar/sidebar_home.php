<?php
?>

<aside class="col-md-4 sidebar">
	<!-- start widget -->
	<!-- end widget -->

	<!-- start tag cloud widget -->

	<div class="widget">
		<h4 class="title">最近文章</h4>
		<div class="content">
	<?php get_archives('postbypost', 10); ?>
	</div>
	</div>




	<!-- end tag cloud widget -->

	<!-- start widget 
<div class="widget">
	<h4 class="title">下载 Ghost</h4>
	<div class="content download">
		<a href="/download/" class="btn btn-default btn-block" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '下载Ghost'])">Ghost 中文版（0.7.4）</a>
	</div>
</div>
end widget -->

	<!-- start tag cloud widget 
<div class="widget">
	<h4 class="title">标签云</h4>
	<div class="content tag-cloud">
		<a href="/tag/jquery/">jQuery</a>
<a href="/tag/ghost-0-7-ban-ben/">Ghost 0.7 版本</a>
<a href="/tag/opensource/">开源</a>
<a href="/tag/zhu-shou-han-shu/">助手函数</a>
<a href="/tag/tag-cloud/">标签云</a>
<a href="/tag/navigation/">导航</a>
<a href="/tag/customize-page/">自定义页面</a>
<a href="/tag/static-page/">静态页面</a>
<a href="/tag/roon-io/">Roon.io</a>
<a href="/tag/configuration/">配置文件</a>
<a href="/tag/upyun/">又拍云存储</a>
<a href="/tag/upload/">上传</a>
<a href="/tag/handlebars/">Handlebars</a>
<a href="/tag/email/">邮件</a>
<a href="/tag/shortcut/">快捷键</a>
<a href="/tag/yong-hu-zhi-nan/">用户指南</a>
<a href="/tag/theme-market/">主题市场</a>
<a href="/tag/release/">新版本发布</a>


		<a href="/tag-cloud/">...</a>
	</div>
</div>
end tag cloud widget -->

	<!-- start widget -->
	<!-- end widget -->

	<!-- start widget -->
	<!-- end widget -->


	<div class="widget">
		<h4 class="title">分类</h4>
		<div class="content ">
	    <?php
    wp_list_categories(array(
        'title_li' => '',
        "show_count" => 1,
        "hide_empty" => 0
    ));
    ?>
	</div>
	</div>

	<div class="widget">
		<h4 class="title">归档</h4>
		<div class="content">
	    <?php
    wp_get_archives(array(
        'type' => 'monthly',
        'show_post_count' => true
    ));
    ?>
	</div>
	</div>

	<div class="widget">
		<h4 class="title">标签</h4>
		<div class="content tag-cloud">
   <?php wp_tag_cloud(); ?>
	</div>
	</div>

	<div class="widget">
		<h4 class="title">站点信息</h4>
		<div class="content">
			<p>站点成立 ( <?php echo floor((time()-strtotime('2017-5-28'))/86400); ?>天)</p>
			<p>文章数 (<?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish;?>)</p>
			<p>标签 (<?php echo $count_tags = wp_count_terms('post_tag'); ?>)</p>
			<p>分类 (<?php echo $count_categories = wp_count_terms('category'); ?>)</p>
		</div>
	</div>

	<div class="widget">
		<h4 class="title">联系方式</h4>
		<div class="content">
			<p>微信：916812579</p>
			<p>QQ：916812579</p>
			<p>邮箱：916812579@qq.com</p>
		</div>
	</div>



</aside>
