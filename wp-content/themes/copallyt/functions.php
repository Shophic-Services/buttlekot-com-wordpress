<?php
/**
 *----------------- include ------------------------------------------
 */
include_once(get_template_directory() . '/inc/tools.php');
include_once(get_template_directory() . '/inc/plugins/plugins.php');
include_once(get_template_directory() . '/inc/panel.php');
include_once(get_template_directory() . '/inc/meta-box.php');
include_once(get_template_directory() . '/inc/mega-menu.php');
require_once(get_template_directory() . '/inc/aq_resizer.php');


function copallyt_setup()
{
  load_theme_textdomain('copallyt', get_template_directory() . '/languages');

  if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));
    add_theme_support('automatic-feed-links');
    add_theme_support('woocommerce');
    add_theme_support('custom-background');
    add_theme_support('title-tag');
    add_theme_support( "custom-header" );

    add_theme_support( 'editor-styles' );
    add_editor_style( 'editor.css' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-color-palette', array(
      array(
        'name'  => __( 'Primary Color', 'copallyt' ),
        'slug'  => 'primary',
        'color'	=> 'rgba(255,0,0,1)',
      ),
      array(
        'name'  => __( 'Secondary color ', 'copallyt' ),
        'slug'  => 'secondary ',
        'color' => 'rgba(255,255,255,1)',
      ),
    ) );
    add_theme_support( 'editor-font-sizes', array(
      array(
        'name'      => __( 'small', 'copallyt' ),
        'shortName' => __( 'S', 'copallyt' ),
        'size'      => 14,
        'slug'      => 'small'
      ),
      array(
        'name'      => __( 'regular', 'copallyt' ),
        'shortName' => __( 'M', 'copallyt' ),
        'size'      => 16,
        'slug'      => 'regular'
      ),
      array(
        'name'      => __( 'large', 'copallyt' ),
        'shortName' => __( 'L', 'copallyt' ),
        'size'      => 18,
        'slug'      => 'large'
      ),
    ) );

  }

  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus(array(
    'primary' => esc_html__('Primary Navigation', 'copallyt'),
    'right-menu' => esc_html__('Right', 'copallyt'),
  ));
}

add_action('after_setup_theme', 'copallyt_setup');


/*-----------------add Body Classes------------------------------------------*/
function copallyt_body_classes($classes)
{
  if (copallyt_get_option('wd_box_wrapper') == 'on') {
    $classes[] = 'bg_body_color';
  }
  return $classes;
}

add_filter('body_class', 'copallyt_body_classes');

function copallyt_theme_add_editor_styles()
{
  add_editor_style('custom-editor-style.css');
}

add_action('admin_init', 'copallyt_theme_add_editor_styles');
/**
 *-----------------add sidebar------------------------------------------
 */

function copallyt_widgets_init()
{
  //--------------- Widget for Right Sidebar
  register_sidebar(array(
    'name' => esc_html__('Sidebar Right', 'copallyt'),
    'id' => 'sidebar-1',
    'description' => esc_html__('Add widgets here to appear in your right sidebar.', 'copallyt'),
    'before_widget' => '<section>',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="block-title">',
    'after_title' => '</h2>',
  ));

  //--------------- Widget for left Sidebar
  register_sidebar(array(
    'name' => esc_html__('Sidebar Left', 'copallyt'),
    'id' => 'sidebar-2',
    'description' => esc_html__('Add widgets here to appear in your left sidebar.', 'copallyt'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="block-title">',
    'after_title' => '</h2>',
  ));
  //--------------- Widget for first column Footer
  register_sidebar(array(
    'name' => esc_html__('Footer 1st column', 'copallyt'),
    'id' => 'footer',
    'description' => esc_html__('Add widgets here to appear in your first footer column.', 'copallyt'),
    'before_widget' => '<div id="%1$s" class=" %2$s ">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="block-title">',
    'after_title' => '</h2>',
  ));
  //--------------- Widget for 2nd column Footer
  register_sidebar(array(
    'name' => esc_html__('Footer 2nd column', 'copallyt'),
    'id' => 'footer_columns_tow',
    'description' => esc_html__('Add widgets here to appear in your 2nd footer column.', 'copallyt'),
    'before_widget' => '<div id="%1$s" class=" %2$s ">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="block-title">',
    'after_title' => '</h2>',
  ));
  //--------------- Widget for 3rd column Footer
  register_sidebar(array(
    'name' => esc_html__('Footer 3rd column', 'copallyt'),
    'id' => 'footer_columns_three',
    'description' => esc_html__('Add widgets here to appear in your 3rd footer column.', 'copallyt'),
    'before_widget' => '<div id="%1$s" class=" %2$s ">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="block-title">',
    'after_title' => '</h2>',
  ));
  //--------------- Widget for 4th column Footer
  register_sidebar(array(
    'name' => esc_html__('Footer 4th column', 'copallyt'),
    'id' => 'footer_columns_four',
    'description' => esc_html__('Add widgets here to appear in your 4th footer column.', 'copallyt'),
    'before_widget' => '<div id="%1$s" class=" %2$s ">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="block-title">',
    'after_title' => '</h2>',
  ));
  //--------------- Widget for woocomerce Sidebar
  register_sidebar(array('name' => esc_html__('Woocommerce Sidebar', 'copallyt'),
    'id' => 'shop-widgets',
    'description' => esc_html__('Appears on the shop page of your website.', 'copallyt'),
    'before_widget' => '<div id="%1$s" class="widget %2$s shop-widgets">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));
}

add_action('widgets_init', 'copallyt_widgets_init');


/**
 *--------------- Image presets-----------
 */

add_image_size('copallyt_small-thumb', 100, 70, true);
add_image_size('copallyt_sidebar-thumb', 160, 150, true);
add_image_size('copallyt_recent-blog-h', 465, 243, true);
add_image_size('copallyt_recent-blog-v', 390, 308, true);
add_image_size('copallyt_blog-thumb', 880, 450, true);
add_image_size('copallyt_650x350', 650, 350, true);
add_image_size('copallyt_team', 550, 576, true);
add_image_size('copallyt_team_member_slider', 744, 833, true);
add_image_size('copallyt_team_member_carousel', 370, 370, true);
add_image_size('copallyt_sidebar-thumb', 140, 140, true);
add_image_size('copallyt_1900x620', 1900, 620, true);


/**
 * ---------------load scripts and styles--------------------------------
 */

function copallyt_fonts_url($copallyt_font_body_name, $copallyt_font_weight_style, $copallyt_main_text_font_subsets)
{
  $copallyt_font_url = '';

  /*
  Translators: If there are characters in your language that are not supported
  by chosen font(s), translate this to 'off'. Do not translate into your own language.
   */
  if ('off' !== _x('on', 'Google font: on or off', 'copallyt')) {
    $copallyt_font_url = add_query_arg('family', urlencode($copallyt_font_body_name . ':' . $copallyt_font_weight_style . '&subset=' . $copallyt_main_text_font_subsets), "//fonts.googleapis.com/css");
  }
  return $copallyt_font_url;
}


function copallyt_load_js_css_file()
{
  /*----------google -fonts ------------------*/
  $copallyt_font_body_name = copallyt_get_option('wd_body_font_familly', "default");
  $copallyt_font_weight_style = copallyt_get_option('wd_body_font_weight_list');
  $copallyt_main_text_font_subsets = copallyt_get_option('wd_main-text-font-subsets');

  $font_header_name = copallyt_get_option('wd_head_font_familly', "ubuntu");
  $copallyt_heading_font_weight_style = copallyt_get_option('wd_heading-font-weight-style-list');
  $copallyt_heading_text_font_subsets = copallyt_get_option('wd_heading-text-font-subsets');

  $copallyt_navigation_font_familly = copallyt_get_option('wd_navigation_font_familly', "default");
  $copallyt_navigation_font_weight_style = copallyt_get_option('wd_navigation-font-weight-style-list');
  $copallyt_navigation_text_font_subsets = copallyt_get_option('wd_navigation-text-font-subsets');


  $copallyt_protocol = is_ssl() ? 'https' : 'http';
  if (is_rtl()) {
    wp_enqueue_style('copallyt_body_google_fonts', copallyt_fonts_url('Droid Arabic Kufi', '400,700', 'latin,latin-ext'), array(), '1.0.0');
  } elseif ($copallyt_font_body_name != "default" && $copallyt_font_weight_style != "") {
    wp_enqueue_style('copallyt_body_google_fonts', copallyt_fonts_url($copallyt_font_body_name, $copallyt_font_weight_style, $copallyt_main_text_font_subsets), array(), '1.0.0');
  } else {
    wp_enqueue_style('wd_body_google_fonts', copallyt_fonts_url('Ubuntu', '300,400,500,700', 'latin,latin-ext'), array(), '1.0.0' );
  }


  if ($font_header_name != "default" && $copallyt_heading_font_weight_style != "") {
    wp_enqueue_style('copallyt_header_google_fonts', copallyt_fonts_url($font_header_name, $copallyt_heading_font_weight_style, $copallyt_main_text_font_subsets), array(), '1.0.0');
  }

  if ($copallyt_navigation_font_familly != "default" && $copallyt_navigation_font_weight_style != "") {
    wp_enqueue_style('wd_navigation_google_fonts', copallyt_fonts_url($copallyt_navigation_font_familly, $copallyt_navigation_font_weight_style, $copallyt_navigation_text_font_subsets), array(), '1.0.0');
  }

  wp_enqueue_style('animation-custom', get_template_directory_uri() . "/css/animate-custom.css");
  wp_enqueue_style('copallyt-customstyle', get_template_directory_uri() . "/css/app.css");
  wp_enqueue_style('component', get_template_directory_uri() . "/css/vendor/component.css");
  wp_enqueue_style('copallyt-custom-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('owlcarouselstyl', get_template_directory_uri() . "/css/owl.carousel.css");
  wp_enqueue_style('woocommerce', get_template_directory_uri() . "/css/woocommerce.css");
  wp_enqueue_style('mediaelementplayer', get_template_directory_uri() . "/css/mediaelementplayer.css");
  wp_enqueue_style('font-awesome', get_template_directory_uri() . "/css/font-awesome.min.css");


  if (is_singular() && get_option('thread_comments'))
    wp_enqueue_script('comment-reply');

  wp_enqueue_script('foundation.js', get_template_directory_uri() . "/js/foundation/foundation.min.js", array('jquery'));
  wp_enqueue_script('appear', get_template_directory_uri() . "/js/plugins/appear.js", array('jquery'));
  wp_enqueue_script('easing', get_template_directory_uri() . "/js/plugins/easing.js", array('jquery'));
  wp_enqueue_script('mediaelementjs', get_template_directory_uri() . "/js/plugins/mediaelementjs.js", array('jquery'));
  wp_enqueue_script('mediaelementplayer', get_template_directory_uri() . "/js/plugins/mediaelementplayer.js", array('jquery'));
  wp_enqueue_script('modernizer', get_template_directory_uri() . "/js/plugins/modernizer.js", array('jquery'));
  wp_enqueue_script('owlcarousel', get_template_directory_uri() . "/js/plugins/owlcarousel.js", array('jquery'));
  wp_enqueue_script('owlcarouselthumb', get_template_directory_uri() . "/js/plugins/owl.carousel2.thumbs.js", array('jquery'));
  wp_enqueue_script('packery', get_template_directory_uri() . "/js/plugins/packery.js", array('jquery'));
  wp_enqueue_script('isotope', get_template_directory_uri() . "/js/plugins/isotope.js", array('jquery'));
  wp_enqueue_script('counterup', get_template_directory_uri() . "/js/plugins/counterup.js", array('jquery'));
  wp_enqueue_script('easypiechart', get_template_directory_uri() . "/js/plugins/easypiechart.js", array('jquery'));
  wp_enqueue_script('waypoints', get_template_directory_uri() . "/js/plugins/waypoints.js", array('jquery'));
  wp_enqueue_script('lightbox', get_template_directory_uri() . "/js/plugins/lightbox.js", array('jquery'));
  wp_enqueue_script('sharrre', get_template_directory_uri() . "/js/plugins/sharrre.js", array('jquery'));
  wp_enqueue_script('greensock', get_template_directory_uri() . "/js/plugins/greensock.js", array('jquery'));

    wp_enqueue_script('googlemaps', $copallyt_protocol."://maps.googleapis.com/maps/api/js?", array('jquery'), '4.4.2', false);

  wp_enqueue_script('foundation-reveal', get_template_directory_uri() . "/js/foundation/foundation.reveal.js", array('jquery'));
  wp_enqueue_script('foundation-equalize', get_template_directory_uri() . "/js/foundation/foundation.equalizer.js", array('jquery'));
  wp_enqueue_script('copallyt-shortcodes-js', get_template_directory_uri() . "/js/shortcode/script-shortcodes.js", array('jquery'));
  wp_enqueue_script('copallyt-copallyt_plugins-owl', get_template_directory_uri() . "/js/wd_owlcarousel.js", array('jquery'));
  wp_enqueue_script('copallyt-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'hoverIntent'));

  include_once(get_template_directory() . '/inc/custom-style.php');

  wp_add_inline_style('copallyt-customstyle', $copallyt_custom_css);
  //*********/inline style***************/

}

add_action('wp_enqueue_scripts', 'copallyt_load_js_css_file');


/**
 * ---------------menu--------------------------------
 */
$copallyt_count = 1;

class copallyt_top_bar_walker extends Walker_Nav_Menu
{

  static protected $menu_bg_test;

  function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0)
  {

    $copallyt_class = "";
    if (is_object($args)) {
      global $copallyt_count;
      $icon = (count($item->classes) > 1) ? $item->classes[1] : "";

      if ($item->mega_menu == 1) {
        $copallyt_class = 'wd_mega-menu';
      }
      $copallyt_icon = $item->mega_menu_icon;
      self::$menu_bg_test = $item->mega_menu_bg_image;
      $indent = ($depth) ? str_repeat("\t", $depth) : '';
      $class_names = $value = '';

      $classes = empty($item->classes) ? array() : (array)$item->classes;
      $classes[] = ($item->current) ? 'active' : '';
      $classes[] = ($args->has_children) ? ' color-1 has-dropdown not-click' : '';
      $args->link_before = (in_array('section', $classes)) ? '<label>' : '';
      $args->link_after = (in_array('section', $classes)) ? '</label>' : '';
      $output .= (in_array('section', $classes));
      $class_names = !empty($classes) ? implode(' ',$classes).' ' : '';
      $class_names .= ($args->has_children) ? 'has-dropdown not-click ' . $copallyt_class : '';
      $parent = $item->menu_item_parent;
      if ($parent == 0) {
        $copallyt_count++;
      }

      $current_page = empty($item->classes[4]) ? '' : $item->classes[4];
      $class_names .= ' color-' . $copallyt_count . ' ' . $current_page;
      $class_names = strlen(trim($class_names)) > 0 ? ' class="' . esc_attr($class_names) . '"' : '';
      $output .= $indent . '
			<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';

      $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
      $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
      $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
      $attributes .= !empty($item->url) ? ' href="' . esc_url($item->url) . '"' : '';

      $attributes .= ' class="has-icon"';

      $item_output = $args->before;
      $item_output .= (!in_array('section', $classes)) ? '
			<a' . $attributes . '>' : '';
      if (($icon != '') and ($icon != '---- None ----')) {

        $item_output .= '<i class="' . $copallyt_icon . ' fa"></i> ';
      }
      $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID);
      $item_output .= $args->link_after;
      $item_output .= (!in_array('section', $classes)) ? '</a>' : '';
      $item_output .= $args->after;


      $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }


  }

  function end_el(&$output, $item, $depth = 0, $args = Array())
  {
    $output .= '
</li>' . "\n";
  }

  function start_lvl(&$output, $depth = 0, $args = Array())
  {
    $indent = str_repeat("\t", $depth);
    if (isset($menu_bg_test) && $menu_bg_test != "") {
      $output .= "\n" . $indent . '
<ul class="sub-menu dropdown " style = "background-image : url(' . self::$menu_bg_test . ')">
	' . "\n";
    } else {
      $output .= "\n" . $indent . '
			<ul class="sub-menu dropdown ">
	' . "\n";
    }

  }

  function end_lvl(&$output, $depth = 0, $args = Array())
  {
    $indent = str_repeat("\t", $depth);
    $output .= $indent .


      '

 </ul>' . "\n";
  }

  function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
  {
    $id_field = $this->db_fields['id'];
    if (is_object($args[0])) {
      $args[0]->has_children = !empty($children_elements[$element->$id_field]);
    }
    return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
  }

}


function copallyt_main_menu_fallback()
{
  if(is_user_logged_in()) {
    echo '<div class="empty-menu">';
  echo esc_html__('Please assign a menu to the primary menu location under ', 'copallyt'); ?>
  <a href="<?php get_admin_url(get_current_blog_id(), 'nav-menus.php') ?>"><?php echo esc_html__('Menus Settings', 'copallyt') ?></a>
  </div> <?php
  }
  
}

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if (!isset($content_width))
  $content_width = 625;

/*---------wooocomerce---------*/
//Reposition WooCommerce breadcrumb
function copallyt_woocommerce_remove_breadcrumb()
{
  remove_action(
    'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
}

add_action(
  'woocommerce_before_main_content', 'copallyt_woocommerce_remove_breadcrumb'
);

function copallyt_woocommerce_custom_breadcrumb()
{
  woocommerce_breadcrumb();
}

add_action('woo_custom_breadcrumb', 'copallyt_woocommerce_custom_breadcrumb');


// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('woocommerce_add_to_cart_fragments', 'copallyt_woocommerce_header_add_to_cart_fragment');

function copallyt_woocommerce_header_add_to_cart_fragment($fragments)
{
  ob_start();
  ?>
  <a class="cart-contents" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>"
     title="<?php echo esc_attr__('View your shopping cart', 'copallyt'); ?>"><?php echo sprintf(esc_html__('%d item', 'copallyt', WC()->cart->cart_contents_count), WC()->cart->cart_contents_count); ?>
    - <?php echo WC()->cart->get_cart_total(); ?></a>
  <?php

  $fragments['a.cart-contents'] = ob_get_clean();

  return $fragments;
}




// initialize options
if (!function_exists('copallyt_initialize_options')) {
  function copallyt_initialize_options()
  {


    if (!get_option("wd_options_array")) {
      $options_array = get_option("wd_options_array");
      $options_array = array(
        'wd_show_logo' => "",
        'wd_show_cart' => "",
        'wd_show_top_social_bare' => "",
        'wd_box_wrapper' => "",
        'wd_menu_in_grid' => "",
        'wd_menu_sticky' => "",
        'wd_show_title' => "on",
        'wd_footer_bg_image' => "",
        'footer_bg_color' => "",
        'footer_text_color' => "",
        'wd_copyright' => "",
        'wd_poweredby' => "",
        'copyright_text_color' => "",
        'wd_logo' => "",
        'wd_404_page' => "",
        'wd_home_page' => "",
        'wd_favicon' => "",
        'wrapper_bg_color' => "",
        'primary_color' => "",
        'secondary_color' => "",
        'adress_bar_color' => "",
        'social_bar_color' => "",
        'copyright_bg' => "",
        'header_bg' => "",
        'container_bg' => "",
        'wd_footer_columns' => "",
        'navigation_text_color' => "",
        'navigation_bg_color_sticky' => "",
        'footer_text_color' => "",
        'wd_copyright' => "",
        'language_area_html' => "",
        'copallyt_show_wpml_widget' => '',
        'twitter' => "",
        'facebook' => "",
        'flickr' => "",
        'vimeo' => "",
        'phone' => "",
        'adress' => "",
        'wd_body_font_familly' => "ubuntu",
        'wd_body_font_style' => "",
        'wd_font-weight-style' => "",
        'wd_main_text_lettre_spacing' => '',
        'wd_main-text-font-subsets' => "",
        'wd_head_font_familly' => "ubuntu",
        'wd_head_font_style' => "",
        'wd_heading-font-weight-style' => "",
        'wd_heading-text-font-subsets' => "",
        'wd_heading_text_lettre_spacing' => "",
        'wd_navigation_font_familly' => "'Poppins', 'Open Sans', sans-serif",
        'wd_navigation_font_style' => "",
        'wd_navigation-font-weight-style' => "",
        'wd_navigation-text-font-subsets' => "",
        'wd_navigation_text_lettre_spacing' => "",
        'wd_menu_style' => "",
        'wd_theme_custom_js' => ""
      );
      update_option("wd_options_array", $options_array);
    }
  }
}


// get options value
if (!function_exists('copallyt_get_option')) {
  function copallyt_get_option($copallyt_option_key, $copallyt_option_default_value = null)
  {
    copallyt_initialize_options();
    $options_array = get_option("wd_options_array");

    // for demo purpose
    if(function_exists("wd_custom_options")) {
      $options_array = wd_custom_options($options_array);
    }


    $copallyt_meta_value = "";
    if (array_key_exists($copallyt_option_key, $options_array)) :
      if (isset($options_array[$copallyt_option_key]) && !empty($options_array[$copallyt_option_key])) {
        $copallyt_meta_value = esc_attr($options_array[$copallyt_option_key]);
      }

      if ($copallyt_meta_value == "") {
        $copallyt_meta_value = $copallyt_option_default_value;
      }
    endif;
    return $copallyt_meta_value;
  }
}

// get options value
if (!function_exists('copallyt_save_option')) {
  function copallyt_save_option($copallyt_option_key, $copallyt_option_value = null)
  {
    $options_array = get_option("wd_options_array");
    $options_array[$copallyt_option_key] = $copallyt_option_value;
    update_option("wd_options_array", $options_array);
  }
}


if (!function_exists('copallyt_get_categories')) {
  function copallyt_get_categories($taxonomy = '')
  {
    $args = array(
      'type' => 'post',
      'hide_empty' => 0
    );

    $output = array();

    $args['taxonomy'] = $taxonomy;
    $categories = get_categories($args);

    if (!empty($categories) && is_array($categories)) {
      foreach ($categories as $category) {
        if (is_object($category)) {
          $output[$category->name] = $category->slug;
        }
      }
    }

    return $output;
  }
}

function copallyt_removeslashes($string)
{
  $string = implode("", explode("\\", $string));

  return stripslashes(trim($string));
}

function copallyt_init () {
  return copallyt_class::instance();
}

copallyt_init();

class copallyt_class {

  private static $instance;
  public $helpers;
  public $customizer;
  public $activation;
  public $integrations;
  public $widgets;
  public $template;
  public $page_settings;
  public $widgetized_pages;

  public static function instance () {
    if(!isset(self::$instance) && !(self::$instance instanceof copallyt_class)) {
      self::$instance = new self;
    }

    return self::$instance;
  }

  public function __construct () {
    $this->base();
    $this->setup();
  }

  // Integration getter helper
  public function get ($integration) {
    return $this->integrations->get($integration);
  }

  private function base () {
    $this->files = array('customizer/class-customizer.php');

    foreach($this->files as $file) {
      require_once(get_template_directory() . '/inc/' . $file);
    }
  }

  private function setup () {

    $this->customizer = new copallyt_Customizer();

    add_action('after_setup_theme', array($this,
                                          'setup_theme'));
  }

  public function setup_theme () {
    load_theme_textdomain('copallyt', get_template_directory() . '/languages');
    add_editor_style('css/editor-style.css');

    add_theme_support('custom-background', apply_filters('copallyt_custom_background_args', array('default-color' => 'ffffff',
                                                                                               'default-image' => '',)));

  }

}