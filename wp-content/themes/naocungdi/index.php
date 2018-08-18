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
        <section class="slider moveTop-500 duration-1000 hidden">
                <div id="wowslider-container1">
                        <div class="ws_images">
                                <ul>
                                <?php while ($query_slider->have_posts()) : $query_slider->the_post(); ?>
                                        <li><a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" id="wows1_<?php echo $post_slider; ?>"/></a></li>
                                <?php $post_slider++; endwhile; ?>
                                </ul>
                        </div>
                        <div class="ws_shadow"></div>
                </div>
        </section>
        <?php endif; ?>
        <!-- End Slider Home -->
        <!-- List Travel -->
        <section class="travel">
                <h2 class="moveTop-500 duration-1000 hidden">Dự án đang triển khai</h2>
                <div class="line-title moveTop-500 duration-1000 hidden">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                </div>
                <div class="container">
                        <div class="row">
                                <h3 class="col-xs-12 sub-title">Khám phá ngay các địa điểm tham quan du lịch hàng đầu châu Á</h3>
                                <div class="col-lg-3 col-xs-6">
                                        <div class="travel-destination">
                                                <a href="#">
                                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/singapore.webp" alt="singapore">
                                                        <p>Singapore</p>
                                                </a>
                                        </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                        <div class="travel-destination">
                                                <a href="#">
                                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/bangkok.webp" alt="bangkok">
                                                        <p>Bangkok</p>
                                                </a>
                                        </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                        <div class="travel-destination">
                                                <a href="#">
                                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/bali.webp" alt="bali">
                                                        <p>Bali</p>
                                                </a>
                                        </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                        <div class="travel-destination">
                                                <a href="#">
                                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/kuala-lumpur.webp" alt="kuala-lumpur">
                                                        <p>Kuala Lumpur</p>
                                                </a>
                                        </div>
                                </div>
                                <h3 class="col-xs-12 sub-title">Khám phá ngay các địa điểm tham quan du lịch nổi tiếng tại Việt Nam</h3>
                                <div class="col-lg-3 col-xs-6">
                                        <div class="travel-destination">
                                                <a href="#">
                                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/da-nang.webp" alt="đà nẵng">
                                                        <p>Đà Nẵng</p>
                                                </a>
                                        </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                        <div class="travel-destination">
                                                <a href="#">
                                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/nha-trang.webp" alt="nha trang">
                                                        <p>Nha Trang</p>
                                                </a>
                                        </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                        <div class="travel-destination">
                                                <a href="#">
                                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/quy-nhon.webp" alt="quy nhơn">
                                                        <p>Quy Nhơn</p>
                                                </a>
                                        </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                        <div class="travel-destination">
                                                <a href="#">
                                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/phan-thiet.webp" alt="phan thiết">
                                                        <p>Phan Thiết</p>
                                                </a>
                                        </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                        <div class="travel-destination">
                                                <a href="#">
                                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/quang-binh.webp" alt="quảng bình">
                                                        <p>Quảng Bình</p>
                                                </a>
                                        </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                        <div class="travel-destination">
                                                <a href="#">
                                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/hue.webp" alt="huế">
                                                        <p>Huế</p>
                                                </a>
                                        </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                        <div class="travel-destination">
                                                <a href="#">
                                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/ninh-binh.webp" alt="ninh bình">
                                                        <p>Ninh Bình</p>
                                                </a>
                                        </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                        <div class="travel-destination">
                                                <a href="#">
                                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/sapa.webp" alt="sapa">
                                                        <p>Sapa</p>
                                                </a>
                                        </div>
                                </div>
                        </div>
                </div>
        </section>
        <!-- End List Travel -->
        <!-- Project -->
        <?php $args_duan = array('category_name' => 'du-an', 'posts_per_page' => 4); ?>
        <?php $query_duan = new WP_Query($args_duan); ?>
        <?php if ($query_duan->have_posts()) : ?>
        <section class="project">
                <h2 class="moveTop-500 duration-1000 hidden">Dự án đang triển khai</h2>
                <div class="line-title moveTop-500 duration-1000 hidden">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                </div>
                <div class="container">
                        <div class="row">
                                <h3 class="col-xs-12 sub-title">Cùng tìm hiểu những chuyến hành trình du lịch thú vị</h3>
                                <div class="col-lg-8">
                                        <div class="cat-project">
                                                <a href="#">
                                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/travel.webp" alt="travel">
                                                        <div class="info-cat">
                                                                <h3>Chia sẻ kinh nghiệm du lịch</h3>
                                                                <p class="sub-info">Du lịch tiết kiệm hơn nhờ những chia sẻ kinh nghiệm du lịch từ Nào Cùng Đi</p>
                                                                <p class="btn"><i class="fas fa-motorcycle"></i> Nào cùng khám phá</p>
                                                        </div>
                                                </a>
                                        </div>
                                </div>
                                <?php $number_duan = 1; ?>
                                <?php while ($query_duan->have_posts()) : $query_duan->the_post(); ?>
                                <div class="col-lg-4 col-sm-6 col-xs-12">
                                        <div class="one-project <?php if ($number_duan == 1) { echo 'moveRight-500'; } elseif ($number_duan == 2) { echo 'moveTop-500'; } else { echo 'moveLeft-500'; } ?> duration-1000 hidden">
                                                <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail(); ?>
                                                        <div class="info-project">
                                                                <div class="info-title">
                                                                        <h3 class="name-project"><?php the_title(); ?></h3>
                                                                        <i class="icon-title"></i>
                                                                </div>
                                                                <p class="location-project"><i class="fas fa-map-marker-alt"></i> <?php rwmb_the_value('vi-tri'); ?></p>
                                                                <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                                                <p class="investment-project" data-toggle="tooltip" title="Tổng chi phí chuyến du lịch"><i class="far fa-money-bill-alt"></i> Chi phí: <span class="value"><?php rwmb_the_value('chi-phi-du-lich'); ?><sup>đ</sup></span></p>
                                                                <div class="clearfix"></div>
                                                        </div>
                                                </a>
                                        </div>
                                </div>
                                <?php $number_duan++; endwhile; ?>
                                <div class="col-xs-12 more-project moveLeft-500 duration-1000 hidden">
                                        <a href="<?php echo home_url(); ?>/du-an/dang-trien-khai/" class="btn btn-outline-danger">Xem tất cả dự án đang triển khai</a>
                                </div>
                        </div>
                </div>
        </section>
        <?php endif; ?>
        <!-- End Project -->
        <!-- List Project -->
        <section class="list-project">
                <h2 class="moveTop-300 duration-800 hidden">Danh sách dự án CityLand</h2>
                <div class="line-title moveTop-300 duration-800 hidden">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                </div>
                <div class="container">
                        <div class="row">
                                <h3 class="col-xs-12 sub-title">Cùng săn vé máy bay khuyến mãi giá rẻ nhất</h3>
                                <div class="col-sm-4 img-item kdc moveBottom-300 duration-1000 hidden">
                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/hinh-nen-du-an-khu-dan-cu.jpg" alt="dự án khu dân cư" id="img-get-height" class="bg-project-item">
                                        <div class="info-item bottom">
                                                <div class="bg-absolute">
                                                        <a href="#"><h4>Khu dân cư</h4></a>
                                                        <p>Xem các dự án khu dân cư CityLand</p>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-sm-4 img-item cc moveTop-300 duration-1000 hidden">
                                        <div class="info-item top">
                                                <div class="bg-absolute">
                                                        <a href="#"><h4>Căn hộ</h4></a>
                                                        <p>Xem các dự án căn hộ CityLand</p>
                                                </div>
                                        </div>
                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/hinh-nen-du-an-chung-cu.jpg" alt="dự án căn hộ" class="bg-project-item">
                                </div>
                                <div class="col-sm-4 img-item ktm moveBottom-300 duration-1000 hidden">
                                        <img src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/hinh-nen-du-an-khu-thuong-mai-cho-thue.jpg" alt="dự án khu thương mại cho thuê" class="bg-project-item">
                                        <div class="info-item bottom">
                                                <div class="bg-absolute">
                                                        <a href="#"><h4>Khu thương mại cho thuê</h4></a>
                                                        <p>Xem các dự án khu thương mại cho thuê</p>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </section>
        <!-- End List Project -->
        <!-- News - Events -->
        <?php $args_news = array('category_name' => 'tin-tuc-su-kien', 'posts_per_page' => 1); ?>
        <?php $query_news = new WP_Query($args_news); ?>
        <?php if ($query_news->have_posts()) : ?>
        <section class="news">
                <h2 class="moveTop-300 duration-800 hidden">Tin tức - Sự kiện</h2>
                <div class="group-news moveTop-300 duration-800 hidden">
                        <span id="company-news">Quán ăn ngon</span>
                        <span id="project-news">Điểm đến thú vị</span>
                        <span id="market-news">Nơi ở tốt</span>
                </div>
                <div class="line-title moveTop-300 duration-800 hidden">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                </div>
                <div class="container moveTop-500 duration-1200 hidden">
                        <i class="fas fa-chevron-left"></i>
                        <i class="fas fa-chevron-right"></i>
                        <div class="box-slide">
                                <div class="slide-news">
                                <?php $args_company_news = array('category_name' => 'tin-cong-ty', 'posts_per_page' => 7); ?>
                                <?php $query_company_news = new WP_Query($args_company_news); ?>
                                <?php if ($query_company_news->have_posts()) : ?>
                                        <div id="slide-company-news">
                                        <?php while ($query_company_news->have_posts()) : $query_company_news->the_post(); ?>
                                                <div class="news-item">
                                                        <div class="title-news">
                                                                <div class="img-news"><?php the_post_thumbnail(); ?></div>
                                                                <div class="info-news">
                                                                        <div class="info-title">
                                                                                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                                                                <i class="icon-like"></i>
                                                                        </div>
                                                                        <p class="location-project"><i class="fas fa-map-marker-alt"></i> <?php rwmb_the_value('vi-tri'); ?></p>
                                                                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                                                        <p class="investment-project" data-toggle="tooltip" title="Tổng chi phí chuyến du lịch"><i class="far fa-money-bill-alt"></i> Chi phí: <span class="value"><?php rwmb_the_value('chi-phi-du-lich'); ?><sup>đ</sup></span></p>
                                                                        <div class="clearfix"></div>
                                                                </div>
                                                        </div>
                                                </div>
                                        <?php endwhile; ?>
                                        </div>
                                <?php endif; ?>
                                <?php $args_market_news = array('category_name' => 'tin-thi-truong', 'posts_per_page' => 7); ?>
                                <?php $query_market_news = new WP_Query($args_market_news); ?>
                                <?php if ($query_market_news->have_posts()) : ?>
                                        <div id="slide-market-news">
                                        <?php while ($query_market_news->have_posts()) : $query_market_news->the_post(); ?>
                                                <div class="news-item">
                                                        <div class="title-news">
                                                                <div class="img-news"><?php the_post_thumbnail(); ?></div>
                                                                <div class="info-news">
                                                                        <div class="info-title">
                                                                                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                                                                <i class="icon-like"></i>
                                                                        </div>
                                                                        <p class="location-project"><i class="fas fa-map-marker-alt"></i> <?php rwmb_the_value('vi-tri'); ?></p>
                                                                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                                                        <p class="investment-project" data-toggle="tooltip" title="Tổng chi phí chuyến du lịch"><i class="far fa-money-bill-alt"></i> Chi phí: <span class="value"><?php rwmb_the_value('chi-phi-du-lich'); ?><sup>đ</sup></span></p>
                                                                        <div class="clearfix"></div>
                                                                </div>
                                                        </div>
                                                </div>
                                        <?php endwhile; ?>
                                        </div>
                                <?php endif; ?>
                                <?php $args_project_news = array('category_name' => 'tin-tuc-su-kien', 'posts_per_page' => 7, 'orderby' => 'rand'); ?>
                                <?php $query_project_news = new WP_Query($args_project_news); ?>
                                <?php if ($query_project_news->have_posts()) : ?>
                                        <div id="slide-project-news">
                                        <?php while ($query_project_news->have_posts()) : $query_project_news->the_post(); ?>
                                                <div class="news-item">
                                                        <div class="title-news">
                                                                <div class="img-news"><?php the_post_thumbnail(); ?></div>
                                                                <div class="info-news">
                                                                        <div class="info-title">
                                                                                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                                                                <i class="icon-like"></i>
                                                                        </div>
                                                                        <p class="location-project"><i class="fas fa-map-marker-alt"></i> <?php rwmb_the_value('vi-tri'); ?></p>
                                                                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                                                                        <p class="investment-project" data-toggle="tooltip" title="Tổng chi phí chuyến du lịch"><i class="far fa-money-bill-alt"></i> Chi phí: <span class="value"><?php rwmb_the_value('chi-phi-du-lich'); ?><sup>đ</sup></span></p>
                                                                        <div class="clearfix"></div>
                                                                </div>
                                                        </div>
                                                </div>
                                        <?php endwhile; ?>
                                        </div>
                                <?php endif; ?>
                                </div>
                        </div>
                </div>
        </section>
        <?php endif; ?>
        <!-- End News - Events -->
<?php get_footer(); ?>