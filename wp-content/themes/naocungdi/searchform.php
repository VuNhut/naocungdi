<?php
/**
 * The template for displaying search forms in Dazzling
 *
 * @package dazzling
 */
?>
<form method="get" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<div class="input-group">
	    	<input type="text" class="form-control search-query" placeholder="<?php _e( 'Bạn cần tìm gì...', 'dazzling' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	    	<span class="input-group-btn">
	      		<button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="Search"><i class="fas fa-search"></i></button>
	    	</span>
	    </div>
	</div>
</form>