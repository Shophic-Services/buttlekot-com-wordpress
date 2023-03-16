<!doctype html>
<!--[if IE 9]>
<html class="lt-ie10" lang="en"> <![endif]-->
<html class="no-js" <?php language_attributes(); ?> >
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <?php if (!function_exists('has_site_icon')) {
    if (copallyt_get_option('wd_favicon', '') != '') { ?>
      <link rel="shortcut icon" href="<?php echo esc_url(copallyt_get_option('wd_favicon')); ?>"/>
    <?php }
  } ?>
  <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>

<!-- offcanvas start -->
<?php
$menu_style = isset($_GET['menustyle']) ? $_GET['menustyle'] : copallyt_get_option('wd_menu_style', 'corporate');

if ($menu_style == "offcanvas") { ?>
  <div class="off-canvas-wrap" data-offcanvas>
    <div class="inner-wrap">
      <a class="left-off-canvas-toggle" href="#"><i class="fa fa-bars"></i></a>
      <aside class="left-off-canvas-menu">
        <?php
        $defaults = array(
          'theme_location' => '',
          'menu' => '',
          'container' => 'div',
          'container_class' => '',
          'container_id' => '',
          'menu_class' => 'menu',
          'menu_id' => '',
          'echo' => true,
          'fallback_cb' => 'copallyt_main_menu_fallback',
          'before' => '',
          'after' => '',
          'link_before' => '',
          'link_after' => '',

          'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth' => 0,
          'walker' => '',
        );

        wp_nav_menu($defaults);

        ?>
      </aside>
    </div>
  </div>

<?php }

if (copallyt_get_option('wd_box_wrapper') == 'on') { ?>
  <img src="<?php echo esc_url(copallyt_get_option('wd_home_page')) ?>" class="bg_image_body"
       alt="<?php echo esc_attr__('body background', 'copallyt') ?>">
<?php }

$boxed_class = '';
if (copallyt_get_option('wd_box_wrapper') == 'on') {
  $boxed_class = 'wd_wrapper';
} ?>

<div id="spaces-main" class="pt-perspective <?php echo esc_attr($boxed_class) ?>">
  <section class="page-section home-page" id="page-content">
    <div class="l-header <?php echo esc_attr($menu_style); ?>-layout">
      <?php if (copallyt_get_option('wd_show_top_social_bare') == 'on') { ?>
        <div class="header-top social_top_bar">
          <div class="row top_header_info">

            <div class="header_top_left header_top_lang">
              <div class="left">
                <?php
                if (copallyt_get_option('language_area_html') != "" && copallyt_get_option('copallyt_show_wpml_widget') != "on") {
                  echo html_entity_decode(copallyt_get_option('language_area_html'));
                }
                if (copallyt_get_option('copallyt_show_wpml_widget') == "on") {
                  if (do_action('icl_language_selector')) {
                    do_action('icl_language_selector');
                  }
                }
                ?>
              </div>
            </div>
            <div class="contact-info  hide-for-small right">
              <i class="fa fa-phone"></i>
              <span><?php echo esc_html(copallyt_get_option('phone')); ?></span>
              <i class="fa fa-envelope"></i>
              <span> <?php echo esc_html(copallyt_get_option('adress')); ?> </span>
              <i class="fa fa-clock-o"></i>
              <span class=""><?php echo html_entity_decode(copallyt_get_option('time', '')); ?></span>

            </div>
            <div class="large-3 columns header_top_right">
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
</div>

<header class="l-header <?php echo esc_attr($menu_style); ?>-layout">
  <div class="contain-to-grid
                    <?php if (copallyt_get_option('wd_menu_in_grid') != 'off') echo "contain-to-grid"; ?>
                    <?php if (copallyt_get_option('wd_menu_sticky','of') == 'on') echo "sticky"; ?> ">
    <nav class="top-bar" data-topbar>
      <ul class="title-area <?php if (copallyt_get_option('wd_show_title', '') == 'on') echo "title-displayed"; ?>">

        <li class="name">
          <?php
          $copallyt_logo_path = get_template_directory_uri() . "/images/logogcopallyt.png";
          $copallyt_logo = copallyt_get_option('wd_logo', $copallyt_logo_path);

          if (copallyt_get_option('wd_show_logo', '') == 'on' && copallyt_get_option('wd_logo', $copallyt_logo_path) != ''): ?>
            <?php $image = copallyt_get_option('wd_logo', $copallyt_logo);
            ?>
            <h1><a href="<?php echo esc_url(home_url('/')); ?>" rel="home" title="<?php echo bloginfo('name') ?>"
                   class="active"><img src="<?php echo esc_url($image); ?>"
                                       alt="<?php echo esc_attr__('logo', 'copallyt') ?>"/></a></h1>
          <?php endif; ?>
          <?php if (copallyt_get_option('wd_show_title', 'on') == 'on' && copallyt_get_option('wd_show_logo', '') != 'on'): ?>
            <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>"><h2><?php echo bloginfo('name') ?></h2>
            </a>
          <?php endif ?>
        </li>
        <?php if ($menu_style != "offcanvas" && $menu_style != "modern") { ?>
          <li class="toggle-topbar menu-icon">
            <a href="#"><span><?php echo esc_html__('Menu', 'copallyt'); ?></span></a>
          </li>
        <?php } ?>
      </ul>

      <?php
      $request_quote = copallyt_get_option('wd_call_to_action');
      $request_quote_link = copallyt_get_option('wd_call_to_action_button_link');
      ?>
      <section class="<?php echo esc_attr($menu_style);
      echo (esc_html($request_quote) != "") ? " add-m" : ""; ?> top-bar-section">
        <?php

        if ($menu_style == "corporate") {

          $defaults = array(
            'theme_location' => 'primary',
            'menu' => '',
            'container' => 'div',
            'container_class' => 'menu-menu-container',
            'container_id' => '',
            'menu_class' => 'menu',
            'menu_id' => 'menu-menu',
            'echo' => true,
            'fallback_cb' => 'copallyt_main_menu_fallback',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',

            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 0,
            'walker' => new copallyt_top_bar_walker,

          );

          wp_nav_menu($defaults);
          if ($request_quote != "") { ?>
            <div class="request-quote right hide-for-small" <?php if (empty($request_quote)) {
              echo 'style = "display: none"';
            } ?>>
              <a
                href="<?php echo esc_url($request_quote_link); ?>"><span><?php echo esc_html($request_quote); ?></span></a>
            </div>
          <?php } ?>
        <?php } elseif ($menu_style == "modern") { ?>
          <a href="#" id="trigger-overlay" ><i class="fa fa-bars"></i></a>
          <div class="overlay overlay-scale">
            <button type="button" class="overlay-close"><?php echo esc_html__('Close', 'copallyt') ?></button>
            <nav>
              <?php
              $defaults = array(
                'theme_location' => 'primary',
                'menu' => '',
                'container' => 'div',
                'container_class' => '',
                'container_id' => '',
                'menu_class' => 'menu',
                'menu_id' => '',
                'echo' => true,
                'fallback_cb' => 'copallyt_main_menu_fallback',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',

                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 0,
                'walker' => new copallyt_top_bar_walker,
              );

              wp_nav_menu($defaults);

              ?>
            </nav>
          </div>

        <?php } elseif ($menu_style == "creative") { ?>
          <?php
          $defaults = array(
            'theme_location' => 'primary',
            'menu' => '',
            'container' => 'div',
            'container_class' => '',
            'container_id' => '',
            'menu_class' => 'menu right',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'copallyt_main_menu_fallback',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',

            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 0,
            'walker' => new copallyt_top_bar_walker,
          );

          wp_nav_menu($defaults);

          ?>

        <?php } elseif ($menu_style == "nav-layout-metro") { ?>
          <?php
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'container_class' => 'top-bar-section',
            'container' => 'div',
            'menu_class' => 'main-nav',
            'menu_id' => 'main-menu',
            'walker' => new copallyt_top_bar_walker,
            'fallback_cb' => 'copallyt_main_menu_fallback')); ?>
        <?php } ?>
      </section>
    </nav>
  </div>
  <!--/.top-Menu -->
</header>