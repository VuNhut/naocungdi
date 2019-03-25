<?php
/**
 * The template for displaying "Giáp Bảo Hộ" Category pages.
 *
 *
 * @package dazzling
 */

get_header(); ?>
        <!-- Slider Home -->
        <section class="slider">
                <div id="wowslider-container1">
                        <div class="ws_images">
                                <ul>
				        <li><img data-no-lazy="0" width="100vw" height="calc(100vw/2.39)" src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/bg-header-giap-bao-ho.jpg)" srcset="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/bg-header-giap-bao-ho.jpg) 1920w, <?php echo home_url(); ?>/wp-content/themes/naocungdi/images/bg-header-giap-bao-ho-768.jpg) 768w, <?php echo home_url(); ?>/wp-content/themes/naocungdi/images/bg-header-giap-bao-ho-414.jpg) 414w"/></li>
                                </ul>
                        </div>
                        <div class="ws_shadow"></div>
                        <div class="inner-banner cat-child">
                                <h1>Giáp bảo hộ</h1>
                                <p>Giáp bảo hộ tay chân, quần áo bảo vệ giữ an toàn cho bạn trong các chuyến đi phượt, du lịch, đi tour</p>
                        </div>
                </div>
        </section>
        <!-- End Slider Home -->
        <!-- Project -->
        <?php $args_duan = array('category_name' => 'giap-bao-ho', 'meta_key' => 'sold-product', 'orderby' => array('meta_value_num' => 'DESC')); ?>
        <?php $query_duan = new WP_Query($args_duan); ?>
        <?php if ($query_duan->have_posts()) : ?>
        <section class="project hot-product cat-child">
                <div class="container">
                        <div class="row">
                                <?php echo the_breadcrumb(); ?>
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
                                                                <p class="investment-project"><span class="market-price"><?php echo $info_product['gia-thi-truong']; ?><sup>đ</sup></span> <span class="value"><?php echo $info_product['gia-khuyen-mai']; ?><sup>đ</sup></span></p>
                                                                <?php else : ?>
                                                                <p class="investment-project"><span class="value"><?php echo $info_product['gia-thi-truong']; ?><sup>đ</sup></span></p>
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
        <!-- List Travel -->
        <section class="list-cat">
            <div class="container">
                <div class="row">
                    <h2 class="col-xs-12">Bạn đường du lịch</h2>
                    <div class="col-md-4 col-sm-6">
                        <a class="gang-tay" href="<?php echo home_url(); ?>/shop-phuot/gang-tay/">
                            <div>
                                <h3>Găng tay phượt</h3>
                                <p>Bám tay lái, bảo vệ tay toàn diện</p>
                                <div class="view-more">Xem thêm</div>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64"><path d="M45,6a3.98,3.98,0,0,0-2.239.687,3.981,3.981,0,0,0-6-2,3.976,3.976,0,0,0-7.522,0A4,4,0,0,0,23,8V27.586l-5.293-5.293a4.535,4.535,0,0,0-6.414,6.414L23,40.414V47a1,1,0,0,0,1,1h1V61a1,1,0,0,0,1,1H46a1,1,0,0,0,1-1V48h1a1,1,0,0,0,1-1V10A4,4,0,0,0,45,6ZM37,26V16h4V26Zm-6,0V14h4V26Zm-6,0V16h4V26Zm18-8h4v8H43ZM45,8a2,2,0,0,1,2,2v6H43V10A2,2,0,0,1,45,8ZM39,6a2,2,0,0,1,2,2v6H37V8A2,2,0,0,1,39,6ZM31,6a2,2,0,0,1,4,0v6H31V6ZM27,6a2,2,0,0,1,2,2v6H25V8A2,2,0,0,1,27,6ZM12.707,23.707a2.54,2.54,0,0,1,3.586,0L20.586,28,17,31.586l-4.293-4.293A2.54,2.54,0,0,1,12.707,23.707ZM41,52v4H33V52ZM31,56H27V52h4Zm14,4H27V58H43V50H27V48H45Zm2-14H25V40a1,1,0,0,0-.293-.707L18.414,33,22,29.414l1.293,1.293A1,1,0,0,0,25,30V28H47Z"></svg>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <a class="non-bao-hiem" href="<?php echo home_url(); ?>/shop-phuot/non-bao-hiem/">
                            <div>
                                <h3>Nón bảo hiểm</h3>
                                <p>Bảo vệ an toàn cho vùng đầu</p>
                                <div class="view-more">Xem thêm</div>
                                <svg viewBox="-9 0 512 512.00127" xmlns="http://www.w3.org/2000/svg"><path d="m487.871094 399.921875c7.605468-48.351563 7.984375-102.265625 1.0625-151.832031-1.050782-7.519532-2.269532-14.847656-3.621094-22.019532-.035156-.210937-.070312-.414062-.117188-.621093-7.171874-37.71875-18.515624-70.578125-33.863281-97.878907-.128906-.230468-.265625-.449218-.410156-.664062-.046875-.082031-.097656-.164062-.148437-.246094-18.835938-30.679687-43.777344-56.546875-74.136719-76.882812-28.214844-18.902344-60.558594-32.703125-96.132813-41.019532-53.449218-12.480468-117.027344-11.578124-170.0625 2.414063-5.347656 1.410156-8.535156 6.886719-7.125 12.234375 1.410156 5.34375 6.886719 8.53125 12.230469 7.121094 11.882813-3.132813 24.328125-5.5625 37.070313-7.300782 66.976562 13.347657 126.84375 39.894532 173.195312 76.835938 35.378906 28.195312 60.363281 61.238281 70.664062 92.828125l-136.386718-41.941406c-29.425782-9.050781-55.117188-2.015625-70.480469 19.300781-19.035156 26.40625-16.835937 68 5.226563 98.902344 46.78125 65.523437 99.546874 97.890625 265.382812 161.546875-1.683594 5.757812-3.449219 11.128906-5.109375 15.148437-3.96875 7.417969-34.183594 39.359375-55.347656 45.292969-4.117188 1.152344-7.214844 1.109375-9.207031-.128906-.265626-.167969-.539063-.320313-.820313-.460938l-41.632813-20.820312s-.003906-.003907-.003906-.003907 0 0-.003906 0l-89.914062-44.96875c-.007813-.003906-.011719-.007812-.019532-.011718-24.316406-12.160156-82.28125-52.746094-135.011718-104.90625-43.3125-42.839844-94.878907-105.183594-95.550782-159.601563 4.339844-19.75 10.992188-36.488281 20.109375-50.621093 2.253907-3.496094 2.113281-8.019532-.355469-11.367188l-22.574218-30.613281c8.523437-4.675781 17.316406-9.15625 27.433594-14 4.988281-2.386719 7.09375-8.363281 4.707031-13.351563-2.386719-4.984375-8.363281-7.09375-13.347657-4.703125-14.488281 6.933594-26.386718 13.171875-38.574218 20.226563-2.464844 1.425781-4.203125 3.835937-4.785156 6.621094-.582032 2.785156.054687 5.691406 1.742187 7.980468l25.296875 34.304688c-8.703125 15.023437-15.121094 32.285156-19.398438 52.109375-.046874.195312-.089843.390625-.125.59375-2.296874 10.789062-3.976562 22.324219-5.019531 34.699219-3.277343 38.78125.042969 80.078124 2.710938 113.261718.039062.460938.105469.910156.203125 1.351563 1.175781 9.089843 6.75 17.171875 14.84375 21.496093-1.691406 7.414063-1.328125 15.1875 1.144531 22.613282 3.558594 10.675781 11.03125 19.3125 21.042969 24.320312l253.515625 126.792969c6.019531 3.007813 12.421875 4.4375 18.738281 4.4375 12.191406 0 24.023438-5.339844 32.089844-14.832031l33.410156 16.710937c4.164062 2.488281 8.863281 3.730469 14.042969 3.730469 3.464843 0 7.148437-.554688 11.03125-1.671875 28.082031-8.070313 62.582031-45.335937 67.71875-55.894531.082031-.167969.160156-.339844.230469-.511719 2.910156-6.933594 5.953124-16.953125 8.511718-26.683594.007813-.03125.015625-.0625.023438-.09375 2.9375-11.195312 5.226562-21.984375 5.90625-27.222656zm-378.800782-65.847656c12.570313 12.429687 25.457032 24.230469 38.164063 35.199219l-109.945313-54.988282h-.003906s0-.003906-.003906-.003906l-7.203125-3.601562c-2.671875-1.335938-4.40625-3.914063-4.644531-6.902344-.027344-.367188-.082032-.734375-.148438-1.09375-2.054687-25.527344-4.4375-55.839844-3.808594-85.574219 19.339844 43.273437 55.589844 85.308594 87.59375 116.964844zm196.050782 149.972656-253.515625-126.792969c-5.230469-2.613281-9.136719-7.140625-11.003907-12.742187-.742187-2.21875-1.109374-4.492188-1.136718-6.757813l288.5625 144.320313c-6.453125 4.734375-15.269532 5.789062-22.90625 1.972656zm33.164062-399.640625c-33.730468-26.882812-74.132812-48.515625-118.996094-63.933594 19.511719 1 38.691407 3.585938 56.660157 7.78125 48.425781 11.320313 115.105469 39.398438 157.761719 108.871094.050781.082031.097656.164062.140624.246094.109376.191406.222657.378906.34375.5625 11.933594 21.378906 21.277344 46.558594 27.941407 75.144531l-43.054688-13.238281c-8.554687-39.785156-37.011719-80.539063-80.796875-115.433594zm-127.15625 173.113281c-16.949218-23.738281-19.21875-56.226562-5.28125-75.5625 10.175782-14.117187 27.347656-18.332031 48.359375-11.875l31.292969 9.625-19.847656 134.910157c-22.203125-16.996094-38.8125-35.089844-54.523438-57.097657zm72.851563 70.042969 20.875-141.902344 161.824219 49.761719c.882812 5.054687 1.695312 10.195313 2.425781 15.433594 6.664062 47.714843 6.296875 99.597656-1.027344 146.089843-.019531.101563-.03125.203126-.046875.304688-.367188 2.914062-1.367188 8.003906-2.742188 13.953125-87.632812-33.691406-142.453124-58.222656-181.308593-83.640625zm0 0"/><path d="m73.195312 43.542969c1.160157 0 2.34375-.203125 3.492188-.632813l.226562-.085937c5.167969-1.960938 7.769532-7.738281 5.808594-12.90625-1.960937-5.167969-7.738281-7.773438-12.910156-5.808594-.003906 0-.109375.039063-.132812.050781-5.171876 1.9375-7.796876 7.695313-5.863282 12.867188 1.5 4.03125 5.316406 6.515625 9.378906 6.515625zm0 0"/><path d="m65.039062 69.007812c-3.28125-4.449218-9.546874-5.394531-13.996093-2.117187-4.449219 3.28125-5.398438 9.546875-2.117188 13.996094l14.644531 19.863281c1.960938 2.660156 4.992188 4.066406 8.0625 4.066406 2.066407 0 4.148438-.636718 5.933594-1.953125 4.449219-3.28125 5.398438-9.546875 2.117188-13.996093zm0 0"/><path d="m84.910156 67.648438 14.644532 19.863281c1.960937 2.660156 4.992187 4.066406 8.0625 4.066406 2.0625 0 4.144531-.636719 5.933593-1.953125 4.449219-3.28125 5.398438-9.546875 2.117188-13.996094l-14.644531-19.859375c-3.28125-4.449219-9.546876-5.394531-13.996094-2.117187-4.449219 3.28125-5.398438 9.546875-2.117188 13.996094zm0 0"/><path d="m328.878906 446c1.433594.714844 2.953125 1.050781 4.453125 1.050781 3.675781 0 7.21875-2.035156 8.964844-5.550781 2.464844-4.949219.449219-10.957031-4.5-13.421875l-.210937-.101563c-4.949219-2.464843-10.957032-.449218-13.421876 4.5-2.460937 4.945313-.445312 10.957032 4.503907 13.417969zm0 0"/><path d="m391.3125 477.226562c1.4375.71875 2.964844 1.0625 4.472656 1.0625 3.667969 0 7.203125-2.027343 8.957032-5.535156 2.472656-4.945312.46875-10.957031-4.476563-13.429687l-36.734375-18.371094c-4.941406-2.476563-10.953125-.46875-13.425781 4.476563-2.472657 4.945312-.46875 10.957031 4.472656 13.429687zm0 0"/></svg>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <a class="phu-kien" href="<?php echo home_url(); ?>/shop-phuot/phu-kien/">
                            <div>
                                <h3>Phụ kiện phượt</h3>
                                <p>Những dụng cụ cần thiết khi phượt</p>
                                <div class="view-more">Xem thêm</div>
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
<g><g><path d="M473.145,38.853c-2.931-2.929-7.682-2.929-10.614,0l-49.197,49.197c-2.93,2.931-2.93,7.682,0,10.614
			c1.466,1.466,3.387,2.198,5.307,2.198c1.92,0,3.841-0.733,5.307-2.198l49.197-49.197
			C476.075,46.536,476.075,41.784,473.145,38.853z"/></g></g>
<g><g><path d="M342.05,84.752l-45.898-45.898c-2.931-2.929-7.682-2.929-10.614,0c-2.93,2.931-2.93,7.682,0,10.614l45.898,45.898
			c1.466,1.465,3.387,2.198,5.307,2.198c1.92,0,3.841-0.733,5.307-2.198C344.98,92.435,344.98,87.684,342.05,84.752z"/></g></g>
<g><g><path d="M379.342,0c-4.145,0-7.504,3.359-7.504,7.504v68.25c-0.001,4.145,3.359,7.504,7.504,7.504
			c4.145,0,7.504-3.359,7.504-7.504V7.505C386.846,3.359,383.487,0,379.342,0z"/></g></g>
<g><g><path d="M473.145,215.847l-45.76-45.76c-2.931-2.929-7.682-2.929-10.614,0c-2.93,2.931-2.93,7.682,0,10.614l45.76,45.76
			c1.466,1.465,3.387,2.198,5.307,2.198c1.92,0,3.841-0.733,5.307-2.198C476.075,223.531,476.075,218.779,473.145,215.847z"/></g></g>
<g><g><path d="M504.496,125.154h-68.253c-4.145,0-7.504,3.359-7.504,7.504c0,4.145,3.359,7.504,7.504,7.504h68.253
			c4.145,0,7.504-3.359,7.504-7.504C512,128.513,508.641,125.154,504.496,125.154z"/></g></g>
<g><g><path d="M423.635,232.607L279.392,88.365c-5.918-5.917-15.543-5.913-21.459,0l-27.924,27.924c-0.014,0.014-0.026,0.031-0.04,0.045
			c-0.19,0.193-0.366,0.394-0.53,0.601c-0.05,0.063-0.095,0.13-0.143,0.195c-0.128,0.172-0.249,0.347-0.36,0.527
			c-0.043,0.069-0.083,0.139-0.124,0.21c-0.112,0.194-0.213,0.392-0.306,0.593c-0.027,0.059-0.057,0.118-0.082,0.178
			c-0.119,0.278-0.225,0.559-0.309,0.846l-31.119,104.21L6.062,414.627C2.021,418.669,0,423.979,0,429.289s2.021,10.62,6.062,14.662
			l6.743,6.743l-0.566,0.566c-13.371,13.372-13.371,35.129,0,48.501c6.687,6.686,15.468,10.028,24.251,10.028
			c8.783,0,17.564-3.343,24.251-10.028l0.567-0.567l6.743,6.743c0.505,0.505,1.03,0.979,1.573,1.421
			C73.42,510.453,78.065,512,82.711,512c1.88,0,3.758-0.267,5.582-0.774c3.327-0.924,6.469-2.678,9.08-5.289l39.188-39.188
			c2.93-2.931,2.93-7.682,0-10.614c-2.931-2.929-7.682-2.929-10.614,0l-10.097,10.097l-70.084-70.084l157.876-157.876l70.085,70.083
			L151.301,430.781c-2.93,2.931-2.93,7.682,0,10.614c1.466,1.465,3.387,2.198,5.307,2.198c1.92,0,3.841-0.733,5.307-2.198
			l126.392-126.392l104.212-31.119c0.286-0.084,0.566-0.189,0.842-0.308c0.061-0.026,0.12-0.056,0.181-0.084
			c0.201-0.092,0.398-0.194,0.591-0.305c0.07-0.04,0.139-0.081,0.208-0.123c0.183-0.113,0.36-0.235,0.535-0.365
			c0.062-0.046,0.125-0.088,0.186-0.136c0.224-0.178,0.442-0.366,0.649-0.573l27.924-27.924c2.866-2.866,4.444-6.677,4.444-10.73
			C428.079,239.284,426.501,235.473,423.635,232.607z M50.126,489.148c-7.518,7.52-19.756,7.52-27.274,0
			c-7.52-7.519-7.52-19.755,0-27.274l0.566-0.566l27.274,27.273L50.126,489.148z M16.944,433.605
			c0.136,0.136,0.271,0.271,0.268,0.268C17.209,433.87,17.076,433.738,16.944,433.605z M105.238,476.846l-18.476,18.477
			c-2.233,2.231-5.866,2.233-8.099,0l-61.987-61.986c-0.558-0.558-0.977-1.204-1.256-1.893c-0.279-0.69-0.419-1.423-0.419-2.156
			c0-1.466,0.558-2.933,1.675-4.049l18.477-18.477L105.238,476.846z M413.02,243.453l-22.616,22.617L290.163,165.83
			c-2.931-2.929-7.682-2.929-10.614,0c-2.93,2.931-2.93,7.682,0,10.614l96.651,96.651l-89.717,26.79l-74.368-74.367l26.791-89.718
			l15.953,15.953c1.466,1.466,3.386,2.199,5.307,2.199c1.92,0,3.841-0.733,5.306-2.198c2.931-2.93,2.931-7.682,0.001-10.613
			l-19.544-19.545l22.618-22.617c0.063-0.064,0.17-0.064,0.233,0l144.24,144.242C413.085,243.284,413.085,243.39,413.02,243.453z"/></g></g>
<g><g><path d="M221.913,290.313c-12.976-12.974-34.09-12.974-47.069,0.001c-12.976,12.977-12.976,34.092,0,47.069
			c6.489,6.488,15.012,9.732,23.535,9.732c8.524,0,17.046-3.244,23.534-9.733c6.287-6.286,9.749-14.644,9.749-23.534
			C231.662,304.958,228.2,296.599,221.913,290.313z M211.302,326.769c0,0,0,0-0.001,0c-7.124,7.125-18.719,7.123-25.843-0.001
			c-7.125-7.124-7.125-18.717-0.001-25.842c3.564-3.563,8.242-5.344,12.923-5.344c4.679,0,9.359,1.782,12.921,5.344
			c3.452,3.451,5.353,8.04,5.353,12.922C216.654,318.729,214.753,323.318,211.302,326.769z"/></g></g>
</svg>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End List Travel -->
<?php get_footer(); ?>