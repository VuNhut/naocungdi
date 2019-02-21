<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package dazzling
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header page-header moveTop-300 duration-800 hidden">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="line-title">
			<div class="line-one"></div>
			<div class="line-two"></div>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content <?php if (is_page('san-ve-may-bay')) { echo 'introduce'; } elseif (is_page('lien-he')) { echo 'contact'; } ?> moveTop-500 duration-1000 hidden">
		<?php if(is_page('lien-he')) { echo '<div class="container"><div class="row"><div class="col-md-6 contact-info">'; the_content(); echo '</div>'; } else { the_content(); } ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'dazzling' ),
				'after'  => '</div>',
			) );
		?>
		<?php if (is_page('lien-he')) {
			echo '<div class="col-md-6 contact-form"><h4>Form liên hệ</h4>';
			echo do_shortcode('[contact-form-7 id="140" title="Form liên hệ"]');
			echo '</div></div>';
		} ?>
            <?php
            // Checks if this is homepage to enable homepage widgets
            if ( is_front_page() ) :
              get_sidebar( 'home' );
            endif;
          ?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'dazzling' ), '<footer class="entry-meta"><i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
