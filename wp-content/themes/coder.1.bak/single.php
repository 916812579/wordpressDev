<?php
get_header();
?>

<div class="row">

	<main class="col-md-8 main-content">
	
	 <?php if ( have_posts() ) : ?>
					<?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/post/single', get_post_format());
    endwhile
    ;
    
    ?>
 
    <?php
endif;
?>

<div class="related_top">
			<?php include( 'modules/related.php' ); ?>
		</div>
		<?php comments_template('', true); ?>
	</main>
	 <?php
get_template_part('template-parts/sidebar/sidebar_single');
?>
</div>

<?php get_footer(); ?>
