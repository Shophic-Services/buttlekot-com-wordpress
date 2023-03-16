<?php
global $wp_query;
if (!is_search () and !is_404 ()) {
	$copallyt_thePageID = $wp_query->post->ID;
}
else {
	$copallyt_thePageID = "";
}


$copallyt_style = get_post_meta ($copallyt_thePageID, 'wd_page_title_area_style', true);
$copallyt_page_bg_img = get_post_meta ($copallyt_thePageID, 'wd_page_title_area_bg_img', true);
$copallyt_page_bg_color = get_post_meta ($copallyt_thePageID, 'wd_page_title_area_bg_color', true);

wp_enqueue_style ('custom-line', get_template_directory_uri () . '/style.css');
//********* inline style ***************/qs
$copallyt_custom_css = "";
$copallyt_custom_css .= "";
$copallyt_custom_css .= ".l-footer-columns { background-color: " . copallyt_get_option ('footer_bg_color') . "}";
$copallyt_custom_css .= ".l-footer-columns, .l-footer-columns .block-title , .l-footer-columns ul li a { color: " . copallyt_get_option ('footer_text_color') . "}";
$copallyt_custom_css .= ".l-footer { background-color: " . copallyt_get_option ('copyright_bg') . "; color: " . copallyt_get_option ('copyright_text_color') . ";}";
$copallyt_footer_bg_img = copallyt_get_option ('wd_footer_bg_image', true) == '' ? '' : copallyt_get_option ('wd_footer_bg_image', true);

$copallyt_custom_css .= "
            .l-footer-columns {
              background-image: url('$copallyt_footer_bg_img');
              background-size: cover;

            }";
if (is_page () & ($copallyt_page_bg_img != "")) {
	//-------------title page--------------
	$copallyt_custom_css .= "
      .titlebar {
        background:url($copallyt_page_bg_img) " . $copallyt_page_bg_color . " no-repeat;
        width:100%;
        text-align:" . esc_html (get_post_meta ($copallyt_thePageID, 'wd_page_title_position', true)) . ";
        background-size: cover;
      }
      #page-title,.breadcrumbs a{
        color:" . esc_html (get_post_meta ($copallyt_thePageID, 'wd_page_title_color', true) == '' ? '#fff' : get_post_meta ($copallyt_thePageID, 'wd_page_title_color', true)) . ";
      }
      .titlebar::after {
	      background-color: rgba(0,0,0,0.1);
	    }";
}


if ($copallyt_page_bg_img == "") {


	$copallyt_title_bg_image = esc_url(get_header_image());
	$copallyt_404_bg_image = copallyt_get_option ('wd_404_page');

	$copallyt_custom_css .= "
      .titlebar {
        background:url($copallyt_title_bg_image)  no-repeat #666;
        
        width:100%;
        text-align:" . esc_html (get_post_meta ($copallyt_thePageID, 'wd_page_title_position', true) == '' ? 'left' : get_post_meta ($copallyt_thePageID, 'wd_page_title_position', true)) . ";
        background-size: cover;
      }
    
      #page-title,.breadcrumbs a{
        color:" . esc_html (get_post_meta ($copallyt_thePageID, 'wd_page_title_color', true) == '' ? '#fff' : get_post_meta ($copallyt_thePageID, 'wd_page_title_color', true)) . ";
      }";
	if ($copallyt_404_bg_image != ''){
		$copallyt_custom_css .= "
			.corp-titlebar{
				background:url($copallyt_404_bg_image)  no-repeat center top;
				background-size: cover;
		 }";
	}
}

$copallyt_custom_css .= "
	  .header-top.social_top_bar, .orange_bar {
			background : " . esc_html (copallyt_get_option ('adress_bar_bgcolor')) . ";
		}
	  .header-top.social_top_bar, .orange_bar,
	  .l-header .header-top .contact-info,
	  .l-header .header-top i,
	  .l-header .header-top .social-icons.accent li i,
	  #lang_sel_list a.lang_sel_sel, #lang_sel_list > ul > li a {
			color : " . esc_html (copallyt_get_option ('adress_bar_color')) . ";
		}
		";

if (copallyt_get_option ('wd_box_wrapper') == 'on') {
	$copallyt_custom_css .= "
 							.bg_body_color {
 								background : " . esc_html (copallyt_get_option ('wrapper_bg_color')) . ";
 							}
 			";
}
if (is_rtl ()) {
	$copallyt_custom_css .= "body, p, #lang_sel_list {
            font-family : 'Droid Arabic Kufi', serif;
          } ";

	$copallyt_custom_css .= "h1, h2, h3, h4, h5, h6 {
              font-family : 'Droid Arabic Naskh', serif;
            } ";
}
else {
	if ((copallyt_get_option ('wd_body_font_familly') != 'default') && (copallyt_get_option ('wd_body_font_familly') != false)) {
		$copallyt_custom_css .= "body, body p {
    	font-size :" . esc_html (copallyt_get_option ('wd_body_font_size')) . ";
    	font-family :" . esc_html (copallyt_get_option ('wd_body_font_familly')) . ";
    	font-style:" . esc_html (copallyt_get_option ('wd_body_font_style')) . ";
    	font-weight :" . esc_html (copallyt_get_option ('wd_body_font_weight')) . ";
    }";
		if (copallyt_get_option ('wd_main_text_lettre_spacing') != false && copallyt_get_option ('wd_main_text_lettre_spacing') != "") {
			$copallyt_custom_css .= "body, body p {
	    	letter-spacing :" . esc_html (copallyt_get_option ('wd_main_text_lettre_spacing')) . ";
	  	}";
		}

	}
	else {
		$copallyt_custom_css .= "body, body p {
    	font-family: 'Open Sans', sans-serif;
    	font-weight :" . esc_html (copallyt_get_option ('wd_font-weight-style')) . ";
    }";
		if (copallyt_get_option ('wd_main_text_lettre_spacing') != false && copallyt_get_option ('wd_main_text_lettre_spacing') != "") {
			$copallyt_custom_css .= "body, body p {
	    	letter-spacing :" . esc_html (copallyt_get_option ('wd_main_text_lettre_spacing')) . ";
	  	}";
		}
	}
	if ((copallyt_get_option ('wd_head_font_familly') != 'default') && (copallyt_get_option ('wd_head_font_familly') != false)) {
		$copallyt_custom_css .= "h1, h2, h3, h4, h5, h6, .menu-list a {
    	font-family :" . esc_html (copallyt_get_option ('wd_head_font_familly', 'ubuntu')) . ";
    	font-style :" . esc_html (copallyt_get_option ('wd_head_font_style')) . ";
    	font-weight :" . esc_html (copallyt_get_option ('wd_heading-font-weight-style')) . ";
    }";
		if (copallyt_get_option ('wd_heading_text_lettre_spacing') != false && copallyt_get_option ('wd_heading_text_lettre_spacing') != "") {
			$copallyt_custom_css .= "h1, h2, h3, h4, h5, h6, .menu-list a {
	    	letter-spacing :" . esc_html (copallyt_get_option ('wd_heading_text_lettre_spacing')) . ";
	  	}";
		}
	}
	else {
		$copallyt_custom_css .= "h1, h2, h3, h4, h5, h6, .menu-list a {
    	font-family: '" . esc_html (copallyt_get_option ('wd_head_font_familly', 'ubuntu')) . "', 'Open Sans', sans-serif;
    	font-weight :" . esc_html (copallyt_get_option ('wd_heading-font-weight-style')) . ";
    }";
		if (copallyt_get_option ('wd_heading_text_lettre_spacing') != false && copallyt_get_option ('wd_heading_text_lettre_spacing') != "") {
			$copallyt_custom_css .= "h1, h2, h3, h4, h5, h6, .menu-list a {
	    	letter-spacing :" . esc_html (copallyt_get_option ('wd_heading_text_lettre_spacing')) . ";
	  	}";
		}
	}

	if ((copallyt_get_option ('wd_navigation_font_familly') != 'default') && (copallyt_get_option ('wd_navigation-font-weight-style') != false)) {
		$copallyt_custom_css .= ".top-bar-section .main-nav > li > a:not(.button),.top-bar-section ul li > a {
    	    font-size :" . esc_html (copallyt_get_option ('wd_navigation_font_size')) . ";
			font-family : " . esc_html (copallyt_get_option ('wd_navigation_font_familly')) . ";
			font-style : " . esc_html (copallyt_get_option ('wd_navigation_font_style')) . ";
			font-weight : " . esc_html (copallyt_get_option ('wd_navigation-font-weight-style')) . ";

		}";
		if (copallyt_get_option ('wd_navigation_text_lettre_spacing') != false && copallyt_get_option ('wd_navigation_text_lettre_spacing') != "") {
			$copallyt_custom_css .= ".top-bar-section ul li > a {
	    	letter-spacing :" . esc_html (copallyt_get_option ('wd_navigation_text_lettre_spacing')) . ";
	  	}";
		}
	}
	else {
		$copallyt_custom_css .= ".corporate-layout .top-bar-section ul.menu > li > a {
			font-family: " . esc_html (copallyt_get_option ('wd_navigation_font_familly')) . ";
			font-weight : " . esc_html (copallyt_get_option ('wd_navigation-font-weight-style')) . ";
		}";
		if (copallyt_get_option ('wd_navigation_text_lettre_spacing') != false && copallyt_get_option ('wd_navigation_text_lettre_spacing') != "") {
			$copallyt_custom_css .= ".top-bar-section ul li > a {
	    	letter-spacing :" . esc_html (copallyt_get_option ('wd_navigation_text_lettre_spacing')) . ";
	  	}";
		}
	}
}

$copallyt_custom_css .= "
		.primary-color_bg, .square-img > a::before, .boxes .box > a::before, .boxes .box .flipper a::before, .wd_onepost .title-block span, .one_post_box .box_image .titel_icon .box_icon, .one_post_box .more, .boxes .box-container > a::before, .boxes .box-container .flipper a::before, .layout-4 div.box-icon i.fa, .boxes.small.layout-5 .box-icon, .boxes.small.layout-5-inverse .box-icon, .boxes.small.layout-6 .box-icon i.fa, .carousel_blog span.tag a, .wd-carousel-container .carousel-icon i, .search_box input[type='submit'], table thead, table tfoot, .block-block-17, .row.call-action,
		.blog-info, button.dark:hover, button.dark:focus, .button.dark:hover, .button.dark:focus, span.wpb_button:hover, span.wpb_button:focus, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range, .products .product .button, .woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce #content input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce-page #content input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, .woocommerce span.onsale, .woocommerce-page span.onsale, .woocommerce-page button.button, .widget_product_search #searchsubmit, .widget_product_search #searchsubmit:hover, .l-footer-columns #searchsubmit, .page-numbers.current,
		.post-password-form input[type='submit'], .page-links a:hover, .blog-post .sticky .blog-info, .team-member-slider .owl-dots .owl-dot.active span, .team-member-slider .owl-theme .owl-dots .owl-dot:hover span, .team-member-carousel .owl-dots .owl-dot.active span, .team-member-carousel .owl-theme .owl-dots .owl-dot:hover span, #comments ul.commentlist li.comment section.comment .comment-reply-link, #comments ol.commentlist li.comment section.comment .comment-reply-link, .wd-image-text.style-2 h4::after, .blog-posts .read-more a::after, .top-bar-section .request-quote a,
		.contact-form [type='submit'], .woocommerce-page input.button, .woocommerce-page a.button
		  {
						background :		" . esc_html (copallyt_get_option ('primary_color', '#f00')) . ";
		}
		.text_icon_hover > div .vc_row:hover
		  {
						background :		" . esc_html (copallyt_get_option ('primary_color', '#f00')) . " !important;
		}
		  .text_icon_hover > div .vc_row:hover .box-title-1, .text_icon_hover > div .vc_row:hover .box-body{
		  	color : #fff;
		  }
		.blog-post .sticky .blog-info,


		 .primary-color_bg, h2.contact-us::after, .contact-us-info h2::after, .who-we-are h2::after, input.wpcf7-submit, .sidebar-second.sidebar.sidebar-left ul li:hover,
		 .sidebar-second.sidebar.sidebar-left ul li.current-menu-item, .sidebar-second.sidebar.sidebar-left ul li.current-menu-item:hover,
		 .l-footer-columns .newsletter-div .newslettersubmit, .l-footer-columns h2::after, .square-img > a::before, .boxes .box > a::before,
		 .boxes .box .flipper a::before, .pricing-table.featured .special-box, .pricing-table.featured .special-box::before, .pricing-table.featured .special-box::after,
		 .pricing-table.featured .pricing-table-header, div.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading,
		 div.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a, .contact-form [type='submit'],
		 .format-quote .post-box .post-body-container, .format-link .post-box .post-body-container, .wd-image-text.style-2 h4::after, .wd_onepost .title-block span,
		 .one_post_box .box_image .titel_icon .box_icon, .one_post_box .more, .boxes .box-container > a::before, .boxes .box-container .flipper a::before,
		 .layout-4 div.box-icon i.fa, .boxes.small.layout-5 .box-icon, .boxes.small.layout-5-inverse .box-icon, .boxes.small.layout-6 .box-icon i.fa, table thead, table tfoot,
		 .block-block-17, .row.call-action, .blog-info, button:hover, button:focus, .button:hover, .button:focus, span.wpb_button:hover, span.wpb_button:focus
		 {
			background: " . esc_html (copallyt_get_option ('primary_color', '#f00')) . ";
		}
	.sidebar #s:active,
	.custom-tour .vc_tta-tabs-container li.vc_active a,
    .sidebar #s:focus, .boxes.layout-3 .box-icon,.top-bar-section ul li:hover,.corporate-layout .top-bar-section ul li:hover,.corporate-layout .top-bar-section ul li.current-menu-item,

    .primary-color_border, .wpb-js-composer .vc_tta-container div.vc_tta-color-grey.vc_tta-style-classic.custom-tour .vc_tta-tabs-container li.vc_active a, .wpb-js-composer .vc_tta-container div.vc_tta-color-grey.vc_tta-style-classic.custom-tour .vc_tta-panel-body .container .img-wrp, .wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic.vertical-tab .vc_tta-tabs-container li.vc_active a, .wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic.vertical-tab .vc_tta-panel-body .container .img-wrp, .wpb-js-composer .vc_tta-container div.vc_tta-color-grey.vc_tta-style-classic.vertical-accordion .vc_tta-panels-container .vc_tta-panel.vc_active .vc_tta-panel-title a, .wpb-js-composer .vc_tta-container div.vc_tta-color-grey.vc_tta-style-classic.vertical-accordion .vc_tta-panel-body .container .img-wrp, .wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic.custom-accordion .vc_tta-panel.vc_active .vc_tta-panel-heading, .wd-heading hr, .section-container.auto > section.active .title, .section-container.auto > .section.active .title, .section-container.vertical-tabs > section.active > .title, .section-container.vertical-tabs > .section.active > .title, .section-container.vertical-nav > section.active > .title, .section-container.vertical-nav > .section.active > .title, .section-container.horizontal-nav > section.active > .title, .section-container.horizontal-nav > .section.active > .title, .section-container.accordion > section.active > .title, .section-container.accordion > .section.active > .title

     {
      border-color :    " . esc_html (copallyt_get_option ('primary_color', '#f00')) . ";
    }
    .blog-info .arrow {
      border-color: transparent " . esc_html (copallyt_get_option ('primary_color', '#f00')) . ";
		}
		.primary-color_color, a, a:focus, a.active, a:active, a:hover,section.corporate .menu-item a i,
		 .box-container:hover .box-title, .blog-posts i, .woocommerce .woocommerce-breadcrumb, .woocommerce-page .woocommerce-breadcrumb, div.boxes.small.layout-3 .box-icon i,.corporate-layout .header-top .contact-info .fa,
		 .l-header .header-top .social-icons.accent li:hover i,.corporate-layout .top-bar-section ul li:hover:not(.has-form) > a,
		 .corporate-layout .top-bar-section ul li.active:not(.has-form) > a:not(.button),
		 .creative-layout .top-bar-section li.active:not(.has-form) a:not(.button),
		 .team-member-item h3,
		 .layout-4-testimonials .testimonial-box .author-info .rating li.selected .fa,
		 .custom-tour .vc_tta-tabs-container li.vc_active a i,
		 .social_media li i,

		  .primary-color_color, .who-we-are h4, a, a:focus, a.active, a:active, a:hover, .contact-info i, .sidebar .block-title::before, .l-footer-columns .newsletter-div a.footer-readmor, .l-footer-columns ul li a::before, .pricing-table.featured .pricing-table-header .sign-up .button, .social_media li i, .team-member-item h3, .wpb-js-composer .vc_tta-container div.vc_tta-color-grey.vc_tta-style-classic.custom-tour .vc_tta-tabs-container li.vc_active a i, .wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic.vertical-tab .vc_tta-tabs-container li.vc_active a i, .wpb-js-composer .vc_tta-container div.vc_tta-color-grey.vc_tta-style-classic.vertical-accordion .vc_tta-panels-container .vc_tta-panel.vc_active .vc_tta-panel-title a i, .wd-heading span, .wd-testimonail blockquote cite, .layout-4-testimonials .testimonial-box .author-info .rating li.selected .fa, .boxes.small .box-icon i, .box-container:hover .box-title, .wd-pagination .page-numbers:hover

		  {
				color : 	" . esc_html (copallyt_get_option ('primary_color', '#f00')) . " ;
		}
		 .boxes.small.layout-3 .box-icon i,
		  div.boxes.small.layout-3:hover .box-icon i {
		   color: rgba(255,255,255,1);
		 }
		.blog-posts h2 a, .breadcrumbs > *, .breadcrumbs {
			color : " . esc_html (copallyt_get_option ('secondary_color')) . "
		}
		button, .button, button:hover, button:focus, .button:hover, .button:focus, .products .product:hover .button,
		.woocommerce-product-search > input[type='submit'] {
			background-color : " . esc_html (copallyt_get_option ('secondary_color')) . "
		}
		.corporate-layout .top-bar-section ul.menu > li > a,
		.creative-layout .top-bar-section ul li > a {
      color :    " . esc_html (copallyt_get_option ('navigation_text_color', '#181b2a')) . ";
    }
    .contain-to-grid.sticky.fixed {
			background-color:" . esc_html (copallyt_get_option ('navigation_bg_color_sticky', '#FFF')) . ";
		}
		.l-footer-columns, .l-footer-columns .block-title , .l-footer-columns ul li a {
			color: " . esc_html (copallyt_get_option ('footer_text_color')) . "
		}
		.l-footer {
			background-color : " . esc_html (copallyt_get_option ('copyright_bg')) . "
		}
		.contain-to-grid.sticky.fixed , .top-bar , .corporate-layout .contain-to-grid.sticky, header.l-header,.corporate-layout .contain-to-grid {
			background-color : " . esc_html (copallyt_get_option ('header_bg')) . "
		}
		#spaces-main {
			background-color : " . esc_html (copallyt_get_option ('container_bg')) . "
		}";


$copallyt_custom_css .= "
											.blog-info .arrow {
    									border-left-color:" . copallyt_get_option ('primary_color') . " ;
												}
												.ui-accordion-header-active, .ui-tabs-active, .box-icon {
													border-top-color:" . copallyt_get_option ('primary_color') . "
												}

												";