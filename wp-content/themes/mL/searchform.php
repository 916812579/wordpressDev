<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
<div class="search_form_div">
	<form role="search" method="get" class="search-form"
		action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" id="<?php echo $unique_id; ?>"
			class="search-field"
			placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentyseventeen' ); ?>"
			value="<?php echo get_search_query(); ?>" name="s" />
		<button type="submit" class="search-submit btn btn-default"><?php echo ""; ?><span
				class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'twentyseventeen' ); ?></span>
		</button>
	</form>
</div>

