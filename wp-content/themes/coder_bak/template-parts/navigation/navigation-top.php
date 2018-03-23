<?php
/**
 * Displays top navigation
 */
?>
<nav class="main-navigation">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="collapse navbar-collapse" id="main-menu">
				<?php
    wp_nav_menu(array(
        'theme_location' => 'top',
        'items_wrap' => '<ul id="%1$s" class="%2$s menu">%3$s</ul>'
    ));
    ?>
				</div>
			</div>
		</div>
	</div>
	
</nav>

<!-- #site-navigation -->
