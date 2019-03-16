<?php
/**
 * @package dazzling
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header page-header title-post">

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php dazzling_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<ins class="adsbygoogle"
			 style="display:block; text-align:center;"
			 data-ad-layout="in-article"
			 data-ad-format="fluid"
			 data-ad-client="ca-pub-7392610376438714"
			 data-ad-slot="8056721361">
		</ins>
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
		<ins class="adsbygoogle"
			 style="display:block; text-align:center;"
			 data-ad-layout="in-article"
			 data-ad-format="fluid"
			 data-ad-client="ca-pub-7392610376438714"
			 data-ad-slot="5036764216">
		</ins>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'dazzling' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>
		<?php dazzling_setPostViews(get_the_ID()); ?>
	</footer><!-- .entry-meta -->
	<?php
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	?>
</article><!-- #post-## -->
<?php $slide_gallery = rwmb_meta( 'gallery' ); if (sizeof($slide_gallery) > 0) : ?>
<div class="slide-gallery all-gallery" data-slide=".all-gallery" data-number="0">
	<div class="main-slide">
		<ul>
			<?php
				foreach ( $slide_gallery as $img_slide ) {
					echo '<li><div class="img-gallery">';
                    echo '<img data-src="', $img_slide['url'] ,'" alt="'. $img_slide['title'] .'" />';
                    if ($img_slide['caption']) {
                        echo '<div class="title-gallery">', $img_slide['caption'] ,'</div>';
                    }
                    echo '</div></li>';
				}
			?>
		</ul>
		<div class="updating"><i class="fas fa-spinner"></i></div>
		<i class="previousImg fas fa-angle-left" data-slide=".all-gallery" data-number="0"></i>
		<i class="nextImg fas fa-angle-right" data-slide=".all-gallery" data-number="0"></i>
		<i class="closeGallery fas fa-times" data-number="0"></i>
	</div>
</div>
<?php endif; ?>
<?php for ($i=0; $i < 9; $i++) { 
	$album = 'album-'. ($i+1);
	$album_gallery = rwmb_meta($album);
	if (sizeof($album_gallery) > 0) {
		echo '<div class="slide-gallery ', $album ,'" data-slide=".', $album ,'" data-number="', $i+1 ,'">';
		echo '<div class="main-slide">';
		echo '<ul>';
		foreach ( $album_gallery as $img_album ) {
			echo '<li><div class="img-gallery">';
			echo '<img data-src="', $img_album['url'] ,'" alt="'. $img_album['title'] .'" />';
			if ($img_album['caption']) {
				echo '<div class="title-gallery">', $img_album['caption'] ,'</div>';
			}
			echo '</div></li>';
		}
		echo '</ul>';
		echo '<div class="updating"><i class="fas fa-spinner"></i></div>';
		echo '<i class="previousImg fas fa-angle-left" data-slide=".', $album ,'" data-number="', $i+1 ,'"></i>';
		echo '<i class="nextImg fas fa-angle-right" data-slide=".', $album ,'" data-number="', $i+1 ,'"></i>';
		echo '<i class="closeGallery fas fa-times" data-number="', $i+1 ,'"></i>';
		echo '</div></div>';
	}
} ?>