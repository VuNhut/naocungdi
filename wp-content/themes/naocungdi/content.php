<?php
/**
 * @package dazzling
 */
?>
<div class="card moveTop-500 duration-1000 hidden">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content category">
		<?php if ( has_post_thumbnail()) : ?>
		<a class="link-featured-img" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
		 	<?php the_post_thumbnail(); ?>
		</a>
		<?php endif; ?>
		<div>
			<header class="entry-header page-header">
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php dazzling_posted_on(); ?>
				<?php endif; ?>
				<?php edit_post_link( __( 'Edit', 'dazzling' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->
			<?php the_excerpt(); ?>

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
		</div>
	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->
</div>
