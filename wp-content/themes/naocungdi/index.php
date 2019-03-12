<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
                                <h1>Cẩm nang du lịch</h1>
                                <p>Nào Cùng Đi sẽ giúp bạn khám phá chi tiết mọi địa điểm du lịch tại Việt Nam</p>
                                <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
                        </div>
                </div>
        </section>
        <?php endif; wp_reset_postdata(); ?>
        <!-- End Slider Home -->
        <!-- List Travel -->
        <section class="travel">
                <h2>Điểm đến du lịch nổi tiếng</h2>
                <div class="line-title">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                </div>
                <div class="container">
                        <h3 class="col-xs-12 sub-title">Khám phá ngay các địa điểm tham quan du lịch hàng đầu châu Á</h3>
                        <div class="multiple-slides">
                                <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                        <div class="travel-destination" style="background-image:url(<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/singapore.jpg)">
                                                                <a href="https://naocungdi.com/du-lich-singapore-tu-tuc/">
                                                                        <p>Singapore</p>
                                                                </a>
                                                        </div>
                                                </div>
                                                <div class="swiper-slide">
                                                        <div class="travel-destination" style="background-image:url(<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/bangkok.jpg)">
                                                                <a href="https://naocungdi.com/du-lich-bangkok-tu-tuc-4-ngay-3-dem/">
                                                                        <p>Bangkok</p>
                                                                </a>
                                                        </div>
                                                </div>
                                                <div class="swiper-slide">
                                                        <div class="travel-destination" style="background-image:url(<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/bali.jpg)">
                                                                <a href="https://naocungdi.com/du-lich-bali-tu-tuc-6-ngay-5-dem/">
                                                                        <p>Bali</p>
                                                                </a>
                                                        </div>
                                                </div>
                                                <div class="swiper-slide">
                                                        <div class="travel-destination" style="background-image:url(<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/kuala-lumpur.jpg)">
                                                                <a href="https://naocungdi.com/du-lich-kuala-lumpur-tu-tuc-3-ngay-2-dem/">
                                                                        <p>Kuala Lumpur</p>
                                                                </a>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                        </div>
                        <h3 class="col-xs-12 sub-title">Khám phá ngay các địa điểm tham quan du lịch nổi tiếng tại Việt Nam</h3>
                        <div class="multiple-slides">
                                <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                        <div class="travel-destination" style="background-image:url(<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/da-nang.jpg)">
                                                                <a href="https://naocungdi.com/du-lich-da-nang-tu-tuc/">
                                                                        <p>Đà Nẵng</p>
                                                                </a>
                                                        </div>
                                                </div>
                                                <div class="swiper-slide">
                                                        <div class="travel-destination" style="background-image:url(<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/nha-trang.jpg)">
                                                                <a href="https://naocungdi.com/du-lich-nha-trang-tu-tuc/">
                                                                        <p>Nha Trang</p>
                                                                </a>
                                                        </div>
                                                </div>
                                                <div class="swiper-slide">
                                                        <div class="travel-destination" style="background-image:url(<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/quy-nhon.jpg)">
                                                                <a href="https://naocungdi.com/du-lich-quy-nhon-tu-tuc/">
                                                                        <p>Quy Nhơn</p>
                                                                </a>
                                                        </div>
                                                </div>
                                                <div class="swiper-slide">
                                                        <div class="travel-destination" style="background-image:url(<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/phan-thiet.jpg)">
                                                                <a href="https://naocungdi.com/du-lich-lagi-tu-tuc/">
                                                                        <p>Lagi</p>
                                                                </a>
                                                        </div>
                                                </div>
                                                <div class="swiper-slide">
                                                        <div class="travel-destination" style="background-image:url(<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/quang-binh.jpg)">
                                                                <a href="#">
                                                                        <p>Quảng Bình</p>
                                                                </a>
                                                        </div>
                                                </div>
                                                <div class="swiper-slide">
                                                        <div class="travel-destination" style="background-image:url(<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/hue.jpg)">
                                                                <a href="https://naocungdi.com/du-lich-hue-tu-tuc/">
                                                                        <p>Huế</p>
                                                                </a>
                                                        </div>
                                                </div>
                                                <div class="swiper-slide">
                                                        <div class="travel-destination" style="background-image:url(<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/ninh-binh.jpg)">
                                                                <a href="#">
                                                                        <p>Ninh Bình</p>
                                                                </a>
                                                        </div>
                                                </div>
                                                <div class="swiper-slide">
                                                        <div class="travel-destination" style="background-image:url(<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/sapa.jpg)">
                                                                <a href="https://naocungdi.com/du-lich-sapa-tu-tuc/">
                                                                        <p>Sapa</p>
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
        <?php $args_duan = array('category_name' => 'kinh-nghiem-du-lich', 'posts_per_page' => 4); ?>
        <?php $query_duan = new WP_Query($args_duan); ?>
        <?php if ($query_duan->have_posts()) : ?>
        <section class="project">
                <h2 class="moveTop-500 duration-1000 hidden">Kinh nghiệm du lịch</h2>
                <div class="line-title moveTop-500 duration-1000 hidden">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                </div>
                <div class="container">
                        <div class="row">
                                <h3 class="col-xs-12 sub-title moveTop-500 duration-1000 hidden">Cùng tìm hiểu những chia sẻ kinh nghiệm du lịch tự túc</h3>
                                <div class="col-lg-8">
                                        <div class="cat-project moveRight-500 duration-1000 hidden">
                                                <a href="https://naocungdi.com/cam-nang-du-lich/">
                                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/travel.jpg" alt="travel">
                                                        <div class="info-cat">
                                                                <h3>Chia sẻ kinh nghiệm du lịch</h3>
                                                                <p class="sub-info">Du lịch tiết kiệm hơn nhờ những chia sẻ kinh nghiệm du lịch từ Nào Cùng Đi</p>
                                                                <p class="btn"><i class="fas fa-walking"></i> Nào cùng khám phá</p>
                                                        </div>
                                                </a>
                                        </div>
                                </div>
                                <?php $number_duan = 1; ?>
                                <?php while ($query_duan->have_posts()) : $query_duan->the_post(); ?>
                                <div class="col-lg-4 col-sm-6 col-xs-12">
                                        <div class="one-project <?php if ($number_duan == 1) { echo 'moveLeft-500'; } elseif ($number_duan == 2) { echo 'moveRight-500'; } elseif ($number_duan == 3) { echo 'moveTop-500'; } else { echo 'moveLeft-500'; } ?> duration-1000 hidden">
                                                <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('res-img', ['alt' => get_the_title(), 'sizes' => '(max-width:992px) 100vw, 414px' ]); ?>
                                                        <div class="info-project">
                                                                <div class="info-title">
                                                                        <h3 class="name-project"><?php the_title(); ?></h3>
                                                                        <i class="icon-title"></i>
                                                                </div>
                                                                <p class="location-project"><i class="fas fa-map-marker-alt"></i> <?php rwmb_the_value('vi-tri'); ?></p>
                                                                <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                                                <?php if (rwmb_meta('chi-phi-du-lich') != "") : ?>
                                                                <p class="investment-project" data-toggle="tooltip" title="Tổng chi phí chuyến du lịch"><i class="far fa-money-bill-alt"></i> Chi phí: <span class="value"><?php rwmb_the_value('chi-phi-du-lich'); ?><sup>đ</sup></span></p>
                                                                <?php else : ?>
                                                                <p class="investment-project" data-toggle="tooltip" title="Tổng chi phí chuyến du lịch"><i class="far fa-money-bill-alt"></i> Chi phí: <span class="value">chưa cập nhật</span></p>
                                                                <?php endif; ?>
                                                                <div class="clearfix"></div>
                                                        </div>
                                                </a>
                                        </div>
                                </div>
                                <?php $number_duan++; endwhile; ?>
                                <div class="col-xs-12 more-project moveLeft-500 duration-1000 hidden">
                                        <a href="<?php echo home_url(); ?>/cam-nang-du-lich/kinh-nghiem-du-lich/" class="btn btn-outline-danger">Xem thêm nhiều hành trình khác</a>
                                </div>
                        </div>
                </div>
        </section>
        <?php endif; wp_reset_postdata(); ?>
        <!-- End Project -->
        <!-- List Project -->
        <?php $args_tips = array('category_name' => 'bi-quyet-du-lich-tiet-kiem', 'posts_per_page' => 3); ?>
        <?php $query_tips = new WP_Query($args_tips); ?>
        <?php if ($query_tips->have_posts()) : $number_tips = 1; ?>
        <section class="list-project">
                <h2 class="moveTop-300 duration-800 hidden">Bí quyết du lịch tiết kiệm</h2>
                <div class="line-title moveTop-300 duration-800 hidden">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                </div>
                <div class="container">
                        <div class="row">
                                <h3 class="col-xs-12 sub-title moveTop-300 duration-800 hidden">Cùng tham khảo những bí quyết để có một chuyến du lịch siêu tiết kiệm</h3>
                                <?php while($query_tips->have_posts()) : $query_tips->the_post(); ?>
                                <div class="col-sm-6 col-md-4 img-item <?php if($number_tips==2) { echo 'reverse-img moveTop-300'; } else { echo 'moveBottom-300'; } ?> duration-1000 hidden">
										<?php the_post_thumbnail('res-img', ['data-no-lazy' => $number_tips==1 ? 1 : 0, 'alt' => get_the_title(), 'id' => $number_tips==1 ? 'img-get-height' : '' , 'class' => 'bg-project-item', 'sizes' => '(max-width:992px) 100vw, 414px']); ?>
                                        <div class="info-item bottom">
                                                <div class="bg-absolute">
                                                        <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                                </div>
                                        </div>
                                </div>
                                <?php $number_tips++; endwhile; ?>
                                <div class="col-xs-12 more-project moveLeft-500 duration-1000 hidden">
                                        <a href="<?php echo home_url(); ?>/chia-se/bi-quyet-du-lich-tiet-kiem/" class="btn btn-outline-danger">Xem thêm nhiều bí quyết khác</a>
                                </div>
                        </div>
                </div>
        </section>
        <?php endif; wp_reset_postdata(); ?>
        <!-- End List Project -->
        <!-- News - Events -->
        <?php $args_news = array('category_name' => 'cam-nang-du-lich', 'posts_per_page' => 1); ?>
        <?php $query_news = new WP_Query($args_news); ?>
        <?php if ($query_news->have_posts()) : ?>
        <section class="news">
                <h2 class="moveTop-300 duration-800 hidden">Cẩm nang du lịch</h2>
                <div class="group-news moveTop-300 duration-800 hidden">
                        <span id="company-news">Quán ăn ngon</span>
                        <span id="project-news" class="active">Điểm đến thú vị</span>
                        <span id="market-news">Nơi ở tốt</span>
                </div>
                <div class="line-title moveTop-300 duration-800 hidden">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                </div>
                <div class="container moveTop-500 duration-1200 hidden">
                        <div class="swiper-container swiper-tabs">
                                <div class="swiper-wrapper">
                                <?php $args_company_news = array('category_name' => 'dia-chi-an-uong', 'posts_per_page' => 7); ?>
                                <?php $query_company_news = new WP_Query($args_company_news); ?>
                                <?php if ($query_company_news->have_posts()) : ?>
                                        <div class="swiper-slide">
                                                <div class="swiper-container swiper-tab">
                                                        <div class="swiper-wrapper">
                                                        <?php while ($query_company_news->have_posts()) : $query_company_news->the_post(); ?>
                                                                <div class="swiper-slide news-item">
                                                                        <div class="title-news">
                                                                                <div class="img-news"><?php the_post_thumbnail('res-img', ['data-no-lazy' => 1, 'alt' => get_the_title(), 'sizes' => '(max-width:992px) 100vw, 414px' ]); ?></div>
                                                                                <div class="info-news">
                                                                                        <div class="info-title">
                                                                                                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                                                                                <i class="icon-like"></i>
                                                                                        </div>
                                                                                        <p class="location-project"><i class="fas fa-map-marker-alt"></i> <?php rwmb_the_value('vi-tri'); ?></p>
                                                                                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                                                                        <?php if (rwmb_meta('chi-phi-du-lich') != "") : ?>
                                                                                        <p class="investment-project" data-toggle="tooltip" title="Mức giá trung bình"><i class="far fa-money-bill-alt"></i> Mức giá: <span class="value"><?php rwmb_the_value('chi-phi-du-lich'); ?><sup>đ</sup></span></p>
                                                                                        <?php else : ?>
                                                                                        <p class="investment-project" data-toggle="tooltip" title="Mức giá trung bình"><i class="far fa-money-bill-alt"></i> Mức giá: <span class="value">chưa cập nhật</span></p>
                                                                                        <?php endif; ?>
                                                                                        <div class="clearfix"></div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        <?php endwhile; ?>
                                                        </div>
                                                </div>
                                        </div>
                                <?php endif; wp_reset_postdata(); ?>
                                <?php $args_project_news = array('category_name' => 'dia-diem-du-lich', 'posts_per_page' => 7, 'orderby' => 'rand'); ?>
                                <?php $query_project_news = new WP_Query($args_project_news); ?>
                                <?php if ($query_project_news->have_posts()) : ?>
                                        <div class="swiper-slide">
                                                <div class="swiper-container swiper-tab">
                                                        <div class="swiper-wrapper">
                                                        <?php while ($query_project_news->have_posts()) : $query_project_news->the_post(); ?>
                                                                <div class="swiper-slide news-item">
                                                                        <div class="title-news">
                                                                                <div class="img-news"><?php the_post_thumbnail('res-img', ['data-no-lazy' => 1, 'alt' => get_the_title(), 'sizes' => '(max-width:992px) 100vw, 414px' ]); ?></div>
                                                                                <div class="info-news">
                                                                                        <div class="info-title">
                                                                                                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                                                                                <i class="icon-like"></i>
                                                                                        </div>
                                                                                        <p class="location-project"><i class="fas fa-map-marker-alt"></i> <?php rwmb_the_value('vi-tri'); ?></p>
                                                                                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                                                                        <?php if (rwmb_meta('chi-phi-du-lich') != "") : ?>
                                                                                        <p class="investment-project" data-toggle="tooltip" title="Chi phí tham quan điểm du lịch"><i class="far fa-money-bill-alt"></i> Giá vé: <span class="value"><?php rwmb_the_value('chi-phi-du-lich'); if (rwmb_meta('chi-phi-du-lich') != "Miễn phí") { echo '<sup>đ</sup>'; } ?></span></p>
                                                                                        <?php else : ?>
                                                                                        <p class="investment-project" data-toggle="tooltip" title="Chi phí tham quan điểm du lịch"><i class="far fa-money-bill-alt"></i> Giá vé: <span class="value">chưa cập nhật</span></p>
                                                                                        <?php endif; ?>
                                                                                        <div class="clearfix"></div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        <?php endwhile; ?>
                                                        </div>
                                                </div>
                                        </div>
                                <?php endif; wp_reset_postdata(); ?>
                                <?php $args_market_news = array('category_name' => 'khach-san-homestay', 'posts_per_page' => 7); ?>
                                <?php $query_market_news = new WP_Query($args_market_news); ?>
                                <?php if ($query_market_news->have_posts()) : ?>
                                        <div class="swiper-slide">
                                                <div class="swiper-container swiper-tab">
                                                        <div class="swiper-wrapper">
                                                        <?php while ($query_market_news->have_posts()) : $query_market_news->the_post(); ?>
                                                                <div class="swiper-slide news-item">
                                                                        <div class="title-news">
                                                                                <div class="img-news"><?php the_post_thumbnail('res-img', ['data-no-lazy' => 1, 'alt' => get_the_title(), 'sizes' => '(max-width:992px) 100vw, 414px' ]); ?></div>
                                                                                <div class="info-news">
                                                                                        <div class="info-title">
                                                                                                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                                                                                <i class="icon-like"></i>
                                                                                        </div>
                                                                                        <p class="location-project"><i class="fas fa-map-marker-alt"></i> <?php rwmb_the_value('vi-tri'); ?></p>
                                                                                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                                                                        <?php if (rwmb_meta('chi-phi-du-lich') != "") : ?>
                                                                                        <p class="investment-project" data-toggle="tooltip" title="Giá phòng tham khảo"><i class="far fa-money-bill-alt"></i> Giá phòng: <span class="value"><?php rwmb_the_value('chi-phi-du-lich'); ?><sup>đ</sup></span></p>
                                                                                        <?php else : ?>
                                                                                        <p class="investment-project" data-toggle="tooltip" title="Giá phòng tham khảo"><i class="far fa-money-bill-alt"></i> Giá phòng: <span class="value">chưa cập nhật</span></p>
                                                                                        <?php endif; ?>
                                                                                        <div class="clearfix"></div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        <?php endwhile; ?>
                                                        </div>
                                                </div>
                                        </div>
                                <?php endif; wp_reset_postdata(); ?>
                                </div>
                        </div>
                        <div class="swiper-button-prev slide-0"></div>
                        <div class="swiper-button-next slide-0"></div>
                        <div class="swiper-button-prev slide-1"></div>
                        <div class="swiper-button-next slide-1"></div>
                        <div class="swiper-button-prev slide-2"></div>
                        <div class="swiper-button-next slide-2"></div>
                </div>
        </section>
        <?php endif; wp_reset_postdata(); ?>
        <!-- End News - Events -->
<?php get_footer(); ?>