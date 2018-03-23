<?php
?>

<article id="<?php the_ID();?>>" class="post">

	<div class="post-head">
		<h1 class="post-title">
			<a href="<?php  the_permalink();?>"><?php the_title();?></a>
		</h1>
		<div class="post-meta">
			<span class="author">Posted @ </span>
			<time class="post-date" datetime="<?php  the_time('Y-m-d G:H'); ?>"
				title="<?php  the_time('Y-m-d G:H'); ?>"><?php  the_time('Y-m-d G:H'); ?></time>
             <?php
            if (function_exists("the_views")) {
                echo '<span>阅读(';
                the_views();
                echo ')</span>';
            }
            ?> 
            <span>评论(<?php  echo get_post()->comment_count; ?>)</span>
        </div>
	</div>
	<div class="post-content">
		<p><?php  
		if (is_page()) {
		    the_content();
		} else {
		    the_excerpt(200);
		}
		 ?></p>
	</div>

	<?php if (!is_page()) :?>
	<footer class="post-footer clearfix">
		<div class="post-permalink">
			<a href="<?php  the_permalink();?>" class="btn btn-default">阅读全文</a>
			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( '编辑')
				), '',  '',  0,  'btn-primary btn home_btn '
			);
		?>
		</div>
	</footer>
	<?php endif;?>
</article>

