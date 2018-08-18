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

  add_image_size( 'dazzling-featured', 730, 410, true );
  add_image_size( 'tab-small', 60, 60 , true); // Small Thumbnail

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

  wp_enqueue_style( 'dazzling-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.css' );

  wp_enqueue_style( 'dazzling-slider', get_template_directory_uri().'/inc/css/style-slider.css' );

  wp_enqueue_style( 'dazzling-qtip', get_template_directory_uri().'/inc/css/jquery.qtip.min.css' );

  wp_enqueue_style( 'dazzling-style', get_stylesheet_uri() );

  wp_enqueue_script('dazzling-bootstrapjs', get_template_directory_uri().'/inc/js/bootstrap.js', array('jquery') );

  wp_enqueue_script( 'dazzling-main', get_template_directory_uri() . '/inc/js/main-site.js', array('jquery'), '1.5.4', true );

  wp_enqueue_script( 'dazzling-scriptanimation', get_template_directory_uri() . '/inc/js/script-animation.js', array('jquery'), '1.5.4', true );

  if (!is_single() && !in_category('du-an')) {
	wp_enqueue_script( 'dazzling-animation', get_template_directory_uri() . '/inc/js/menu-animation.js', array('jquery'), '1.5.4', true );
  }
  
  if (is_home()) {
    wp_enqueue_script( 'dazzling-wowslider', get_template_directory_uri() . '/inc/js/wow-slider.js', array('jquery'), '1.5.4', true );

    wp_enqueue_script( 'dazzling-scriptslider', get_template_directory_uri() . '/inc/js/script-slider.js', array('jquery'), '1.5.4', true );

	wp_enqueue_script( 'dazzling-scripthome', get_template_directory_uri() . '/inc/js/script-home.js', array('jquery'), '1.5.4', true );
  }

  if (is_single() && in_category('du-an')) {
    wp_enqueue_script( 'dazzling-scriptproject', get_template_directory_uri() . '/inc/js/script-project.js', array('jquery'), '1.5.4', true );

    wp_enqueue_script( 'dazzling-scriptmaphilight', get_template_directory_uri() . '/inc/js/jquery.map-trifecta.min.js', array('jquery') );

	wp_enqueue_script( 'dazzling-scriptqtip', get_template_directory_uri() . '/inc/js/jquery.qtip.min.js', array('jquery') );
	
	wp_enqueue_script( 'dazzling-scriptmapapi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC75DNSPpK5JTSltYE74rjvYFqJQVfBIv4&language=vi&region=VN');

	wp_enqueue_script( 'dazzling-scriptgooglemap', get_template_directory_uri() . '/inc/js/google-map.js');
  }

  if (is_page('lien-he')) {
	wp_enqueue_script( 'dazzling-scriptmapcontact', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyB_J7TCgptlDrvjaFaHrayYb1C2F8ZaeBg&callback=myMap', '', '', true);
  }

  if (is_page('tuyen-dung')) {
	wp_enqueue_script( 'dazzling-scriptparoller', get_template_directory_uri() . '/inc/js/jquery.paroller.min.js', array('jquery') );
	
	wp_enqueue_script( 'dazzling-scriptrecruitment', get_template_directory_uri() . '/inc/js/script-recruitment.js', array('jquery') );
  }

  if (is_category(array('thu-vien', 'hinh-anh', 'video'))) {
	wp_enqueue_script( 'dazzling-scriptlibrary', get_template_directory_uri() . '/inc/js/script-library.js', array('jquery') );
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
		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'get_meta_box_tongquanduan' );

/** Meta Box Gallery Project */
function get_meta_box_gallery_project( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'gallery_project',
		'title' => esc_html__( '[Dự án] Gallery hình ảnh của dự án', 'dazzling' ),
		'post_types' => array( 'post' ),
		'context' => 'advanced',
		'priority' => 'default',
    	'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'gallery',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Hình ảnh về dự án', 'dazzling' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'get_meta_box_gallery_project' );

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
		'title' => esc_html__( '[Dự án] Thông tin tiện ích dự án', 'dazzling' ),
		'post_types' => array( 'post' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'hinh-phoi-canh',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Hình phối cảnh dự án', 'dazzling' ),
			),
			array(
				'id' => $prefix . 'info-tien-ich',
				'type' => 'text_list',
				'name' => esc_html__( 'Tiện ích dự án', 'dazzling' ),
				'clone' => true,
				'options' => array(
					'Nhập tên tiện ích'      => 'Tên tiện ích',
					'Tọa độ trên hình' => 'Tọa độ trên hình',
					'Nhập link hình minh họa' => 'Link hình minh họa',
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
		'title' => esc_html__( '[Dự án] Tiến độ xây dựng', 'dazzling' ),
		'post_types' => array( 'post' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'info-tien-do',
				'type' => 'text_list',
				'name' => esc_html__( 'Cập nhật tiến độ dự án', 'dazzling' ),
				'clone' => true,
				'options' => array(
					'Link ảnh đại diện'      => 'Hình đại diện',
					'Tiêu đề' => 'Tiêu đề tiến độ',
					'Link bài viết tiến độ' => 'Link bài viết tiến độ',
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
		'title' => esc_html__( '[Giới thiệu] Nội dung trang Giới thiệu', 'dazzing' ),
		'post_types' => array( 'page' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'tam-nhin-su-menh',
				'name' => esc_html__( 'Tầm nhìn - Sứ mệnh', 'dazzing' ),
				'type' => 'wysiwyg',
			),
			array(
				'id' => $prefix . 'chien-luoc',
				'name' => esc_html__( 'Chiến lược', 'dazzing' ),
				'type' => 'wysiwyg',
			),
			array(
				'id' => $prefix . 'chinh-sach-chat-luong',
				'name' => esc_html__( 'Chính sách chất lượng', 'dazzing' ),
				'type' => 'wysiwyg',
			),
			array(
				'id' => $prefix . 'cong-ty-thanh-vien',
				'type' => 'text_list',
				'name' => esc_html__( 'Danh sách các công ty thành viên', 'dazzling' ),
				'clone' => true,
				'options' => array(
					'Nhập link logo công ty'      => 'Logo công ty',
					'Nhập tên công ty' => 'Tên công ty',
					'Nhập nội dung chú thích' => 'Chú thích',
				),
			),
			array(
				'id' => $prefix . 'video-introduce',
				'type' => 'oembed',
				'name' => esc_html__( 'Video giới thiệu', 'dazzling' ),
				'desc' => esc_html__( 'Nhập link hoặc mã nhúng của video', 'dazzling' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'get_meta_box_gioithieu' );

/** Meta Box Trading System */
function get_meta_box_trading( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'he-thong-san-giao-dich',
		'title' => esc_html__( '[Liên hệ] Hệ thống sàn giao dịch', 'dazzing' ),
		'post_types' => array( 'page' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'san-giao-dich',
				'name' => esc_html__( 'Thông tin sàn giao dịch', 'dazzing' ),
				'type' => 'wysiwyg',
				'clone' => true,
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'get_meta_box_trading' );

/** Meta Box Recruitment */
function get_meta_box_recruitment( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'tuyen-dung',
		'title' => esc_html__( '[Tuyển dụng] Nội dung trang Tuyển dụng', 'dazzing' ),
		'post_types' => array( 'page' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'vi-sao-chon-cityland',
				'name' => esc_html__( 'Vì sao chọn CityLand', 'dazzing' ),
				'type' => 'wysiwyg',
			),
			array(
				'id'   => 'bg-vi-sao-chon-cityland',
				'name' => 'Ảnh nền "Vì sao chọn Cityland"',
				'type' => 'single_image',
			),
			array(
				'id' => $prefix . 'moi-truong-lam-viec',
				'name' => esc_html__( 'Môi trường làm việc', 'dazzing' ),
				'type' => 'wysiwyg',
			),
			array(
				'id'   => 'bg-moi-truong-lam-viec',
				'name' => 'Ảnh nền "Môi trường làm việc"',
				'type' => 'single_image',
			),
			array(
				'id' => $prefix . 'he-thong-luong-thuong',
				'name' => esc_html__( 'Hệ thống lương thưởng', 'dazzing' ),
				'type' => 'wysiwyg',
			),
			array(
				'id'   => 'bg-he-thong-luong-thuong',
				'name' => 'Ảnh nền "Hệ thống lương thưởng"',
				'type' => 'single_image',
			),
			array(
				'id' => $prefix . 'chinh-sach-phuc-loi',
				'name' => esc_html__( 'Chính sách phúc lợi', 'dazzing' ),
				'type' => 'wysiwyg',
			),
			array(
				'id'   => 'bg-chinh-sach-phuc-loi',
				'name' => 'Ảnh nền "Chính sách phúc lợi"',
				'type' => 'single_image',
			),
			array(
				'id' => $prefix . 'chinh-sach-dao-tao',
				'name' => esc_html__( 'Chính sách đào tạo', 'dazzing' ),
				'type' => 'wysiwyg',
			),
			array(
				'id'   => 'bg-chinh-sach-dao-tao',
				'name' => 'Ảnh nền "Chính sách đào tạo"',
				'type' => 'single_image',
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'get_meta_box_recruitment' );

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

function wpdocs_number_posts_on_category( $query ) {
  if ( $query->is_category() && $query->is_main_query()) {
      $query->set( 'posts_per_page', 12 );
  }
}
add_action( 'pre_get_posts', 'wpdocs_number_posts_on_category' );

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
			'entry.1740162443'=>urlencode($posted_data['hoten']),
			'entry.715679737'=>urlencode($posted_data['diachi']),
			'entry.1334736093'=>urlencode($posted_data['email']),
			'entry.99939948'=>urlencode($posted_data['sodienthoai']),
			'entry.1314958770'=>urlencode($posted_data['tieude']),
			'entry.1612213704'=>urlencode($posted_data['noidung'])
			);
			foreach ($fields as $key => $value) { $fields_string .= $key.'='.$value.'&'; }
			rtrim($fields_string, '&');

			header('Content-type: text/html; charset=UTF-8');
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_ENCODING ,"UTF-8");

			$url=utf8_encode('https://docs.google.com/forms/d/e/1FAIpQLSdfM6Kc4i5w7ncDk0m7Qx2EM0aUlM-jazbZE6j8_wh7PYwD_Q/formResponse');
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