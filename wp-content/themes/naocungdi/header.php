<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package dazzling
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-85774804-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-85774804-1');
</script>
<?php if (! is_home() ) : ?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<?php endif; ?>

</head>

<body <?php if(in_category('shop-phuot') && !is_single()) { body_class('shop-phuot preload'); } else { body_class('preload'); } ?>>
<!-- <div id="preloader-wrapper">
  <div class="preloader-container">
    <div class="dot dot-1">
      <div class="dot dot-2"></div>
      <div class="dot dot-3"></div>
    </div>
  </div>
</div> -->
<div id="page" class="hfeed site">
	<section class="header">
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="<?php if (is_home()) { echo 'col-lg-3 col-sm-5 col-xs-8'; } else { echo 'col-lg-3 col-sm-10 col-xs-8'; }  ?>">
            <?php if( get_header_image() != '' ) : ?>
              <?php if (is_home()) : ?>
              <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img data-no-lazy="1" src="<?php echo home_url(); ?>/wp-content/uploads/2018/08/logo-naocungdi-white.png" alt="<?php bloginfo( 'name' ); ?>"/></a>
              <?php else : ?>
              <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img data-no-lazy="1" src="<?php echo home_url(); ?>/wp-content/uploads/2018/08/logo-naocungdi.png" alt="<?php bloginfo( 'name' ); ?>"/></a>
              <?php endif;?>
            <?php endif; // header image was removed ?>
            <?php if( !get_header_image() ) : ?>
              <a class="navbar-brand col-sm-4" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            <?php endif; // header image was removed (again) ?>
          </div>
          <?php if (!is_home()) : ?>
          <div class="col-lg-2 col-sm-1 col-xs-2 search-header">
            <p>Tìm kiếm...<i class="fas fa-search"></i></p>
            <i class="fas fa-search search-mobile"></i>
          </div>
          <?php endif; ?>
          <div class="<?php if (is_home()) { echo 'col-lg-9 col-sm-7 col-xs-4'; } else { echo 'col-lg-7 col-sm-1 col-xs-2'; } ?> right-header">
            <?php dazzling_header_menu(); ?>
            <button class="navbar-toggler hidden-lg-up" type="button"></button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
    if(is_single() && in_category('chia-se')) :
      $image = rwmb_meta('bg-top');
      if ($image['url'] != "") {
        echo '<div class="bg-top" style="background-image:url(', $image['url'] ,')"></div>';
      }
    endif;
  ?>
  <?php if(is_page(array('san-ve-may-bay', 'lien-he'))) : ?>
  <div class="img-header">
    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
  </div>
  <?php endif; ?>
  <?php if(!is_home() && !in_category('shop-phuot') && (!(is_single() && in_category(array('cam-nang-du-lich', 've-tham-quan', 'shop-phuot')))) ) : ?>
  <div id="content" class="site-content <?php if(!is_page('san-ve-may-bay')) { echo 'container'; } ?>">
    <div class="container main-content-area"><?php
      global $post;
      if( get_post_meta($post->ID, 'site_layout', true) ){
        $layout_class = get_post_meta($post->ID, 'site_layout', true);
      }
      else{
        $layout_class = of_get_option( 'site_layout' );
      }
      if( is_home() && is_sticky( $post->ID ) ){
        $layout_class = of_get_option( 'site_layout' );
      }
      ?>
      <div class="row <?php echo $layout_class; ?>">
  <?php endif; ?>