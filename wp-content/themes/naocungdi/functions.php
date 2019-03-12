<?php
/**
 * Dazzling functions and definitions
 *
 * @package dazzling
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
  $content_width = 730; /* pixels */
}

/**
 * Set the content width for full width pages with no sidebar.
 */
function dazzling_content_width() {
  if ( is_page_template( 'page-fullwidth.php' ) || is_page_template( 'front-page.php' ) ) {
    global $content_width;
    $content_width = 1110; /* pixels */
  }
}
add_action( 'template_redirect', 'dazzling_content_width' );

if ( ! function_exists( 'dazzling_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dazzling_setup() {

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on Dazzling, use a find and replace
   * to change 'dazzling' to the name of your theme in all the template files
   */
  load_theme_textdomain( 'dazzling', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  add_theme_support( 'post-thumbnails' );

  //add_image_size( 'dazzling-featured', 730, 410, true );
  //add_image_size( 'tab-small', 60, 60 , true);
  add_image_size( 'medium-img', 768, 9999, false );
  add_image_size( 'small-img', 414, 9999, false );
  add_image_size( 'tiny-img', 100, 9999, false );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary'      => __( 'Primary Menu', 'dazzling' ),
    'footer-links' => __( 'Footer Links', 'dazzling' ) // secondary menu in footer
  ) );

  // Enable support for Post Formats.
  add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

  // Setup the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'dazzling_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );
}
endif; // dazzling_setup
add_action( 'after_setup_theme', 'dazzling_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function dazzling_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Sidebar', 'dazzling' ),
    'id'            => 'sidebar-1',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
  register_sidebar(array(
    'id'            => 'home-widget-1',
    'name'          => __( 'Homepage Widget 1', 'dazzling' ),
    'description'   => __( 'Displays on the Home Page', 'dazzling' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'home-widget-2',
    'name'          =>  __( 'Homepage Widget 2', 'dazzling' ),
    'description'   => __( 'Displays on the Home Page', 'dazzling' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'home-widget-3',
    'name'          =>  __( 'Homepage Widget 3', 'dazzling' ),
    'description'   =>  __( 'Displays on the Home Page', 'dazzling' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'footer-widget-1',
    'name'          =>  __( 'Footer Widget 1', 'dazzling' ),
    'description'   =>  __( 'Used for footer widget area', 'dazzling' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'footer-widget-2',
    'name'          =>  __( 'Footer Widget 2', 'dazzling' ),
    'description'   =>  __( 'Used for footer widget area', 'dazzling' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'id'            => 'footer-widget-3',
    'name'          =>  __( 'Footer Widget 3', 'dazzling' ),
    'description'   =>  __( 'Used for footer widget area', 'dazzling' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ));

  register_sidebar( array(
    'name'          => __( 'Sidebar bài viết dự án', 'dazzling' ),
    'id'            => 'sidebar-2',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  register_widget( 'dazzling_social_widget' );
  register_widget( 'dazzling_popular_posts_widget' );
}
add_action( 'widgets_init', 'dazzling_widgets_init' );

include(get_template_directory() . "/inc/widgets/widget-popular-posts.php");
include(get_template_directory() . "/inc/widgets/widget-social.php");


/**
 * Enqueue scripts and styles.
 */
function dazzling_scripts() {
  wp_enqueue_style( 'dazzling-fontawesome', get_template_directory_uri().'/inc/css/all.min.css' );

  wp_enqueue_style( 'dazzling-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.css' );

  wp_enqueue_style( 'dazzling-slider', get_template_directory_uri().'/inc/css/style-slider.css' );

  wp_enqueue_style( 'dazzling-qtip', get_template_directory_uri().'/inc/css/jquery.qtip.min.css' );

	wp_enqueue_style( 'dazzling-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'dazzling-swiper', get_template_directory_uri().'/inc/css/swiper.css' );

	wp_enqueue_script('dazzling-bootstrapjs', get_template_directory_uri().'/inc/js/bootstrap.js', array('jquery') );
	
	wp_enqueue_script( 'dazzling-scriptswiper', get_template_directory_uri() . '/inc/js/swiper.min.js');

  wp_enqueue_script( 'dazzling-main', get_template_directory_uri() . '/inc/js/main-site.js', array('jquery'), '1.5.4', true );

  wp_enqueue_script( 'dazzling-scriptanimation', get_template_directory_uri() . '/inc/js/script-animation.js', array('jquery'), '1.5.4', true );

  if (!(is_single() && in_category(array('cam-nang-du-lich', 've-tham-quan', 'shop-phuot')))) {
	wp_enqueue_script( 'dazzling-animation', get_template_directory_uri() . '/inc/js/menu-animation.js', array('jquery'), '1.5.4', true );
  }
  
  if (is_home()) {

  wp_enqueue_script( 'dazzling-wowslider', get_template_directory_uri() . '/inc/js/wow-slider.js', array('jquery'), '1.5.4', true );

  wp_enqueue_script( 'dazzling-scriptslider', get_template_directory_uri() . '/inc/js/script-slider.js', array('jquery'), '1.5.4', true );

	wp_enqueue_script( 'dazzling-scripthome', get_template_directory_uri() . '/inc/js/script-home.js', array('jquery'), '1.5.4', true );

	wp_enqueue_script( 'dazzling-scriptanimationtext', get_template_directory_uri() . '/inc/js/animation-text.js');
	}
	
	if (is_single()) {
		wp_enqueue_script( 'dazzling-scriplistslide', get_template_directory_uri() . '/inc/js/script-listslide.js', array('jquery'), '1.5.4', true );
	}

	if (is_single() && in_category(array('cam-nang-du-lich', 'chia-se'))) {
		wp_enqueue_script( 'dazzling-scriptproject', get_template_directory_uri() . '/inc/js/script-project.js', array('jquery'), '1.5.4', true );
	}

  if (is_single() && in_category('cam-nang-du-lich')) {
	
	wp_enqueue_script( 'dazzling-chartjs', get_template_directory_uri() . '/inc/js/chart.min.js' );

	wp_enqueue_script( 'dazzling-script-chart', get_template_directory_uri() . '/inc/js/script-chart.js' );
	
	wp_enqueue_script( 'dazzling-scriptmapapi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC75DNSPpK5JTSltYE74rjvYFqJQVfBIv4&language=vi&region=VN', array('jquery'), '1.5.4', true);

	wp_enqueue_script( 'dazzling-scriptgooglemap', get_template_directory_uri() . '/inc/js/google-map.js');
	}
	
	if (is_single() && in_category('ve-tham-quan')) {
		wp_enqueue_script( 'dazzling-scriptproject', get_template_directory_uri() . '/inc/js/script-project.js', array('jquery'), '1.5.4', true );

		wp_enqueue_script( 'dazzling-scriptmapapi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC75DNSPpK5JTSltYE74rjvYFqJQVfBIv4&language=vi&region=VN', array('jquery'), '1.5.4', true);

		wp_enqueue_script( 'dazzling-scriptgooglemap', get_template_directory_uri() . '/inc/js/google-map.js');

		wp_enqueue_script( 'dazzling-datapicker', get_template_directory_uri() . '/inc/js/bootstrap-datepicker.min.js');

		wp_enqueue_script( 'dazzling-validate', get_template_directory_uri() . '/inc/js/jquery.validate.min.js');

		wp_enqueue_script( 'dazzling-ticket', get_template_directory_uri() . '/inc/js/script-ticket.js', array('jquery'), '1.5.4', true);
	}

	if (is_single() && in_category('shop-phuot')) {
		wp_enqueue_script( 'dazzling-scriptproject', get_template_directory_uri() . '/inc/js/script-project.js', array('jquery'), '1.5.4', true );

		wp_enqueue_script( 'dazzling-validate', get_template_directory_uri() . '/inc/js/jquery.validate.min.js');

		wp_enqueue_script( 'dazzling-scriptshopphuot', get_template_directory_uri() . '/inc/js/script-shopphuot.js', array('jquery'), '1.5.4', true );
	}

  if (is_page('san-ve-may-bay')) {
	wp_enqueue_style( 'dazzling-awesome', get_template_directory_uri() . '/inc/css/all.min.css' );
  }

  if (is_category(array('thu-vien', 'hinh-anh', 'video'))) {
	wp_enqueue_script( 'dazzling-scriptlibrary', get_template_directory_uri() . '/inc/js/script-library.js', array('jquery') );
  }

  if (is_archive() && in_category(array('cam-nang-du-lich', 'bi-quyet-du-lich-tiet-kiem'))) {
	wp_enqueue_script( 'dazzling-selectlocation', get_template_directory_uri() . '/inc/js/select-location.js', array('jquery') );
  }

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'dazzling_scripts' );

/**
 * Add HTML5 shiv and Respond.js for IE8 support of HTML5 elements and media queries
 */
function dazzling_ie_support_header() {
  echo '<!--[if lt IE 9]>'. "\n";
  echo '<script src="' . esc_url( get_template_directory_uri() . '/inc/js/html5shiv.min.js' ) . '"></script>'. "\n";
  echo '<script src="' . esc_url( get_template_directory_uri() . '/inc/js/respond.min.js' ) . '"></script>'. "\n";
  echo '<![endif]-->'. "\n";
}
add_action( 'wp_head', 'dazzling_ie_support_header', 11 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom nav walker
 */
require get_template_directory() . '/inc/navwalker.php';

if ( class_exists( 'woocommerce' ) ) {
/**
 * WooCommerce related functions
 */
require get_template_directory() . '/inc/woo-setup.php';
}

if ( class_exists( 'jigoshop' ) ) {
/**
 * Jigoshop related functions
 */
require get_template_directory() . '/inc/jigoshop-setup.php';
}

/**
 * Metabox file load
 */
require get_template_directory() . '/inc/metaboxes.php';

/**
 * TGMPA
 */
require get_template_directory() . '/inc/tgmpa/tgm-plugin-activation.php';

/**
 * Register Social Icon menu
 */
add_action( 'init', 'register_social_menu' );

function register_social_menu() {
  register_nav_menu( 'social-menu', _x( 'Social Menu', 'nav menu location', 'dazzling' ) );
}

/* Globals variables */
global $options_categories;
$options_categories = array();
$options_categories_obj = get_categories();
foreach ($options_categories_obj as $category) {
        $options_categories[$category->cat_ID] = $category->cat_name;
}

global $site_layout;
$site_layout = array('side-pull-left' => esc_html__('Right Sidebar', 'dazzling'),'side-pull-right' => esc_html__('Left Sidebar', 'dazzling'),'no-sidebar' => esc_html__('No Sidebar', 'dazzling'),'full-width' => esc_html__('Full Width', 'dazzling'));

// Typography Options
global $typography_options;
$typography_options = array(
        'sizes' => array( '6px' => '6px','10px' => '10px','12px' => '12px','14px' => '14px','15px' => '15px','16px' => '16px','18px'=> '18px','20px' => '20px','24px' => '24px','28px' => '28px','32px' => '32px','36px' => '36px','42px' => '42px','48px' => '48px' ),
        'faces' => array(
                'arial'          => 'Arial,Helvetica,sans-serif',
                'verdana'        => 'Verdana,Geneva,sans-serif',
                'trebuchet'      => 'Trebuchet,Helvetica,sans-serif',
                'georgia'        => 'Georgia,serif',
                'times'          => 'Times New Roman,Times, serif',
                'tahoma'         => 'Tahoma,Geneva,sans-serif',
                'Open Sans'      => 'Open Sans,sans-serif',
                'palatino'       => 'Palatino,serif',
                'helvetica'      => 'Helvetica,Arial,sans-serif',
                'helvetica-neue' => 'Helvetica Neue,Helvetica,Arial,sans-serif'
        ),
        'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
        'color'  => true
);

// Typography Defaults
global $typography_defaults;
$typography_defaults = array(
        'size'  => '14px',
        'face'  => 'helvetica-neue',
        'style' => 'normal',
        'color' => '#6B6B6B'
);

/**
 * Helper function to return the theme option value.
 * If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * Not in a class to support backwards compatibility in themes.
 */
if ( ! function_exists( 'of_get_option' ) ) :
function of_get_option( $name, $default = false ) {

  $option_name = '';
  // Get option settings from database
  $options = get_option( 'dazzling' );

  // Return specific option
  if ( isset( $options[$name] ) ) {
    return $options[$name];
  }

  return $default;
}
endif;

/* Meta Box Background Top */
function get_meta_box_bgtop( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'background-top',
		'title' => esc_html__( 'Hình background top', 'dazzling' ),
		'post_types' => array( 'post' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'type' => 'single_image',
				'name' => 'Background top',
				'id'   => 'bg-top',
			),
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'get_meta_box_bgtop' );

/* Meta Box Tổng Quan Dự Án */
function get_meta_box_tongquanduan( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'tong-quan-du-an',
		'title' => esc_html__( 'Thông tin tổng quan', 'dazzling' ),
		'post_types' => array( 'post' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'vi-tri',
				'type' => 'text',
				'name' => esc_html__( 'Điểm đến', 'dazzling' ),
			),
			array(
				'id' => $prefix . 'chi-phi-du-lich',
				'type' => 'text',
				'name' => esc_html__( 'Chi phí chuyến đi', 'dazzling' ),
			),
      		array(
				'id' => $prefix . 'so-ngay-du-lich',
				'type' => 'text',
				'name' => esc_html__( 'Số ngày du lịch', 'dazzling' ),
			),
			array(
				'id' => $prefix . 'so-sao',
				'type' => 'text',
				'name' => esc_html__( 'Xếp hạng sao (cho khách sạn)', 'dazzling' ),
				'datalist'    => array(
					'id'      => 'list-star',
					'options' => array(
						'1',
						'2',
						'3',
						'4',
						'5',
					),
				),
			),
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'get_meta_box_tongquanduan' );

/* Meta Box Vé Tham Quan */
function get_meta_box_vethamquan( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 've-tham-quan',
		'title' => esc_html__( 'Thông tin vé tham quan', 'dazzling' ),
		'post_types' => array( 'post' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id'      => 'chi-tiet-ve',
				'name'    => 'Chi tiết vé',
				'type'    => 'fieldset_text',
				'options' => array(
					'hoan-huy'    => 'Hoàn hủy',
					'vao-cong' => 'Hình thức vào cổng',
					'loai-ve'   => 'Loại vé',
					'thoi-han' => 'Hạn sử dụng',
					'gia-quay' => 'Giá vé tại quầy',
					'gia-naocungdi' => 'Giá NaoCungDi',
					'ngay-dat-ve-tu' => 'Có thể đặt từ ngày',
					'ngay-dat-ve-den' => 'Có thể đặt đến ngày',
					've-da-ban' => 'Số lượng vé đã bán',
				),
			),
			array(
				'id' => $prefix . 'trai-nghiem-gi',
				'name' => 'Trải nghiệm gi?',
				'type' => 'wysiwyg',
			),
			array(
				'id' => $prefix . 'huong-dan-su-dung-ve',
				'name' => 'Hướng dẫn sử dụng',
				'type' => 'wysiwyg',
			),
			array(
				'id'      => 'goi-dich-vu',
				'name'    => 'Chi tiết gói dịch vụ',
				'type'    => 'fieldset_text',
				'clone'   => true,
				'options' => array(
					'ten-dich-vu'    => 'Tên dịch vụ',
					'gia-quay' => 'Giá vé tại quầy',
					'gia-naocungdi' => 'Giá NaoCungDi',
					'gia-ve-tre-em' => 'Giá vé trẻ em',
				),
			),
			array(
				'id' => $prefix . 'mo-ta-goi-dich-vu',
				'name' => 'Mô tả chi tiết gói dịch vụ',
				'type' => 'wysiwyg',
				'clone'   => true,
			),
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'get_meta_box_vethamquan' );

/* Meta Box Shop Phượt */
function get_meta_box_shopphuot( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'shop-phuot',
		'title' => esc_html__( 'Thông tin sản phẩm', 'dazzling' ),
		'post_types' => array( 'post' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id'      => 'chi-tiet-san-pham',
				'name'    => 'Chi tiết sản phẩm',
				'type'    => 'fieldset_text',
				'options' => array(
					'thuong-hieu' => 'Thương hiệu',
					'doi-tra' => 'Đổi trả',
					'gia-thi-truong' => 'Giá thị trường',
					'gia-khuyen-mai' => 'Giá khuyến mãi',
					'so-luong-da-ban' => 'Số lượng đã bán',
				),
			),
			array(
				'id' => $prefix . 'thong-tin-chi-tiet',
				'name' => 'Thông tin chi tiết',
				'type' => 'wysiwyg',
			),
			array(
				'id' => $prefix . 'huong-dan-lien-quan',
				'name' => 'Hướng dẫn liên quan',
				'type' => 'wysiwyg',
			),
			array(
				'id'      => 'loai-san-pham',
				'name'    => 'Loại sản phẩm',
				'type'    => 'fieldset_text',
				'clone'   => true,
				'options' => array(
					'ten-san-pham'	=> 'Tên sản phẩm',
					'gia-thi-truong' => 'Giá thị trường',
					'gia-khuyen-mai' => 'Giá khuyến mãi',
					'size' => 'Size',
					'hinh-anh' => 'Hình sản phẩm',
				),
			),
			array(
				'id' => $prefix . 'mo-ta-loai-san-pham',
				'name' => 'Mô tả chi tiết loại sản phẩm',
				'type' => 'wysiwyg',
				'clone'   => true,
			),
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'get_meta_box_shopphuot' );

/** Meta Box Gallery Project */
function get_meta_box_gallery_project( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'gallery_project',
		'title' => esc_html__( 'Gallery hình ảnh của địa điểm', 'dazzling' ),
		'post_types' => array( 'post' ),
		'context' => 'advanced',
		'priority' => 'default',
    'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'gallery',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Hình ảnh về địa điểm', 'dazzling' ),
			),
			array(
				'id' => $prefix . 'album-1',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Album 1', 'dazzling' ),
			),
			array(
				'id' => $prefix . 'album-2',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Album 2', 'dazzling' ),
			),
			array(
				'id' => $prefix . 'album-3',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Album 3', 'dazzling' ),
			),
			array(
				'id' => $prefix . 'album-4',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Album 4', 'dazzling' ),
			),
			array(
				'id' => $prefix . 'album-5',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Album 5', 'dazzling' ),
			),
			array(
				'id' => $prefix . 'album-6',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Album 6', 'dazzling' ),
			),
			array(
				'id' => $prefix . 'album-7',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Album 7', 'dazzling' ),
			),
			array(
				'id' => $prefix . 'album-8',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Album 8', 'dazzling' ),
			),
			array(
				'id' => $prefix . 'album-9',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Album 9', 'dazzling' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'get_meta_box_gallery_project' );

/** Meta Box chart thời gian phù hợp */
function get_meta_box_thoigian( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'thoi-gian-phu-hop',
		'title' => esc_html__( 'Thời gian du lịch thích hợp', 'dazzling' ),
		'post_types' => array( 'post' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'travel-time',
				'type' => 'text_list',
				'name' => esc_html__( 'Thời gian du lịch', 'dazzling' ),
				'clone' => true,
				'options' => array(
					'Tháng'      => 'Tháng',
					'Mức độ thích hợp' => 'Min: 0, Max: 10',
				),
			),
			array(
				'id' => $prefix . 'detail-travel-time',
				'name' => esc_html__( 'Chi tiết thời gian du lịch', 'dazzing' ),
				'type' => 'wysiwyg',
			)
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'get_meta_box_thoigian' );

/** Meta Box Location Project */
function get_meta_box_vitriduan( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'dia-diem',
		'title' => esc_html__( 'Địa điểm du lịch - ăn uống - nơi ở', 'dazzling' ),
		'post_types' => array( 'post' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'dia-diem-du-lich',
				'type' => 'text',
				'name' => esc_html__( 'Địa điểm du lịch', 'dazzling' ),
			),
			array(
				'id' => $prefix . 'info-traveling',
				'type' => 'text_list',
				'name' => esc_html__( 'Các địa điểm du lịch', 'dazzling' ),
				'clone' => true,
				'options' => array(
					'Địa điểm'      => 'Địa điểm',
					'Khoảng cách' => 'Khoảng cách',
					'Tọa độ trên bản đồ' => 'Tọa độ trên bản đồ',
					'Link xem chi tiết' => 'Link xem chi tiết'
				),
			),
			array(
				'id' => $prefix . 'info-eating',
				'type' => 'text_list',
				'name' => esc_html__( 'Các quán ăn ngon', 'dazzling' ),
				'clone' => true,
				'options' => array(
					'Địa điểm'      => 'Địa điểm',
					'Khoảng cách' => 'Khoảng cách',
					'Tọa độ trên bản đồ' => 'Tọa độ trên bản đồ',
					'Link xem chi tiết' => 'Link xem chi tiết'
				),
			),
			array(
				'id' => $prefix . 'info-staying',
				'type' => 'text_list',
				'name' => esc_html__( 'Các khách sạn, homestay tốt', 'dazzling' ),
				'clone' => true,
				'options' => array(
					'Địa điểm'      => 'Địa điểm',
					'Khoảng cách' => 'Khoảng cách',
					'Tọa độ trên bản đồ' => 'Tọa độ trên bản đồ',
					'Link xem chi tiết' => 'Link xem chi tiết',
					'Số sao'			=> "Số sao của khách sạn"
				),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'get_meta_box_vitriduan' );

/** Meta Box Utilities */
function get_meta_box_tienich( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'tien-ich-du-an',
		'title' => esc_html__( 'Nào Cùng Đi đánh giá địa điểm', 'dazzling' ),
		'post_types' => array( 'post' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'my-review',
				'type' => 'text_list',
				'name' => esc_html__( 'Đánh giá', 'dazzling' ),
				'clone' => true,
				'options' => array(
					'Loại đánh giá'      => 'Loại đánh giá',
					'Điểm đánh giá' => 'Min: 0, Max: 10',
				),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'get_meta_box_tienich' );

/** Meta Box Progress */
function get_meta_box_tiendo( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'tien-do',
		'title' => esc_html__( 'Bài viết xem thêm', 'dazzling' ),
		'post_types' => array( 'post' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'info-tien-do',
				'type' => 'text_list',
				'name' => esc_html__( 'Bài viết cần xem thêm', 'dazzling' ),
				'clone' => true,
				'options' => array(
					'Link ảnh đại diện'      => 'Hình đại diện',
					'Tiêu đề' => 'Tiêu đề bài viết',
					'Link bài viết' => 'Link bài viết',
				),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'get_meta_box_tiendo' );

/** Meta Box Giới thiệu */
function get_meta_box_gioithieu( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'gioi-thieu',
		'title' => esc_html__( 'Săn vé rẻ', 'dazzing' ),
		'post_types' => array( 'page' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'dieu-kien-ve-khuyen-mai',
				'name' => esc_html__( 'Điều kiện vé khuyến mãi', 'dazzing' ),
				'type' => 'wysiwyg',
			),
			array(
				'id' => $prefix . 'danh-sach-ve-re',
				'type' => 'text_list',
				'name' => esc_html__( 'Danh sách vé rẻ', 'dazzling' ),
				'clone' => true,
				'options' => array(
					'Nơi đi'      => 'Nơi đi',
					'Nơi đến' => 'Nơi đến',
					'Giá vé' => 'Giá vé',
					'Ngày bay' => 'Ngày bay',
					'Thời gian bắt đầu giảm giá' => 'Thời gian bắt đầu giảm giá',
					'Affiliate link' => 'Link'
				),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'get_meta_box_gioithieu' );

/** Meta Box Images Gallery Category */
function get_meta_box_library( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'library',
		'title' => esc_html__( '[Thư viện] Gallery thư viện', 'dazzling' ),
		'post_types' => array( 'post' ),
		'context' => 'advanced',
		'priority' => 'default',
    	'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'gallery_images',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Thư viện hình ảnh', 'dazzling' ),
			),
			array(
				'id' => $prefix . 'gallery_videos',
				'type' => 'oembed',
				'name' => esc_html__( 'Thư viên video', 'dazzling' ),
				'desc' => esc_html__( 'Nhập link video', 'dazzling' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'get_meta_box_library' );

if ( ! function_exists( 'rwmb_the_value' ) ) {
  function rwmb_the_value( $key, $args = '', $post_id = null, $echo = true ) {
      return false;
  }
}

// Change number posts on category
function wpdocs_number_posts_on_category( $query ) {
  if ( $query->is_category() && $query->is_main_query()) {
      $query->set( 'posts_per_page', 12 );
  }
}
add_action( 'pre_get_posts', 'wpdocs_number_posts_on_category' );

// Exclude posts on search page
function exclude_posts_search( $query ) {
	if ($query->is_search() && $query->is_main_query() && ! $query->is_admin()) {
		$query->query_vars['post_type'] = "post";
		$query->query_vars['category__not_in'] = 3;
	}
  }
add_action( 'pre_get_posts', 'exclude_posts_search' );

// Remove class 'tag' on tag archive
add_filter('body_class', function (array $classes) {
    if (in_array('tag', $classes)) {
      unset( $classes[array_search('tag', $classes)] );
    }
  return $classes;
});

// Numbered Pagination
if ( !function_exists( 'wpex_pagination' ) ) {
	
	function wpex_pagination() {
		
		$prev_arrow = is_rtl() ? '>' : '<';
		$next_arrow = is_rtl() ? '<' : '>';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
}

// Kết nối Contact Form 7 với Google Sheet
function pveser_sent_contact_to_drive( $contact_form ) {
	$form_id = $contact_form->id;
	$submission = WPCF7_Submission::get_instance();
	if ( $submission ){
		$posted_data = $submission->get_posted_data();
		if ($form_id==140){
			$fields = array(
			'entry.1209366715'=>urlencode($posted_data['hoten']),
			'entry.1337985056'=>urlencode($posted_data['email']),
			'entry.1662021759'=>urlencode($posted_data['noidung'])
			);
			foreach ($fields as $key => $value) { $fields_string .= $key.'='.$value.'&'; }
			rtrim($fields_string, '&');

			header('Content-type: text/html; charset=UTF-8');
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_ENCODING ,"UTF-8");

			$url=utf8_encode('https://docs.google.com/forms/d/e/1FAIpQLSf9cNIbDlovKAX-VniE3ID8qxCfBK2gRfbTyMSwVBljuJ1qIQ/formResponse');
			//set the url, number of POST vars, POST data
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, count($fields));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

			curl_setopt($ch,CURLOPT_HEADER, 1);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			//execute post
			$result = curl_exec($ch);
			//close connection
			curl_close($ch);
		}
	}
}//End contact form

add_action( 'wpcf7_submit', 'pveser_sent_contact_to_drive' );

add_filter( 'wp_postratings_display_comment_author_ratings', '__return_true' );

add_action( 'wp_ajax_loadpost', 'loadpost_init' );
add_action( 'wp_ajax_nopriv_loadpost', 'loadpost_init' );
function loadpost_init() {
 
    ob_start(); //bắt đầu bộ nhớ đệm
	$departure = $_POST['departure'];
	$destination = $_POST['destination'];
    $post_new = new WP_Query(array(
        'page_id' =>  130,
    ));
    if($post_new->have_posts()):
		while($post_new->have_posts()):$post_new->the_post();
			$list_ticket = rwmb_meta( 'danh-sach-ve-re' ); $number_ticket = 1;
			foreach ($list_ticket as $ticket) {
				if ($destination != "Tất cả") {
					if (($ticket[0] == $departure) && ($ticket[1] == $destination)) {
						if ($number_ticket <= 3) {
							echo '<div class="col-md-4 col-xs-6 ticket-item"><div class="info-ticket">';
							echo '<p class="departure"><i class="fas fa-plane"></i> '. $ticket[0] . ' đến</p>';
							echo '<p class="destination">'. $ticket[1] .'</p>';
							echo '<p class="date">Ngày bay: '. $ticket[3] . '</p>';
							echo '<p class="date">Thời gian khuyến mãi'. $ticket[4] . '</p>';
							echo '<a href="', $ticket[5] ,'" class="affiliate-link btn">Đặt vé</span></a>';
							echo '<p class="price">chỉ từ <span>'. $ticket[2] . '</span></p>';
							echo '<div class="clearfix"></div></div></div>';
						} else {
							echo '<div class="col-xs-12 ticket-item">';
							if ($number_ticket == 4) {
								echo '<div class="row"><div class="col-sm-3 ">Chặng bay</div>';
								echo '<div class="col-sm-3">Giá vé</div>';
								echo '<div class="col-sm-2">Ngày bay</div>';
								echo '<div class="col-sm-2">Thời gian khuyến mãi</div>';
								echo '<div class="col-sm-2"></div></div>';
							}
							echo '<div class="info-ticket"><div class="row"><div class="col-sm-3">
									<p class="departure"><i class="fas fa-plane"></i> '. $ticket[0] . ' đến</p>
									<p class="destination">'. $ticket[1] .'</p>
								</div>';
							echo '<div class="col-sm-3">
									<p class="price">chỉ từ <span>'. $ticket[2] . '</span></p>
								</div>';
							echo '<div class="col-sm-2">
									<p class="date">'. $ticket[3] . '</p>
								</div>';
							echo '<div class="col-sm-2">
									<p class="date">'. $ticket[4] . '</p>
								</div>';
							echo '<div class="col-sm-2">
							<a href="', $ticket[5] ,'" class="affiliate-link btn">Đặt vé</span></a>
								</div>';
							echo '</div></div></div>';
						}
						$number_ticket++;
					}
				}
				else {
					if ($ticket[0] == $departure) {
						if ($number_ticket <= 3) {
							echo '<div class="col-md-4 col-xs-6 ticket-item"><div class="info-ticket">';
							echo '<p class="departure"><i class="fas fa-plane"></i> '. $ticket[0] . ' đến</p>';
							echo '<p class="destination">'. $ticket[1] .'</p>';
							echo '<p class="date">Ngày bay: '. $ticket[3] . '</p>';
							echo '<p class="date">Thời gian khuyến mãi: '. $ticket[4] . '</p>';
							echo '<a href="', $ticket[5] ,'" class="affiliate-link btn">Đặt vé</span></a>';
							echo '<p class="price">chỉ từ <span>'. $ticket[2] . '</span></p>';
							echo '<div class="clearfix"></div></div></div>';
						} else {
							echo '<div class="col-xs-12 ticket-item">';
							if ($number_ticket == 4) {
								echo '<div class="row"><div class="col-sm-3 ">Chặng bay</div>';
								echo '<div class="col-sm-3">Giá vé</div>';
								echo '<div class="col-sm-2">Ngày bay</div>';
								echo '<div class="col-sm-2">Thời gian khuyến mãi</div>';
								echo '<div class="col-sm-2"></div></div>';
							}
							echo '<div class="info-ticket"><div class="row"><div class="col-sm-3">
									<p class="departure"><i class="fas fa-plane"></i> '. $ticket[0] . ' đến</p>
									<p class="destination">'. $ticket[1] .'</p>
								</div>';
							echo '<div class="col-sm-3">
									<p class="price">chỉ từ <span>'. $ticket[2] . '</span></p>
								</div>';
							echo '<div class="col-sm-2">
									<p class="date">'. $ticket[3] . '</p>
								</div>';
							echo '<div class="col-sm-2">
									<p class="date">'. $ticket[4] . '</p>
								</div>';
							echo '<div class="col-sm-2">
							<a href="', $ticket[5] ,'" class="affiliate-link btn">Đặt vé</span></a>
								</div>';
							echo '</div></div></div>';
						}
						$number_ticket++;
					}
				}
			}
		endwhile;
    endif; wp_reset_query();
 
    $result = ob_get_clean(); //cho hết bộ nhớ đệm vào biến $result
    wp_send_json_success($result); // trả về giá trị dạng json
    die(); //bắt buộc phải có khi kết thúc
}

// Load Posts Cat
add_action( 'wp_ajax_loadpostcat', 'loadpostcat_init' );
add_action( 'wp_ajax_nopriv_loadpostcat', 'loadpostcat_init' );
function loadpostcat_init() {
 
    ob_start(); //bắt đầu bộ nhớ đệm
	$location = $_POST['location'];
	$cat = $_POST['cat'];
	$sort = $_POST['sort'];
	$posts_per_page = 12;
	$args_post = array(
		'category_name' => $cat,
		'tag'			=> $location,
		'posts_per_page'=> $posts_per_page,
	);
	if (!($cat == "bi-quyet-du-lich-tiet-kiem")) {
		$args_post = array_merge($args_post, array(
			'meta_key' => 'total-score',
			'orderby'		=> array(
				'meta_value_num' => $sort
			)
		));
	}
    $post_new = new WP_Query($args_post);
	$found_posts = $post_new->found_posts;
    if ($post_new->have_posts()):
		while($post_new->have_posts()):$post_new->the_post();
			if ($cat == "bi-quyet-du-lich-tiet-kiem") {
				get_template_part( 'content', 'ajax' );
			} else {
				get_template_part( 'content', 'projectajax' );
			}
		endwhile;
    endif; wp_reset_query();
	if ($found_posts > $posts_per_page) {
		echo '<div class="col-xs-12 load-more d-block">';
		echo '<a href="#" class="btn" data-offset="', $posts_per_page ,'" data-cat="', $cat ,'" data-tag="', $location ,'" data-sort="', $sort ,'">Xem thêm (còn ', $found_posts - $posts_per_page ,' bài viết)</a>';
		echo '</div>';
	}
    $result_posts = ob_get_clean(); //cho hết bộ nhớ đệm vào biến $result
    wp_send_json_success($result_posts); // trả về giá trị dạng json
    die(); //bắt buộc phải có khi kết thúc
}

// Load More
add_action( 'wp_ajax_loadmorepost', 'loadmorepost_init' );
add_action( 'wp_ajax_nopriv_loadmorepost', 'loadmorepost_init' );
function loadmorepost_init() {
 
    ob_start(); //bắt đầu bộ nhớ đệm
	$offset = $_POST['offset'];
	$cat = $_POST['cat'];
	$tag = $_POST['tag'];
	$sort = $_POST['sort'];
	$posts_per_page = 12;
    $post_new = new WP_Query(array(
		'category_name' =>  $cat,
		'tag'			=> $tag,
		'posts_per_page'=> $posts_per_page,
		'offset'		=> $offset,
		'meta_key' => 'total-score',
		'orderby'		=> array(
			'meta_value_num' => $sort
		)
	));
	$found_posts = ($post_new->found_posts) - $offset;
    if ($post_new->have_posts()):
		while($post_new->have_posts()):$post_new->the_post();
			get_template_part( 'content', 'projectajax' );
		endwhile;
    endif; wp_reset_query();
	if ($found_posts > $posts_per_page) {
		echo '<div class="col-xs-12 load-more d-block">';
		echo '<a href="#" class="btn" data-offset="', $offset + $posts_per_page ,'" data-cat="', $cat ,'" data-tag="', $tag ,'" data-sort="', $sort ,'">Xem thêm (còn ', $found_posts - $posts_per_page ,' bài viết)</a>';
		echo '</div>';
	}
    $result_posts = ob_get_clean(); //cho hết bộ nhớ đệm vào biến $result
    wp_send_json_success($result_posts); // trả về giá trị dạng json
    die(); //bắt buộc phải có khi kết thúc
}

// Score Location
add_action( 'save_post', 'add_score_location' );
 
function add_score_location( $post_id )
{
	global $wpdb;
	$list_score = get_post_meta($post_id, 'my-review', false);
	$total_score = 0;
	foreach ($list_score as $s) {
		for ($i=0; $i < sizeof($s) ; $i++) { 
			$total_score+= $s[$i][1];
		}
		$total_score = round($total_score/sizeof($s),1);
	}
	if(!wp_is_post_revision($post_id) && ($total_score != 0)) {
		update_post_meta($post_id, 'total-score', $total_score);
    }
}

// Shortcode Link Affilate
function link_affilate ($atts) {
	$atts = shortcode_atts( array(
        'link' => '#',
        'content' => '',
    ), $atts, 'linkaff' );
    return '<p class="link-aff"><a href="'. $atts['link'] .'" target="_blank">'. $atts['content'] .'</a></p>';
}
add_shortcode('linkaff', 'link_affilate');

// Shortcode Lưu ý
function note_content ($atts) {
	$atts = shortcode_atts( array(
        'title' => '',
        'content' => '',
    ), $atts, 'note' );
    return '<p class="note"><i class="fas fa-exclamation-triangle"></i><span class="note-title">'. $atts['title'] .':</span>'. $atts['content'] .'</p>';
}
add_shortcode('note', 'note_content');

// Shorecode list post
function list_post ($atts) {
	$atts = shortcode_atts( array(
        'type' => '',
        'tag' => '',
    ), $atts, 'listpost' );
	global $post;
	$query_list = array('category_name' => $atts['type'], 'tag' => $atts['tag'], 'posts_per_page' => -1, 'post__not_in' => array($post->ID), 'meta_key' => 'total-score', 'orderby' => array('meta_value_num' => "DESC"));
	$list_posts = new WP_Query($query_list);
	ob_start();
    if ( $list_posts->have_posts() ) :
	?>
		<div class="swiper-container list-slide">
			<div class="swiper-wrapper list-post">
		<?php
        while ( $list_posts->have_posts() ) : $list_posts->the_post();
        ?>
				<div class="swiper-slide one-project">
					<a href="<?php the_permalink(); ?>">
						<div class="img-buiding">
							<?php the_post_thumbnail('res-img', ['alt' => get_the_title(), 'sizes' => '(max-width:992px) 100vw, 414px' ]); ?>
						</div>
						<div class="info-project">
								<h3 class="name-project">
									<?php the_title(); ?>
								</h3>
								<?php
									if(function_exists('the_ratings')) { the_ratings(); }
									if (in_category('dia-chi-an-uong')) {
										$type_value = array('Mức giá trung bình', 'Mức giá');
									} elseif (in_category('khach-san-homestay')) {
										$type_value = array('Giá phòng tham khảo', 'Giá phòng');
									} elseif (in_category('dia-diem-du-lich')) {
										$type_value = array('Chi phí tham quan điểm du lịch', 'Giá vé');
									} elseif (in_category('kinh-nghiem-du-lich')) {
										$type_value = array('Tổng chi phí chuyến du lịch', 'Chi phí');
									}
									if (rwmb_meta('chi-phi-du-lich') != "") :
								?>
								<p class="investment-project" data-toggle="tooltip" title="<?php echo $type_value[0]; ?>"><i class="far fa-money-bill-alt"></i> <?php echo $type_value[1]; ?>: <span class="value"><?php rwmb_the_value('chi-phi-du-lich'); if (rwmb_meta('chi-phi-du-lich') != "Miễn phí") { echo '<sup>đ</sup>'; } ?></span></p>
								<?php endif; ?>
								<div class="clearfix"></div>
						</div>
					</a>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
		<?php
    endif; wp_reset_query();
    $wpg_posts = ob_get_contents();
    ob_end_clean();
 
    return $wpg_posts;
}
add_shortcode('listpost', 'list_post');

// Shortcode gallery in post
function gallery_post ($atts) {
	$attr = shortcode_atts( array(
			'name' => 'gallery',
	), $atts );
	ob_start();
	$all_gallery = sizeof(rwmb_meta($attr['name']));
  $gallery = rwmb_meta( $attr['name'], array( 'size' => 'small-img', 'limit' => 5 ) );
	$num_gallery = sizeof($gallery); if ($num_gallery > 0) :
	if ($all_gallery > $num_gallery) : $more_gallery = $all_gallery - $num_gallery; endif;
	if ($attr['name']=="gallery"){$data_slide = ".all-gallery";} else {$data_slide = "." .$attr['name'];}
	?>
	<div class="info-gallery <?php echo ($attr['name']=="gallery" ? 'main-gallery' : $attr['name']); ?>">
		<div class="container">
			<div class="row">
				<?php if ($num_gallery == 5) : $col_1 = "w50"; $col_2 = "w33"; ?>
				<?php elseif ($num_gallery == 4 || $num_gallery == 2) : $col_1 = "w50"; $col_2 = "w50"; ?>
				<?php elseif ($num_gallery == 3) : $col_1 = "w33"; $col_2 = "w33"; ?>
				<?php else : $col_1 = "w100"; ?>
				<?php endif; ?>
				<?php
					$i = 1;
					foreach ( $gallery as $img ) {
						if ($i == 1 || $i == 2) {
							echo '<a href="#" data-slide="', $data_slide ,'" data-number="', $i-1 ,'" data-target="view-photo" class="', $col_1 ,' showGallery" data-toggle="tooltip" title="Click vào để xem ảnh"><img src="', $img['url'] ,'" alt="', $img['title'] ,'" srcset="', $img['srcset'] ,'" sizes="(max-width: 992px) 50vw, 414px"></a>';
						} elseif ($i == 5) {
							if ($more_gallery) {
								echo '<a href="#" data-slide="', $data_slide ,'" data-number="', $i-1 ,'" data-target="view-photo" class="', $col_2 ,' showGallery" data-toggle="tooltip" title="Click vào để xem ảnh"><img src="', $img['url'] ,'" alt="', $img['title'] ,'" srcset="', $img['srcset'] ,'" sizes="(max-width: 992px) 34vw, 414px"><div class="bg-more"><p>', $more_gallery ,'+</p></div></a>';
							} else {
								echo '<a href="#" data-slide="', $data_slide ,'" data-number="', $i-1 ,'" data-target="view-photo" class="', $col_2 ,' showGallery" data-toggle="tooltip" title="Click vào để xem ảnh"><img src="', $img['url'] ,'" alt="', $img['title'] ,'" srcset="', $img['srcset'] ,'" sizes="(max-width: 992px) 34vw, 414px"></a>';
							}
						} else {
							echo '<a href="#" data-slide="', $data_slide ,'" data-number="', $i-1 ,'" data-target="view-photo" class="', $col_2 ,' showGallery" data-toggle="tooltip" title="Click vào để xem ảnh"><img src="', $img['url'] ,'" alt="', $img['title'] ,'" srcset="', $img['srcset'] ,'" sizes="(max-width: 992px) 34vw, 414px"></a>';
						}
						$i++;
					}
				?>
			</div>
		</div>
	</div>
	<?php endif;
	$wpg_posts = ob_get_contents();
    ob_end_clean();
	return $wpg_posts;
}
add_shortcode('gallery', 'gallery_post');

//* Asynchronous JS
function async_js($tag){
$scripts_to_async = array('js/jquery/jquery.js', 'js/jquery/jquery-migrate.min.js');
foreach($scripts_to_async as $async_script){
	if(true == strpos($tag, $async_script ) )
	return str_replace( ' src', ' async src', $tag );	
}
return $tag;
}
add_filter( 'script_loader_tag', 'async_js', 10 );

//* Defer JS
function defer_js($tag){
$scripts_to_defer = array('inc/js/animation-text.js', 'inc/js/google-map.js', 'inc/js/script-chart.js', 'inc/js/chart.min.js', 'wpdiscuz/assets/third-party/wpdcookiejs/customcookie.js', 'wpdiscuz/assets/third-party/autogrow/jquery.autogrowtextarea.min.js', 'wpdiscuz/assets/js/wpdiscuz.js', 'wpdiscuz/assets/js/wpdiscuz-user-content.js', 'wpdiscuz/assets/third-party/lity/lity.js');
foreach($scripts_to_defer as $defer_script){
	if(true == strpos($tag, $defer_script ) )
	return str_replace( ' src', ' defer src', $tag );	
}
return $tag;
}
add_filter( 'script_loader_tag', 'defer_js', 10 );

// Remove JQuery migrate
function remove_jquery_migrate($scripts)
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        
        if ($script->deps) { // Check whether the script has any dependencies
            $script->deps = array_diff($script->deps, array(
                'jquery-migrate'
            ));
        }
    }
}

add_action('wp_default_scripts', 'remove_jquery_migrate');