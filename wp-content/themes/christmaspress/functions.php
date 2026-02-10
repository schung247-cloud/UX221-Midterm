<?php
/**
 * ChristmasPress functions and definitions
 *
 * @package ChristmasPress
 * @since ChristmasPress 1.0
 */

if ( ! isset( $content_width ) )
    $content_width = 654; /* pixels */

if ( ! function_exists( 'christmaspress_setup' ) ):

function christmaspress_setup() {

    require( get_template_directory() . '/inc/template-tags.php' );

    require( get_template_directory() . '/inc/tweaks.php' );

    load_theme_textdomain( 'christmaspress', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );
	
	add_theme_support( 'post-thumbnails' );

    add_theme_support( 'post-formats', array( 'aside' ) );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'christmaspress' ),
    ) );
}
endif;
add_action( 'after_setup_theme', 'christmaspress_setup' );

// ✅ Register widget areas (sidebars)
function christmaspress_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'christmaspress' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Main sidebar that appears on the right or left.', 'christmaspress' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'christmaspress_widgets_init' );

// Enable shortcodes in text widgets (modernized)
add_filter('widget_text', function($text) { return do_shortcode($text); });

function christmaspress_enqueue_scripts() {
    // Load jQuery
    wp_enqueue_script('jquery');

    // Load ChristmasPress JS
    wp_enqueue_script('christmaspress_xmascount', get_template_directory_uri() . '/js/xmascount.js', array(), null, true);

    // Theme navigation and image navigation
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }

    // Load stylesheet
    wp_enqueue_style('christmaspress-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'christmaspress_enqueue_scripts');







class Christmas_Countdown_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'christmas_countdown',
            __('Christmas Countdown', 'christmaspress'),
            array('description' => __('Displays a decorative countdown to Christmas!', 'christmaspress'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        echo $args['before_title'] . __('Countdown to Christmas', 'christmaspress') . $args['after_title'];

        $today = new DateTime();
        $christmas = new DateTime(date('Y') . '-12-25');
        if ($today > $christmas) {
            $christmas->modify('+1 year');
        }
        $interval = $today->diff($christmas);
        $days = $interval->days;

        echo '<div id="countdown"><div class="countdown-text">';
        echo '<p>Only<br><strong>' . $days . '</strong><br>days until<br>Christmas!</p>';
        echo '</div></div>';

        echo $args['after_widget'];
    }
}

function register_christmas_countdown_widget() {
    register_widget('Christmas_Countdown_Widget');
}
add_action('widgets_init', 'register_christmas_countdown_widget');


function christmaspress_enqueue_fonts() {
    wp_enqueue_style( 'christmaspress-fonts', 'https://fonts.googleapis.com/css2?family=Mystery+Quest&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'christmaspress_enqueue_fonts' );

















