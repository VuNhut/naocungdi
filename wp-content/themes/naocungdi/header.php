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
<?php if(is_page('lien-he')) : ?>
<script>
function myMap() {
  // Map Cityland
  var mapCanvas = document.getElementById("googleMap");
  var myCenter = new google.maps.LatLng(10.790846, 106.701139);
  var mapOptions = {center: myCenter, zoom: 18};
  var map = new google.maps.Map(mapCanvas,mapOptions);
  var marker = new google.maps.Marker({
    position: myCenter,
    animation: google.maps.Animation.BOUNCE
  });
  marker.setMap(map);
  var infowindow = new google.maps.InfoWindow({
    content: "<strong>CÔNG TY TNHH ĐẦU TƯ ĐỊA ỐC THÀNH PHỐ (CITYLAND)</strong> </br> Số 24 Nguyễn Bỉnh Khiêm, Phường Đa Kao, Quận 1, TP. HCM"
  });
  infowindow.open(map,marker);

  // Map trung tâm giao dịch bds cityland park hills
  var mapTrading_1 = document.getElementById("mapTrading-1");
  var pos_1 = new google.maps.LatLng(10.834578, 106.667770);
  var mapOptions_1 = {center: pos_1, zoom: 17};
  var map_1 = new google.maps.Map(mapTrading_1, mapOptions_1);
  var marker_1 = new google.maps.Marker({
    position: pos_1,
    animation: google.maps.Animation.BOUNCE
  });
  marker_1.setMap(map_1);
  var infowindow_1 = new google.maps.InfoWindow({
    content: "<strong>TRUNG TÂM GIAO DỊCH BẤT ĐỘNG SẢN CITYLAND PARK HILLS</strong> </br> Số 18 Phan Văn Trị, Phường 10, Quận Gò Vấp, TP. HCM"
  });
  infowindow_1.open(map_1, marker_1);

  // Map trung tâm giao dịch bds gò vấp
  var mapTrading_2 = document.getElementById("mapTrading-2");
  var pos_2 = new google.maps.LatLng(10.823726, 106.692161);
  var mapOptions_2 = {center: pos_2, zoom: 17};
  var map_2 = new google.maps.Map(mapTrading_2, mapOptions_2);
  var marker_2 = new google.maps.Marker({
    position: pos_2,
    animation: google.maps.Animation.BOUNCE
  });
  marker_2.setMap(map_2);
  var infowindow_2 = new google.maps.InfoWindow({
    content: "<strong>TRUNG TÂM GIAO DỊCH BẤT ĐỘNG SẢN GÒ VẤP</strong> </br> Số 168 Phan Văn Trị, Phường 5, Quận Gò Vấp, TP. HCM"
  });
  infowindow_2.open(map_2, marker_2);

  // Map trung tâm giao dịch bds quận 7
  var mapTrading_3 = document.getElementById("mapTrading-3");
  var pos_3 = new google.maps.LatLng(10.737693, 106.725300);
  var mapOptions_3 = {center: pos_3, zoom: 17};
  var map_3 = new google.maps.Map(mapTrading_3, mapOptions_3);
  var marker_3 = new google.maps.Marker({
    position: pos_3,
    animation: google.maps.Animation.BOUNCE
  });
  marker_3.setMap(map_3);
  var infowindow_3 = new google.maps.InfoWindow({
    content: "<strong>TRUNG TÂM GIAO DỊCH BẤT ĐỘNG SẢN QUẬN 7</strong> </br> Số 99, Nguyễn Thị Thập, P. Tân Phú, Q.7, TP.HCM"
  });
  infowindow_3.open(map_3, marker_3);
}
</script>
<?php endif; ?>
</head>

<body <?php body_class('preload'); ?>>
<div id="page" class="hfeed site">
	<section class="header">
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-xs-5">
            <?php if( get_header_image() != '' ) : ?>
              <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
            <?php endif; // header image was removed ?>
            <?php if( !get_header_image() ) : ?>
              <a class="navbar-brand col-sm-4" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            <?php endif; // header image was removed (again) ?>
          </div>
          <div class="col-sm-9 col-xs-7 right-header">
            <?php dazzling_header_menu(); ?>
            <button class="navbar-toggler hidden-lg-up" type="button"></button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php if(is_single() && in_category('tin-tuc-su-kien')) : ?>
    <div class="bg-top bg-top-news moveTop-300 duration-800 hidden"></div>
  <?php endif; ?>
  <?php if(is_page(array('gioi-thieu', 'lien-he', 'tuyen-dung'))) : ?>
  <div class="img-header moveTop-300 duration-800 hidden">
    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
  </div>
  <?php endif; ?>
  <?php if(!is_home() && (!(is_single() && in_category(array('du-an')))) && (!is_page('tuyen-dung'))) : ?>
  <div id="content" class="site-content <?php if(!is_page('gioi-thieu')) { echo 'container'; } ?>">

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