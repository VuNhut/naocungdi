<?php
/**
 * The template for displaying "Shop Phuot" Archive pages.
 *
 *
 * @package dazzling
 */

get_header(); ?>
        <!-- Slider Home -->
        <?php $args_slider = array('category_name' => 'slider-home', 'posts_per_page' => 4); ?>
        <?php $query_slider = new WP_Query($args_slider); ?>
        <?php if ($query_slider->have_posts()) : $post_slider = 0; ?>
        <section class="slider">
                <div id="wowslider-container1">
                        <div class="ws_images">
                                <ul>
                                <?php while ($query_slider->have_posts()) : $query_slider->the_post(); ?>
				        <li><img width="100vw" height="calc(100vw/2.39)" src="<?php the_post_thumbnail_url(); ?>" srcset="<?php the_post_thumbnail_url(); ?> 1920w, <?php the_post_thumbnail_url('medium-img'); ?> 768w, <?php the_post_thumbnail_url('small-img'); ?> 414w"/></li>
                                <?php $post_slider++; endwhile; ?>
                                </ul>
                        </div>
                        <div class="ws_shadow"></div>
                        <div class="inner-banner">
                                <h1>Shop phượt</h1>
                                <p>Nào Cùng Đi chuyên cung cấp đồ phượt, dụng cụ cần thiết cho các chuyến đi trekking</p>
                                <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
                        </div>
                </div>
        </section>
        <?php endif; wp_reset_postdata(); ?>
        <!-- End Slider Home -->
        <!-- List Travel -->
        <section class="travel">
                <h2>Shop đồ phượt</h2>
                <div class="line-title">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                </div>
                <div class="container">
                    <h3 class="col-xs-12 sub-title">Chuyên cung cấp dụng cụ bảo hộ xe máy, dụng cụ trekking chính hãng</h3>
                    <div class="multiple-slides">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="travel-destination" style="background-image:url(<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/gang-tay-phuot.jpg)">
                                        <a href="<?php echo home_url(); ?>/shop-phuot/gang-tay/">
                                            <p>Găng tay</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="travel-destination" style="background-image:url(<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/non-bao-hiem.jpg)">
                                        <a href="<?php echo home_url(); ?>/shop-phuot/non-bao-hiem/">
                                            <p>Nón bảo hiểm</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="travel-destination" style="background-image:url(<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/giap-bao-ho.jpg)">
                                        <a href="<?php echo home_url(); ?>/shop-phuot/giap-bao-ho/">
                                            <p>Giáp bảo hộ</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="travel-destination" style="background-image:url(<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/phu-kien-phuot.jpg)">
                                        <a href="<?php echo home_url(); ?>/shop-phuot/phu-kien/">
                                            <p>Phụ kiện</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
        </section>
        <!-- End List Travel -->
        <!-- Project -->
        <?php $args_duan = array('category_name' => 'shop-phuot', 'meta_key' => 'sold-product', 'orderby' => array('meta_value_num' => 'DESC'), 'posts_per_page' => 8); ?>
        <?php $query_duan = new WP_Query($args_duan); ?>
        <?php if ($query_duan->have_posts()) : ?>
        <section class="project hot-product">
                <h2>Sản phẩm bán chạy</h2>
                <div class="line-title">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                </div>
                <div class="container">
                        <div class="row">
                                <h3 class="col-xs-12 sub-title">Top 8 sản phẩm bán chạy nhất</h3>
                                <?php while ($query_duan->have_posts()) : $query_duan->the_post(); $info_product = rwmb_meta('chi-tiet-san-pham'); ?>
                                <div class="col-lg-3 col-md-4 col-xs-6">
                                        <div class="one-project">
                                                <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail('res-img', ['alt' => get_the_title(), 'sizes' => '(max-width:992px) 100vw, 414px' ]); ?>
                                                        <div class="info-project">
                                                                <div class="info-title">
                                                                        <h3 class="name-project"><?php the_title(); ?></h3>
                                                                </div>
                                                                <p class="location-project"><?php echo $info_product['so-luong-da-ban']; ?>+ đã bán</p>
                                                                <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                                                <?php if ($info_product['gia-khuyen-mai'] != "") : ?>
                                                                <p class="investment-project"><span class="market-price"><?php echo number_format($info_product['gia-thi-truong'], 0, ",", "."); ?><sup>đ</sup></span> <span class="value"><?php echo number_format($info_product['gia-khuyen-mai'], 0, ",", "."); ?><sup>đ</sup></span></p>
                                                                <?php else : ?>
                                                                <p class="investment-project"><span class="value"><?php echo number_format($info_product['gia-thi-truong'], 0, ",", "."); ?><sup>đ</sup></span></p>
                                                                <?php endif; ?>
                                                                <div class="clearfix"></div>
                                                        </div>
                                                </a>
                                        </div>
                                </div>
                                <?php endwhile; ?>
                        </div>
                </div>
        </section>
        <?php endif; wp_reset_postdata(); ?>
        <!-- End Project -->
        <!-- Găng Tay -->
        <?php $args_duan = array('category_name' => 'gang-tay', 'orderby' => 'rand', 'posts_per_page' => 8); ?>
        <?php $query_duan = new WP_Query($args_duan); ?>
        <?php if ($query_duan->have_posts()) : ?>
        <section class="project gang-tay">
                <h2>Găng tay phượt</h2>
                <div class="line-title">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                </div>
                <div class="container">
                        <div class="row">
                                <h3 class="col-xs-12 sub-title">Găng tay phượt Pro-Biker, Kawasaki, KTM, Oakley</h3>
                                <div class="multiple-slides">
                                        <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                        <?php while ($query_duan->have_posts()) : $query_duan->the_post(); $info_product = rwmb_meta('chi-tiet-san-pham'); ?>
                                                        <div class="swiper-slide">
                                                                <div class="one-project">
                                                                        <a href="<?php the_permalink(); ?>">
                                                                                <?php the_post_thumbnail('res-img', ['alt' => get_the_title(), 'sizes' => '(max-width:992px) 100vw, 414px' ]); ?>
                                                                                <div class="info-project">
                                                                                        <div class="info-title">
                                                                                                <h3 class="name-project"><?php the_title(); ?></h3>
                                                                                        </div>
                                                                                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                                                                        <?php if ($info_product['gia-khuyen-mai'] != "") : ?>
                                                                                        <p class="investment-project"><span class="market-price"><?php echo number_format($info_product['gia-thi-truong'], 0, ",", "."); ?><sup>đ</sup></span> <span class="value"><?php echo number_format($info_product['gia-khuyen-mai'], 0, ",", "."); ?><sup>đ</sup></span></p>
                                                                                        <?php else : ?>
                                                                                        <p class="investment-project"><span class="value"><?php echo number_format($info_product['gia-thi-truong'], 0, ",", "."); ?><sup>đ</sup></span></p>
                                                                                        <?php endif; ?>
                                                                                        <?php if ($info_product['so-luong-da-ban']) : ?>
                                                                                        <p class="sold-project"><i class="fas fa-shopping-cart"></i> <?php echo $info_product['so-luong-da-ban']; ?>+ đã bán</p>
                                                                                        <?php endif; ?>
                                                                                        <div class="clearfix"></div>
                                                                                </div>
                                                                        </a>
                                                                </div>
                                                        </div>
                                                        <?php endwhile; ?>
                                                </div>
                                        </div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                </div>
                        </div>
                </div>
        </section>
        <?php endif; wp_reset_postdata(); ?>
        <!-- End Găng Tay -->
        <!-- Nón Bảo Hiểm -->
        <?php $args_duan = array('category_name' => 'non-bao-hiem', 'orderby' => 'rand', 'posts_per_page' => 8); ?>
        <?php $query_duan = new WP_Query($args_duan); ?>
        <?php if ($query_duan->have_posts()) : ?>
        <section class="project non-bao-hiem">
                <h2>Nón bảo hiểm</h2>
                <div class="line-title">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                </div>
                <div class="container">
                        <div class="row">
                                <h3 class="col-xs-12 sub-title">Nón bảo hiểm AGU, Torc, Royal chính hãng</h3>
                                <div class="multiple-slides">
                                        <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                        <?php while ($query_duan->have_posts()) : $query_duan->the_post(); $info_product = rwmb_meta('chi-tiet-san-pham'); ?>
                                                        <div class="swiper-slide">
                                                                <div class="one-project">
                                                                        <a href="<?php the_permalink(); ?>">
                                                                                <?php the_post_thumbnail('res-img', ['alt' => get_the_title(), 'sizes' => '(max-width:992px) 100vw, 414px' ]); ?>
                                                                                <div class="info-project">
                                                                                        <div class="info-title">
                                                                                                <h3 class="name-project"><?php the_title(); ?></h3>
                                                                                        </div>
                                                                                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                                                                        <?php if ($info_product['gia-khuyen-mai'] != "") : ?>
                                                                                        <p class="investment-project"><span class="market-price"><?php echo number_format($info_product['gia-thi-truong'], 0, ",", "."); ?><sup>đ</sup></span> <span class="value"><?php echo number_format($info_product['gia-khuyen-mai'], 0, ",", "."); ?><sup>đ</sup></span></p>
                                                                                        <?php else : ?>
                                                                                        <p class="investment-project"><span class="value"><?php echo number_format($info_product['gia-thi-truong'], 0, ",", "."); ?><sup>đ</sup></span></p>
                                                                                        <?php endif; ?>
                                                                                        <?php if ($info_product['so-luong-da-ban']) : ?>
                                                                                        <p class="sold-project"><i class="fas fa-shopping-cart"></i> <?php echo $info_product['so-luong-da-ban']; ?>+ đã bán</p>
                                                                                        <?php endif; ?>
                                                                                        <div class="clearfix"></div>
                                                                                </div>
                                                                        </a>
                                                                </div>
                                                        </div>
                                                        <?php endwhile; ?>
                                                </div>
                                        </div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                </div>
                        </div>
                </div>
        </section>
        <?php endif; wp_reset_postdata(); ?>
        <!-- End Nón Bảo Hiểm -->
        <!-- Giáp Bảo Hộ -->
        <?php $args_duan = array('category_name' => 'giap-bao-ho', 'orderby' => 'rand', 'posts_per_page' => 8); ?>
        <?php $query_duan = new WP_Query($args_duan); ?>
        <?php if ($query_duan->have_posts()) : ?>
        <section class="project giap-bao-ho">
                <h2>Giáp bảo hộ</h2>
                <div class="line-title">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                </div>
                <div class="container">
                        <div class="row">
                                <h3 class="col-xs-12 sub-title">Bảo hộ toàn diện, giúp chuyến đi của bạn trở nên an toàn hơn</h3>
                                <div class="multiple-slides">
                                        <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                        <?php while ($query_duan->have_posts()) : $query_duan->the_post(); $info_product = rwmb_meta('chi-tiet-san-pham'); ?>
                                                        <div class="swiper-slide">
                                                                <div class="one-project">
                                                                        <a href="<?php the_permalink(); ?>">
                                                                                <?php the_post_thumbnail('res-img', ['alt' => get_the_title(), 'sizes' => '(max-width:992px) 100vw, 414px' ]); ?>
                                                                                <div class="info-project">
                                                                                        <div class="info-title">
                                                                                                <h3 class="name-project"><?php the_title(); ?></h3>
                                                                                        </div>
                                                                                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                                                                        <?php if ($info_product['gia-khuyen-mai'] != "") : ?>
                                                                                        <p class="investment-project"><span class="market-price"><?php echo number_format($info_product['gia-thi-truong'], 0, ",", "."); ?><sup>đ</sup></span> <span class="value"><?php echo number_format($info_product['gia-khuyen-mai'], 0, ",", "."); ?><sup>đ</sup></span></p>
                                                                                        <?php else : ?>
                                                                                        <p class="investment-project"><span class="value"><?php echo number_format($info_product['gia-thi-truong'], 0, ",", "."); ?><sup>đ</sup></span></p>
                                                                                        <?php endif; ?>
                                                                                        <?php if ($info_product['so-luong-da-ban']) : ?>
                                                                                        <p class="sold-project"><i class="fas fa-shopping-cart"></i> <?php echo $info_product['so-luong-da-ban']; ?>+ đã bán</p>
                                                                                        <?php endif; ?>
                                                                                        <div class="clearfix"></div>
                                                                                </div>
                                                                        </a>
                                                                </div>
                                                        </div>
                                                        <?php endwhile; ?>
                                                </div>
                                        </div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                </div>
                        </div>
                </div>
        </section>
        <?php endif; wp_reset_postdata(); ?>
        <!-- End Giáp Bảo Hộ -->
        <!-- Phụ Kiện Phượt -->
        <?php $args_duan = array('category_name' => 'phu-kien', 'orderby' => 'rand', 'posts_per_page' => 8); ?>
        <?php $query_duan = new WP_Query($args_duan); ?>
        <?php if ($query_duan->have_posts()) : ?>
        <section class="project phu-kien">
                <h2>Phụ kiện phượt</h2>
                <div class="line-title">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                </div>
                <div class="container">
                        <div class="row">
                                <h3 class="col-xs-12 sub-title">Đèn pin siêu sáng, đèn đội đầu 3 bóng, móc khóa đa năng</h3>
                                <div class="multiple-slides">
                                        <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                        <?php while ($query_duan->have_posts()) : $query_duan->the_post(); $info_product = rwmb_meta('chi-tiet-san-pham'); ?>
                                                        <div class="swiper-slide">
                                                                <div class="one-project">
                                                                        <a href="<?php the_permalink(); ?>">
                                                                                <?php the_post_thumbnail('res-img', ['alt' => get_the_title(), 'sizes' => '(max-width:992px) 100vw, 414px' ]); ?>
                                                                                <div class="info-project">
                                                                                        <div class="info-title">
                                                                                                <h3 class="name-project"><?php the_title(); ?></h3>
                                                                                        </div>
                                                                                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                                                                        <?php if ($info_product['gia-khuyen-mai'] != "") : ?>
                                                                                        <p class="investment-project"><span class="market-price"><?php echo number_format($info_product['gia-thi-truong'], 0, ",", "."); ?><sup>đ</sup></span> <span class="value"><?php echo number_format($info_product['gia-khuyen-mai'], 0, ",", "."); ?><sup>đ</sup></span></p>
                                                                                        <?php else : ?>
                                                                                        <p class="investment-project"><span class="value"><?php echo number_format($info_product['gia-thi-truong'], 0, ",", "."); ?><sup>đ</sup></span></p>
                                                                                        <?php endif; ?>
                                                                                        <?php if ($info_product['so-luong-da-ban']) : ?>
                                                                                        <p class="sold-project"><i class="fas fa-shopping-cart"></i> <?php echo $info_product['so-luong-da-ban']; ?>+ đã bán</p>
                                                                                        <?php endif; ?>
                                                                                        <div class="clearfix"></div>
                                                                                </div>
                                                                        </a>
                                                                </div>
                                                        </div>
                                                        <?php endwhile; ?>
                                                </div>
                                        </div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                </div>
                        </div>
                </div>
        </section>
        <?php endif; wp_reset_postdata(); ?>
        <!-- End Phụ Kiện Phượt -->
        <!-- News - Events -->
        <?php $args_news = array('category_name' => 'kinh-nghiem-du-lich', 'posts_per_page' => 8); ?>
        <?php $query_news = new WP_Query($args_news); ?>
        <?php if ($query_news->have_posts()) : ?>
        <section class="project news">
                <h2>Kinh nghiệm du lịch</h2>
                <div class="line-title">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                </div>
                <div class="container">
                        <div class="row">
                                <h3 class="col-xs-12 sub-title">Chia sẻ kinh nghiệm và bí quyết du lịch tiết kiệm</h3>
                                <div class="multiple-slides">
                                        <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                        <?php while ($query_news->have_posts()) : $query_news->the_post(); $info_product = rwmb_meta('chi-tiet-san-pham'); ?>
                                                        <div class="swiper-slide">
                                                                <div class="one-project">
                                                                        <a href="<?php the_permalink(); ?>">
                                                                                <?php the_post_thumbnail('res-img', ['alt' => get_the_title(), 'sizes' => '(max-width:992px) 100vw, 414px' ]); ?>
                                                                                <div class="info-project">
                                                                                        <div class="info-title">
                                                                                                <h3 class="name-project"><?php the_title(); ?></h3>
                                                                                        </div>
                                                                                        <p class="location-project"><i class="fas fa-map-marker-alt"></i> <?php rwmb_the_value('vi-tri'); ?></p>
                                                                                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                                                                        <div class="clearfix"></div>
                                                                                </div>
                                                                        </a>
                                                                </div>
                                                        </div>
                                                        <?php endwhile; ?>
                                                </div>
                                        </div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                </div>
                        </div>
                </div>
        </section>
        <?php endif; wp_reset_postdata(); ?>
        <!-- End News - Events -->
<?php get_footer(); ?>