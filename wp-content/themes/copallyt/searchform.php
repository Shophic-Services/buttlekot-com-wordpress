<?php
/**
 * The template for displaying search forms in Copallyt
 *
 */
?>

<form action="<?php echo esc_url( home_url( '/' ) ) ?>" class="searchform" id="searchform" method="get" role="search">
	<div>
		<input type="text" id="s" class="form-control" name="s" value="" placeholder="<?php echo esc_attr__('Search...','copallyt') ?>">
		<button type="submit" value="<?php echo esc_attr__('Search...','copallyt') ?>" id="searchsubmit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
	</div>
</form>


