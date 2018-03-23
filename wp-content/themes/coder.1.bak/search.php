<?php get_header(); ?>
<div class="col-md-8 main-content">
		<?php if ( !have_posts() ) : ?>
			<header class="archive-header"> 
				<h3>没有找到有关【<?php echo $s; ?>】的内容</h3>
				<p class="muted">给您推荐以下内容：</p>
			</header>
			<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
				    'showposts' => 4,
				    'caller_get_posts' => 1,
				    'paged' => $paged
				);
				query_posts($args);
			?>
			<?php 
			  // include( 'modules/excerpt.php' );
			get_template_part('template-parts/post/excerpt', get_post_format()); 
			
			?>
			
		<?php else: ?>
			<header class="archive-header"> 
				<h3>有关【<?php echo $s; ?>】的内容</h3>
			</header>
			<?php include( 'modules/archive_title.php' ); ?>
		<?php endif; ?>
</div>

<?php get_template_part('template-parts/sidebar/sidebar_index'); get_footer(); ?>