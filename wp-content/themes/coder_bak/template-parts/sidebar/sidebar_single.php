<?php
?>

<aside class="col-md-4 sidebar">

	<div class="widget">
		<h4 class="title">最近文章</h4>
		<div class="content">
	<?php get_archives('postbypost', 10); ?>
	</div>
	</div>
	
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

</aside>
