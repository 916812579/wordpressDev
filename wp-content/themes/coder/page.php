<?php
/*
Template Name: Page 
*/
?>

<?php
get_header();
?>

<div class="row">

	<main class="col-md-8 main-content main-page-content">
	 <?php if ( have_posts() ) : ?>
					<?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/post/page', get_post_format());
    endwhile
    ;

endif;
?>



	</main>
		 <?php
get_template_part('template-parts/sidebar/sidebar_index');
?>

</div>

<?php get_footer(); ?>
