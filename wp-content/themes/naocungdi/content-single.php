<?php
/**
 * @package dazzling
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('moveRight-500 duration-1000 delay-800 hidden'); ?>>
	<header class="entry-header page-header title-post">

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php dazzling_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'            => '<div class="page-links">'.__( 'Pages:', 'dazzling' ),
				'after'             => '</div>',
				'link_before'       => '<span>',
				'link_after'        => '</span>',
				'pagelink'          => '%',
				'echo'              => 1
       		) );
    	?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'dazzling' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>
		<?php dazzling_setPostViews(get_the_ID()); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
