<?php
get_header();
?>


<div class="scrollDivIcon" style="display: float;">
	<i class="fa fa-volume-up"></i>
</div>
<div class="scrollDiv">
	<ul class="scrollText">
		<li>本站内容来源于互联网，未经允许可以任意传播，如有问题，后果自负</li>
		<li>本站内容如果对个人或团体有所侵犯，请及时通知，马上处理</li>
		<li>本站内容还在不断完善中，欢迎批评指正</li>
	</ul>
</div>

<div class="row">

	<main class="col-md-8 main-content">
	 <?php
query_posts('showposts=5');
if (have_posts()) :
    ?>
					<?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/post/content_home', get_post_format());
    endwhile
    ;
 

else :
    // get_template_part('content', 'none');
    echo "敬请期待！！！";


endif;
?>


	</main>
		 <?php
get_template_part('template-parts/sidebar/sidebar_home');
?>

</div>

<?php get_footer(); ?>
