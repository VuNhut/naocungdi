<?php
/**
 * The Sidebar widget area for footer.
 *
 * @package dazzling
 */
?>

	<?php
	// If footer sidebars do not have widget let's bail.

	if ( ! is_active_sidebar( 'sidebar-2' ) )
		return;
	// If we made it this far we must have widgets.
	?>
    <?php dynamic_sidebar( 'sidebar-2' ); ?>