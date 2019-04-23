<?php
/**
 * The template for displaying "Wifi & SIM du lich" Category pages.
 *
 *
 * @package dazzling
 */

if($_GET['des']) {
    $des = get_term_by('slug', $_GET['des'], 'post_tag');
    $arg_sim = array('category_name' => 'wifi-sim-du-lich', 'tag' => $_GET['des']);
    $querySim = new WP_Query($arg_sim);
    $arg_airport = array('category_name' => 'xe-dua-don-tai-san-bay', 'tag' => $_GET['des']);
    $queryAirport = new WP_Query($arg_airport);
    $arg_ticket = array('category_name' => 've-tham-quan', 'tag' => $_GET['des']);
    $queryTicket = new WP_Query($arg_ticket);
    $arg_tour = array('category_name' => 'tour-du-lich', 'tag' => $_GET['des']);
    $queryTour = new WP_Query($arg_tour);
    $arg_transport = array('category_name' => 'phuong-tien-di-chuyen', 'tag' => $_GET['des']);
    $queryTransport = new WP_Query($arg_transport);
} else {
    $arg_sim = array('category_name' => 'wifi-sim-du-lich');
    $querySim = new WP_Query($arg_sim);
    $arg_airport = array('category_name' => 'xe-dua-don-tai-san-bay');
    $queryAirport = new WP_Query($arg_airport);
    $arg_ticket = array('category_name' => 've-tham-quan');
    $queryTicket = new WP_Query($arg_ticket);
    $arg_tour = array('category_name' => 'tour-du-lich');
    $queryTour = new WP_Query($arg_tour);
    $arg_transport = array('category_name' => 'phuong-tien-di-chuyen');
    $queryTransport = new WP_Query($arg_transport);
}

$queryCat = $querySim;

get_header(); ?>
<!-- Header -->
<section class="header-voucher">
    <div class="container">
        <div class="row">
            <h1 class="col-xs-12"><?php single_cat_title(); ?></h1>
            <?php include get_template_directory() . '/location-voucher.php'; ?>
            <?php include get_template_directory() . '/header-voucher-cat.php'; ?>
<?php get_footer(); ?>