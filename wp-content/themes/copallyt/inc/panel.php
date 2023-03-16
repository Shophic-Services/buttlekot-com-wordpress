<?php


/*///////////////////////////////// Register Panel Scripts and Styles /////////////////////////////////////////*/

global $copallyt_fontArray;


function copallyt_admin_register () {

	wp_register_script ('wd-admin-main', get_template_directory_uri () . '/inc/js/script.js', array (
		'jquery',
		'jquery-ui-core',
		'jquery-ui-widget',
		'jquery-ui-mouse',
		'jquery-ui-tabs',
		'jquery-ui-droppable',
		'jquery-ui-sortable'
	), false, false);

	wp_register_style ('wd-style', get_template_directory_uri () . '/inc/css/style.css', array (), '20120208', 'all');

	wp_enqueue_media ();
	wp_register_style ('wd-jquery-ui-fontSelector', get_template_directory_uri () . '/css/jquery.ui.fontSelector.css', array (), '4.3.1', 'all');


	$copallyt_font_body_name = copallyt_get_option ('wd_body_font_familly', "default");
	$copallyt_font_weight_style = copallyt_get_option ('wd_body_font_weight', '300');
	$copallyt_main_text_font_subsets = copallyt_get_option ('wd_main-text-font-subsets', 'latin');

	$copallyt_font_header_name = copallyt_get_option ('wd_head_font_familly', "ubuntu");
	$copallyt_heading_font_weight_style = copallyt_get_option ('wd_heading-font-weight-style', '500');
	$copallyt_heading_text_font_subsets = copallyt_get_option ('wd_heading-text-font-subsets', 'latin');

	$copallyt_navigation_font_familly = copallyt_get_option ('wd_navigation_font_familly', "default");
	$copallyt_navigation_font_weight_style = copallyt_get_option ('wd_navigation-font-weight-style', '300');
	$copallyt_navigation_text_font_subsets = copallyt_get_option ('wd_navigation-text-font-subsets', 'latin');
	$copallyt_protocol = is_ssl () ? 'https' : 'http';

	if ($copallyt_font_body_name != "" && $copallyt_font_body_name != "default") {
		$copallyt_font_body_name="Ubuntu:300,400,500,700";
		wp_register_style ('wd-google-fonts-body', copallyt_fonts_url( esc_html ($copallyt_font_body_name) , $copallyt_font_weight_style , $copallyt_main_text_font_subsets ), false, NULL, 'all');
	}
	if ($copallyt_font_header_name != "" && $copallyt_font_header_name != "default") {
		wp_register_style ('wd-google-fonts-heading', copallyt_fonts_url( esc_html ($copallyt_font_header_name) , $copallyt_heading_font_weight_style , $copallyt_heading_text_font_subsets ), false, NULL, 'all');
	}
	if ($copallyt_navigation_font_familly != "" && $copallyt_navigation_font_familly != "default") {
		wp_register_style ('wd-google-fonts-navigation', copallyt_fonts_url( esc_html ($copallyt_navigation_font_familly) , $copallyt_navigation_font_weight_style , $copallyt_navigation_text_font_subsets ), false, NULL, 'all');
	}


	if (isset($_GET['page']) && $_GET['page'] == 'option panel') {


	}
	wp_enqueue_script ('wd-admin-main');
	wp_enqueue_style ('wd-style');
	wp_enqueue_style ('wd-jquery-ui-fontSelector');
	wp_enqueue_style ('wd-google-fonts');
	wp_enqueue_style ('wd-google-fonts-body');
	wp_enqueue_style ('wd-google-fonts-heading');
	wp_enqueue_style ('wd-google-fonts-navigation');
	wp_enqueue_style ('font-awesome', get_template_directory_uri () . "/css/font-awesome.min.css");

}

add_action ('admin_enqueue_scripts', 'copallyt_admin_register');


if (!function_exists ('copallyt_load_color_picker')) {
	add_action ('load-widgets.php', 'copallyt_load_color_picker');
	function copallyt_load_color_picker () {
		wp_enqueue_style ('wp-color-picker');
		wp_enqueue_script ('wp-color-picker');
	}
}


/*///////////////////////////////// Theme Options /////////////////////////////////////////*/
if (!function_exists ('copallyt_panel_option')) {
	add_action ('admin_menu', 'copallyt_panel_option');
	function copallyt_panel_option () {


		add_theme_page ('Copallyt Theme Options', 'Copallyt Theme Options', 'edit_theme_options', 'copallyt-theme-option', 'copallyt_theme_option');
		if (class_exists('WebdeviaMainPlugin')) {
			add_theme_page ('Import Demo Content', 'Import Demo Content', 'edit_theme_options', 'copallyt-demo-content', 'copallyt_import_demo');
		}

	}
}


if (!function_exists ('copallyt_theme_option')) {
	function copallyt_theme_option () {

		wp_enqueue_media ();


		wp_enqueue_script ('wp-color-picker');
		wp_enqueue_style ('wp-color-picker');


		wp_enqueue_script ('colorpick', get_template_directory_uri () . "/js/bootstrap-colorpicker.min.js", array ('jquery'));
		wp_enqueue_style ('colorpick', get_template_directory_uri () . "/css/bootstrap-colorpicker.min.css");
		wp_enqueue_style ('fontawesome', get_template_directory_uri () . "/css/font-awesome.min.css");


		wp_enqueue_style ('copallyt_font_selector_css', get_template_directory_uri () . "/css/jquery.ui.fontSelector.css");
		wp_enqueue_script ('consilting-js-panel', get_template_directory_uri () . "/inc/js/panel_script.js", array ('jquery'));
		wp_enqueue_script ('consilting-js-import', get_template_directory_uri () . "/inc/js/import_js.js", array ('jquery'));
		?>

		<?php


		if (!empty($_POST)) {

			if (isset($_POST['wd_show_logo']))
				copallyt_save_option ('wd_show_logo', sanitize_text_field ($_POST['wd_show_logo']));
			else
				copallyt_save_option ('wd_show_logo', '');

			if (isset($_POST['wd_show_cart']))
				copallyt_save_option ('wd_show_cart', sanitize_text_field ($_POST['wd_show_cart']));
			else
				copallyt_save_option ('wd_show_cart', '');

			if (isset($_POST['wd_show_top_social_bare']))
				copallyt_save_option ('wd_show_top_social_bare', sanitize_text_field ($_POST['wd_show_top_social_bare']));
			else
				copallyt_save_option ('wd_show_top_social_bare');

			if (isset($_POST['wd_box_wrapper']))
				copallyt_save_option ('wd_box_wrapper', sanitize_text_field ($_POST['wd_box_wrapper']));
			else
				copallyt_save_option ('wd_box_wrapper', 'of');


			if (isset($_POST['wd_menu_in_grid'])) {
				copallyt_save_option ('wd_menu_in_grid', sanitize_text_field ($_POST['wd_menu_in_grid']));
			}
			else {
				copallyt_save_option ('wd_menu_in_grid', 'off');
			}

			if (isset($_POST['wd_menu_sticky'])) {
				copallyt_save_option ('wd_menu_sticky', sanitize_text_field ($_POST['wd_menu_sticky']));
			}
			else {
				copallyt_save_option ('wd_menu_sticky', '');
			}


			if (isset($_POST['wd_show_title'])) {
				copallyt_save_option ('wd_show_title', sanitize_text_field ($_POST['wd_show_title']));
			}
			else {
				copallyt_save_option ('wd_show_title', 'of');
			}

			copallyt_save_option ('wd_footer_bg_image', sanitize_text_field ($_POST['settings']['_wd_footer_bg_image']));
			copallyt_save_option ('footer_bg_color', sanitize_text_field ($_POST['footer_bg_color']));
			copallyt_save_option ('footer_text_color', sanitize_text_field ($_POST['footer_text_color']));
			copallyt_save_option ('wd_copyright', htmlentities (stripslashes ($_POST['wd_copyright'])));
			copallyt_save_option ('wd_poweredby', htmlentities (stripslashes ($_POST['wd_poweredby'])));
			copallyt_save_option ('copyright_text_color', sanitize_text_field ($_POST['copyright_text_color']));
			copallyt_save_option ('wd_logo', sanitize_text_field ($_POST['settings']['_wd_logo']));
			copallyt_save_option ('copallyt_title_bg_image', esc_attr ($_POST['settings']['_copallyt_title_bg_image']));
			copallyt_save_option ('wd_404_page', sanitize_text_field ($_POST['settings']['_wd_bg_404_page']));
			copallyt_save_option ('wd_home_page', sanitize_text_field ($_POST['settings']['_wd_bg_home_page']));


			if (!function_exists ('has_site_icon')) {
				copallyt_save_option ('wd_favicon', sanitize_text_field ($_POST['settings']['_wd_favicon']));
			}

			copallyt_save_option ('wd_call_to_action', str_replace ("\\", "", $_POST['wd_call_to_action']));
			copallyt_save_option ('wd_call_to_action_button_link', sanitize_text_field ($_POST['wd_call_to_action_button_link']));

			copallyt_save_option ('wrapper_bg_color', sanitize_text_field ($_POST['wrapper_bg_color']));
			copallyt_save_option ('primary_color', sanitize_text_field ($_POST['primary_color']));
			copallyt_save_option ('secondary_color', sanitize_text_field ($_POST['secondary_color']));
			copallyt_save_option ('adress_bar_bgcolor', sanitize_text_field ($_POST['adress_bar_bgcolor']));
			copallyt_save_option ('adress_bar_color', sanitize_text_field ($_POST['adress_bar_color']));
			copallyt_save_option ('social_bar_color', sanitize_text_field ($_POST['social_bar_color']));

			copallyt_save_option ('time', htmlentities (stripslashes ($_POST['time'])));
			copallyt_save_option ('copyright_bg', sanitize_text_field ($_POST['copyright_bg']));
			copallyt_save_option ('header_bg', sanitize_text_field ($_POST['header_bg']));
			copallyt_save_option ('container_bg', sanitize_text_field ($_POST['container_bg']));
			copallyt_save_option ('wd_footer_columns', sanitize_text_field ($_POST['wd_footer_columns']));
			copallyt_save_option ('navigation_text_color', sanitize_text_field ($_POST['navigation_text_color']));
			copallyt_save_option ('navigation_bg_color_sticky', sanitize_text_field ($_POST['navigation_bg_color_sticky']));
			copallyt_save_option ('footer_text_color', sanitize_text_field ($_POST['footer_text_color']));


			copallyt_save_option ('language_area_html', htmlentities (stripslashes ($_POST['language_area_html'])));
			if (isset($_POST['copallyt_show_wpml_widget'])) {
				copallyt_save_option ('copallyt_show_wpml_widget', sanitize_text_field ($_POST['copallyt_show_wpml_widget']));
			}

			copallyt_save_option ('phone', sanitize_text_field ($_POST['phone']));
			copallyt_save_option ('adress', sanitize_text_field ($_POST['adress']));

			copallyt_save_option ('shred_map_key', sanitize_text_field ($_POST['shred_map_key']));


			copallyt_save_option ('wd_body_font_familly', sanitize_text_field ($_POST['wd_body_font_familly']));
			copallyt_save_option ('wd_body_font_style', sanitize_text_field ($_POST['wd_body_font_style']));
			copallyt_save_option ('wd_body_font_weight', sanitize_text_field ($_POST['wd_body_font_weight']));
			$wd_body_font_weight_list_content = '';
			if (isset($_POST['wd_body_font_weight_list'])) {
				if (is_array ($_POST['wd_body_font_weight_list']) && count ($_POST['wd_body_font_weight_list']) > 0) {
					foreach ($_POST['wd_body_font_weight_list'] as $lists)
						$wd_body_font_weight_list_content .= $lists . ',';
					$wd_body_font_weight_list_content = trim ($wd_body_font_weight_list_content, ',');
				}
				elseif (!is_array ($_POST['wd_body_font_weight_list'])) {
					$wd_body_font_weight_list_content = $_POST['wd_body_font_weight_list'];
				}
			}
			copallyt_save_option ('wd_body_font_weight_list', sanitize_text_field ($wd_body_font_weight_list_content));
			copallyt_save_option ('wd_body_font_size', sanitize_text_field ($_POST['wd_body_font_size']));
			copallyt_save_option ('wd_main-text-font-subsets', sanitize_text_field ($_POST['wd_main-text-font-subsets']));
			copallyt_save_option ('wd_main_text_lettre_spacing', sanitize_text_field ($_POST['wd_main_text_lettre_spacing']));

			copallyt_save_option ('wd_head_font_familly', sanitize_text_field ($_POST['wd_head_font_familly']));
			copallyt_save_option ('wd_head_font_style', sanitize_text_field ($_POST['wd_head_font_style']));
			copallyt_save_option ('wd_head_font_size', sanitize_text_field ($_POST['wd_head_font_size']));
			copallyt_save_option ('wd_heading-font-weight-style', sanitize_text_field ($_POST['wd_heading-font-weight-style']));
			$wd_heading_font_weight_list_content = '';
			if (isset($_POST['wd_heading-font-weight-style-list'])) {
				if (is_array ($_POST['wd_heading-font-weight-style-list']) && count ($_POST['wd_heading-font-weight-style-list']) > 0) {
					foreach ($_POST['wd_heading-font-weight-style-list'] as $lists)
						$wd_heading_font_weight_list_content .= $lists . ',';
					$wd_heading_font_weight_list_content = trim ($wd_heading_font_weight_list_content, ',');
				}
				elseif (!is_array ($_POST['wd_heading-font-weight-style-list'])) {
					$wd_heading_font_weight_list_content = $_POST['wd_heading-font-weight-style-list'];
				}
			}
			copallyt_save_option ('wd_heading-font-weight-style-list', sanitize_text_field ($wd_heading_font_weight_list_content));
			copallyt_save_option ('wd_heading-text-font-subsets', sanitize_text_field ($_POST['wd_heading-text-font-subsets']));
			copallyt_save_option ('wd_heading_text_lettre_spacing', sanitize_text_field ($_POST['wd_heading_text_lettre_spacing']));

			copallyt_save_option ('wd_navigation_font_familly', sanitize_text_field ($_POST['wd_navigation_font_familly']));
			copallyt_save_option ('wd_navigation_font_style', sanitize_text_field ($_POST['wd_navigation_font_style']));
			copallyt_save_option ('wd_navigation_font_size', sanitize_text_field ($_POST['wd_navigation_font_size']));
			copallyt_save_option ('wd_navigation-font-weight-style', sanitize_text_field ($_POST['wd_navigation-font-weight-style']));
			$wd_navigation_font_weight_list_content = '';
			if (isset($_POST['wd_navigation-font-weight-style-list'])) {
				if (is_array ($_POST['wd_navigation-font-weight-style-list']) && count ($_POST['wd_navigation-font-weight-style-list']) > 0) {
					foreach ($_POST['wd_navigation-font-weight-style-list'] as $lists)
						$wd_navigation_font_weight_list_content .= $lists . ',';
					$wd_navigation_font_weight_list_content = trim ($wd_navigation_font_weight_list_content, ',');
				}
				elseif (!is_array ($_POST['wd_navigation-font-weight-style-list'])) {
					$wd_navigation_font_weight_list_content = $_POST['wd_navigation-font-weight-style-list'];
				}
			}
			copallyt_save_option ('wd_navigation-font-weight-style-list', sanitize_text_field ($wd_navigation_font_weight_list_content));
			copallyt_save_option ('wd_navigation-text-font-subsets', sanitize_text_field ($_POST['wd_navigation-text-font-subsets']));
			copallyt_save_option ('wd_navigation_text_lettre_spacing', sanitize_text_field ($_POST['wd_navigation_text_lettre_spacing']));


			copallyt_save_option ('wd_menu_style', sanitize_text_field ($_POST['wd_menu_style']));

			$socialmedia_name = '';
			if (isset($_POST['socialmedia_name'])) {
				$social_datas = $_REQUEST['socialmedia_name'];
				foreach ($social_datas as $socialdatanam) {
					$socialmedia_name .= $socialdatanam . ' ';
				}
			}
			copallyt_save_option ('socialmedia_name', sanitize_text_field ($socialmedia_name));

			$socialmedia_icon = '';
			if (isset($_POST['social_icon'])) {
				$social_datasicon = $_REQUEST['social_icon'];
				foreach ($social_datasicon as $socialdataicon) {
					$socialmedia_icon .= $socialdataicon . ' ';
				}
			}
			copallyt_save_option ('social_icon', sanitize_text_field ($socialmedia_icon));

		} ?>


		<?php if (!empty($_POST)): ?>
			<div id="message" class="updated fade">
				<p> <?php echo esc_html__ ('Configuration updated!!', 'copallyt'); ?> </p>
			</div>
		<?php endif; ?>


		<div class="panel-logo">
			<h2><?php echo esc_html__ ('Webdevia theme options', 'copallyt'); ?></h2>
		</div>
		<div class="wd-cpanel" style="display: none;">
			<form id="wd-Panel" method="POST" action="">
				<div id="tabs" class="ui-tabs-vertical ui-helper-clearfix">
					<ul>
						<li><a href="#tabs-0"><?php echo esc_html__ ('General Settings', 'copallyt'); ?></a></li>
						<li><a href="#tabs-1"><?php echo esc_html__ ('Top Header Settings', 'copallyt'); ?></a></li>
						<li><a href="#tabs-colors"><?php echo esc_html__ ('Colors Settings', 'copallyt'); ?></a></li>
						<li><a href="#tabs-2"><?php echo esc_html__ ('Fonts Settings', 'copallyt'); ?></a></li>
						<li><a href="#tabs-3"><?php echo esc_html__ ('Page 404 Settings', 'copallyt'); ?></a></li>
						<li><a href="#tabs-4"><?php echo esc_html__ ('Footer settings', 'copallyt'); ?></a></li>
					</ul>
					<div id="tabs-0">
						<table class="form-table">
							<tbody>
							<tr>
								<td><strong><?php echo esc_html__ ('Boxed Layout:', 'copallyt'); ?></strong></td>
								<td><input type="checkbox" <?php if (copallyt_get_option ('wd_box_wrapper', 'of') != 'of')
										print 'checked'; ?> name="wd_box_wrapper" value="on" id="wd_box_wrapper" class="cmn-toggle cmn-toggle-round"/>
									<label for="wd_box_wrapper"></label></td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__ ('Menu style:', 'copallyt'); ?></strong></td>
								<td>
									<?php $copallyt_menu_style = copallyt_get_option ('wd_menu_style'); ?>
									<select name="wd_menu_style">
										<option value="corporate" <?php if ($copallyt_menu_style == "corporate")
											echo "selected"; ?>><?php echo esc_html__ ('Corporate', 'copallyt'); ?></option>
										<option value="creative" <?php if ($copallyt_menu_style == "creative")
											echo "selected"; ?>><?php echo esc_html__ ('Creative', 'copallyt'); ?></option>
									</select>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__ ('Default Title Bar background image', 'copallyt'); ?></strong></td>
								<td>
									<input type="text" name="settings[_copallyt_title_bg_image]" id="copallyt_title_bg_filed" value="<?php echo esc_attr (copallyt_get_option ('copallyt_title_bg_image')) ?>" class="copallyt_title_input bg_input_field" data-bgimage="copallyt_title"/>
									<input class="button" name="_unique_title_bg_button" id="copallyt_title_bg_btn" value="<?php echo esc_attr ('Upload', 'copallyt'); ?>"/>
									<input type="button" value="<?php echo esc_attr ('Delete', 'copallyt'); ?>" class="button bg_delete_button " data-bgimage="copallyt_title"/></br>
								</td>
								<td>
									<?php $copallyt_title_bg_image = copallyt_get_option ('copallyt_title_bg_image'); ?>
									<img src="<?php print esc_url($copallyt_title_bg_image); ?>" style="max-height: 70px;" class="copallyt_title_image"/>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__ ('Background image:', 'copallyt'); ?></strong></td>
								<td>
									<input type="text" name="settings[_wd_bg_home_page]" id="wd_home_page_filed" value="<?php echo esc_attr (copallyt_get_option ('wd_home_page')) ?>" class="copallyt_home_input bg_input_field" data-bgimage="copallyt_home"/>
									<input class="button" name="bg_home_page" id="wd_bg_home_page" value="<?php echo esc_attr ('Upload', 'copallyt'); ?>"/>
									<input type="button" value="<?php echo esc_attr ('Delete', 'copallyt'); ?>" class="button bg_delete_button" data-bgimage="copallyt_home"/>
								</td>
								<td>
									<?php $copallyt_title_bg_image = copallyt_get_option ('wd_home_page'); ?>
									<img src="<?php print esc_url($copallyt_title_bg_image); ?>" style="max-height: 70px;" class="copallyt_home_image"/>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__ ('Show Website Title', 'copallyt'); ?></strong>
								</td>
								<td>
									<input type="checkbox" <?php if (copallyt_get_option ('wd_show_title') != 'of')
										print 'checked'; ?> name="wd_show_title" value="on" id="wd_show_title" class="cmn-toggle cmn-toggle-round"/>
									<label for="wd_show_title"></label>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__ ('Show the menu in the grid', 'copallyt'); ?></strong>
								</td>
								<td>
									<input type="checkbox" <?php if (copallyt_get_option ('wd_menu_in_grid') != 'off')
										print 'checked'; ?> name="wd_menu_in_grid" value="on" id="wd_menu_in_grid" class="cmn-toggle cmn-toggle-round"/>
									<label for="wd_menu_in_grid"></label>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__ ('Stick the menu to Top', 'copallyt'); ?></strong>
								</td>
								<td>
									<input type="checkbox" <?php if (copallyt_get_option ('wd_menu_sticky','of') != 'of')
										print 'checked'; ?> name="wd_menu_sticky" value="on" id="wd_menu_sticky" class="cmn-toggle cmn-toggle-round"/>
									<label for="wd_menu_sticky"></label>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__ ('Show The Logo', 'copallyt'); ?></strong></td>
								<td>
									<label>
										<input type="checkbox" <?php if (copallyt_get_option ('wd_show_logo') == 'on')
											print 'checked'; ?> name="wd_show_logo" value="on" id="wd_show_logo" class="chekbox_logo cmn-toggle cmn-toggle-round"/>
										<label for="wd_show_logo"></label></td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__ ('Show the cart on header', 'copallyt'); ?></strong></td>
								<td>
									<label>
										<input type="checkbox" <?php if (copallyt_get_option ('wd_show_cart') == 'on')
											print 'checked'; ?> name="wd_show_cart" value="on" id="wd_show_cart" class="chekbox_cart cmn-toggle cmn-toggle-round"/>
										<label for="wd_show_cart"></label></td>
							</tr>
							<tr class="path_logo" <?php if (copallyt_get_option ('wd_show_logo', 'on') != "on") : ?> style="display: none" <?php endif ?>>
								<td><strong><?php echo esc_html__ ('Logo link', 'copallyt'); ?></strong></td>
								<td>
									<?php $copallyt_logo = copallyt_get_option ('wd_logo'); ?>
									<input type="text" name="settings[_wd_logo]" id="wd_logo_filed" value="<?php echo esc_url ($copallyt_logo) ?>" class="copallyt_logo_input bg_input_field" data-bgimage="copallyt_logo"/>
									<input class="button" name="_unique_name_button" id="wd_upload_btn" value="<?php echo esc_attr ('Upload', 'copallyt'); ?>"/>
									<input type="button" value="<?php echo esc_attr ('Delete', 'copallyt'); ?>" class="button bg_delete_button" data-bgimage="copallyt_logo"/></br>
								</td>
								<td>
									<?php $copallyt_logo = copallyt_get_option ('wd_logo'); ?>
									<img src="<?php print esc_url ($copallyt_logo); ?>" style="max-height: 70px;" class="copallyt_logo_image"/>
								</td>
							</tr>
							<tr class="">
								<td><strong><?php echo esc_html__ ('Google Key Map', 'copallyt'); ?></strong></td>
								<td>
									<input type="text" class="log_input" name="shred_map_key" value="<?php echo esc_attr (copallyt_get_option ("shred_map_key", "")) ?>"/>
								</td>
							</tr>
							<!--favicon-->
							<?php if (!function_exists ('has_site_icon')) { ?>
								<tr>
									<td><strong><?php echo esc_html__ ('Favicon link', 'copallyt'); ?></strong></td>
									<td>
										<input type="text" name="settings[_wd_favicon]" id="wd_favicon_filed" class="copallyt_favicon_input bg_input_field" data-bgimage="copallyt_favicon"/>
										<input class="button" name="_unique_name_favicon" id="wd_upload_favicon" value="<?php echo esc_attr ('Upload', 'copallyt'); ?>"/>
										<input type="button" value="<?php echo esc_attr ('Delete', 'copallyt'); ?>" class="button bg_delete_button" data-bgimage="copallyt_favicon"/></br>
									</td>
									<td> <?php $copallyt_favicon = copallyt_get_option ('wd_favicon'); ?>
										<img src="<?php print esc_url($copallyt_favicon); ?>" style="max-height: 30px;" class="copallyt_favicon_image"/>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
					<div id="tabs-colors">
						<table class="form-table">
							<tbody>
							<tr>
								<td><strong><?php echo esc_html__ ('Background Color:', 'copallyt'); ?></strong></td>
								<td><?php $wrapper_bg_color = copallyt_get_option ('wrapper_bg_color'); ?>
									<input name="wrapper_bg_color" type="text" value="<?php print esc_attr ($wrapper_bg_color); ?>" class="wd-color-picker" data-default-color="#C0392B" data-picker="wrapper_bg_color_show">
									<div style="width:27px; height:27px; background-color:<?php echo esc_attr ($wrapper_bg_color); ?>; display:inline-block; vertical-align: bottom;" id="wrapper_bg_color_show"></div>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__ ('Primary Color:', 'copallyt'); ?></strong></td>
								<td><?php $primary_color = copallyt_get_option ('primary_color'); ?>
									<input name="primary_color" type="text" value="<?php print esc_attr ($primary_color); ?>" class="wd-color-picker" data-default-color="#106EAA" data-picker="primary_color_show">
									<div style="width:27px; height:27px; background-color:<?php echo esc_attr ($primary_color); ?>; display:inline-block; vertical-align: bottom;" id="primary_color_show"></div>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__ ('Secondary color:', 'copallyt'); ?></strong></td>
								<td><?php $secondary_color = copallyt_get_option ('secondary_color'); ?>
									<input name="secondary_color" type="text" value="<?php print esc_attr ($secondary_color); ?>" class="wd-color-picker" data-default-color="#C0392B" data-picker="secondary_color_show">
									<div style="width:27px; height:27px; background-color:<?php echo esc_attr ($secondary_color); ?>; display:inline-block; vertical-align: bottom;" id="secondary_color_show"></div>
								</td>
							</tr>

							<tr>
								<td><strong><?php echo esc_html__ ('Address Bar Background color:', 'copallyt'); ?></strong></td>
								<td><?php $adress_bar_bgcolor = copallyt_get_option ('adress_bar_bgcolor'); ?>
									<input name="adress_bar_bgcolor" type="text" value="<?php print esc_attr ($adress_bar_bgcolor); ?>" class="wd-color-picker" data-default-color="#C0392B" data-picker="adress_bar_bgcolor_show">
									<div style="width:27px; height:27px; background-color:<?php echo esc_attr ($adress_bar_bgcolor); ?>; display:inline-block; vertical-align: bottom;" id="adress_bar_bgcolor_show"></div>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__ ('Address Bar color:', 'copallyt'); ?></strong></td>
								<td><?php $adress_bar_color = copallyt_get_option ('adress_bar_color'); ?>
									<input name="adress_bar_color" type="text" value="<?php print esc_attr ($adress_bar_color); ?>" class="wd-color-picker" data-default-color="#C0392B" data-picker="adress_bar_color_show">
									<div style="width:27px; height:27px; background-color:<?php echo esc_attr ($adress_bar_color); ?>; display:inline-block; vertical-align: bottom;" id="adress_bar_color_show"></div>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__ ('Container background color :', 'copallyt'); ?></strong></td>
								<td><?php $container_bg = copallyt_get_option ('container_bg'); ?>
									<input name="container_bg" type="text" value="<?php print esc_attr ($container_bg); ?>" class="wd-color-picker" data-default-color="#C0392B" data-picker="container_bg_show">
									<div style="width:27px; height:27px; background-color:<?php echo esc_attr ($container_bg); ?>; display:inline-block; vertical-align: bottom;" id="container_bg_show"></div>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__ ('Header background color :', 'copallyt'); ?></strong></td>
								<td><?php $header_bg = copallyt_get_option ('header_bg', '#fff'); ?>
									<input name="header_bg" type="text" value="<?php print esc_attr ($header_bg); ?>" class="wd-color-picker" data-default-color="#C0392B" data-picker="header_bg_show">
									<div style="width:27px; height:27px; background-color:<?php echo esc_attr ($header_bg); ?>; display:inline-block; vertical-align: bottom;" id="header_bg_show"></div>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__ ('Navigation Text Color', 'copallyt'); ?></strong>
								</td>
								<td><?php $navigation_text_color = copallyt_get_option ('navigation_text_color'); ?>
									<input name="navigation_text_color" type="text" value="<?php print esc_attr ($navigation_text_color); ?>" class="wd-color-picker" data-default-color="#ffffff" data-picker="navigation_text_color_show">
									<div style="width:27px; height:27px; background-color:<?php echo esc_attr ($navigation_text_color); ?>; display:inline-block; vertical-align: bottom;" id="navigation_text_color_show"></div>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__ ('Navigation (sticky) background color', 'copallyt'); ?></strong>
								</td>
								<td><?php $navigation_bg_color_sticky = copallyt_get_option ('navigation_bg_color_sticky'); ?>
									<input name="navigation_bg_color_sticky" type="text" value="<?php print esc_attr ($navigation_bg_color_sticky); ?>" class="wd-color-picker" data-default-color="#C0392B" data-picker="navigation_bg_color_sticky_show">
									<div style="width:27px; height:27px; background-color:<?php echo esc_attr ($navigation_bg_color_sticky); ?>; display:inline-block; vertical-align: bottom;" id="navigation_bg_color_sticky_show"></div>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__ ('Footer background color', 'copallyt'); ?></strong>
								</td>
								<td><?php $footer_bg_color = copallyt_get_option ('footer_bg_color'); ?>
									<input name="footer_bg_color" type="text" value="<?php print esc_attr ($footer_bg_color); ?>" class="wd-color-picker" data-default-color="#C0392B" data-picker="footer_bg_color_show">
									<div style="width:27px; height:27px; background-color:<?php echo esc_attr ($footer_bg_color); ?>; display:inline-block; vertical-align: bottom;" id="footer_bg_color_show"></div>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__ ('Footer text color', 'copallyt'); ?></strong>
								</td>
								<td><?php $footer_text_color = copallyt_get_option ('footer_text_color'); ?>
									<input name="footer_text_color" type="text" value="<?php print esc_attr ($footer_text_color); ?>" class="wd-color-picker" data-default-color="#C0392B" data-picker="footer_text_color_show">
									<div style="width:27px; height:27px; background-color:<?php echo esc_attr ($footer_text_color); ?>; display:inline-block; vertical-align: bottom;" id="footer_text_color_show"></div>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__ ('Copyright background color :', 'copallyt'); ?></strong></td>
								<td><?php $copyright_bg = copallyt_get_option ('copyright_bg'); ?>
									<input name="copyright_bg" type="text" value="<?php print esc_attr ($copyright_bg); ?>" class="wd-color-picker" data-default-color="#C0392B" data-picker="copyright_bg_show">
									<div style="width:27px; height:27px; background-color:<?php echo esc_attr ($copyright_bg); ?>; display:inline-block; vertical-align: bottom;" id="copyright_bg_show"></div>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__ ('Copyright bar text color', 'copallyt'); ?></strong>
								</td>
								<td><?php $copyright_text_color = copallyt_get_option ('copyright_text_color'); ?>
									<input name="copyright_text_color" type="text" value="<?php print esc_attr ($copyright_text_color); ?>" class="wd-color-picker" data-default-color="#C0392B" data-picker="copyright_text_color_show">
									<div style="width:27px; height:27px; background-color:<?php echo esc_attr ($copyright_text_color); ?>; display:inline-block; vertical-align: bottom;" id="copyright_text_color_show"></div>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
					<div id="tabs-1">
						<table class="form-table">
							<tbody>
							<tr>
								<td>
									<strong><?php echo esc_html__ ('Call to Action Button', 'copallyt'); ?></strong>
								</td>
								<td>
									<input type="text" rows="10" cols="70" name="wd_call_to_action" placeholder="<?php echo esc_attr__('Call to action butoon', 'copallyt') ?>" value="<?php echo esc_attr (copallyt_get_option ('wd_call_to_action')); ?>">
									<input type="text" rows="10" cols="70" name="wd_call_to_action_button_link" placeholder="<?php echo esc_attr__('Link Button', 'copallyt') ?>" value="<?php echo esc_attr (copallyt_get_option ('wd_call_to_action_button_link')); ?>">
								</td>
							</tr>
							<tr>
								<td><strong><?php echo esc_html__ ('Show Top bare', 'copallyt'); ?></strong></td>
								<td>
									<input type="checkbox" <?php if (copallyt_get_option ('wd_show_top_social_bare') == 'on')
										print 'checked'; ?> name="wd_show_top_social_bare" value="on" id="wd_show_top_social_bare" class="checkbox_social cmn-toggle cmn-toggle-round"/>
									<label for="wd_show_top_social_bare"></label></td>
							</tr>
							<tr
								class="social_link" <?php if (copallyt_get_option ('wd_show_top_social_bare') != "on") : ?> style="display: none" <?php endif ?>>
								<td><strong><?php echo esc_html__ ('Social bar color:', 'copallyt'); ?></strong></td>
								<td><?php $social_bar_color = copallyt_get_option ('social_bar_color'); ?>
									<input name="social_bar_color" type="text" value="<?php print esc_attr ($social_bar_color); ?>" class="wd-color-picker" data-default-color="#C0392B" data-picker="social_bar_bgcolor_show">
									<div style="width:27px; height:27px; background-color:<?php echo esc_attr ($social_bar_color); ?>; display:inline-block; vertical-align: bottom;" id="social_bar_bgcolor_show"></div>
								</td>
							</tr>
							<tr class="social_link" <?php if (copallyt_get_option ('wd_show_top_social_bare') != "on") : ?> style="display: none" <?php endif ?>>
								<td>
									<strong><?php echo esc_html__ ('Put HTML code here', 'copallyt'); ?></strong></td>
								<td>
									<textarea placeholder="<?php echo esc_attr__('Language Area HTML', 'copallyt') ?>" name="language_area_html" cols="70" rows="10"> <?php echo html_entity_decode (copallyt_get_option ('language_area_html')); ?> </textarea>
								</td>
							</tr>
							<?php if (do_action ('icl_language_selector')) { ?>
								<tr class="social_link" <?php if (copallyt_get_option ('wd_show_top_social_bare') != "on") : ?> style="display: none" <?php endif ?>>
									<td><strong><?php echo esc_html__ ('Show WPML Widget', 'copallyt'); ?></strong></td>
									<td>
										<input type="checkbox" <?php if (copallyt_get_option ('copallyt_show_wpml_widget', 'on') == 'on')
											print 'checked'; ?> name="copallyt_show_wpml_widget" value="on" id="copallyt_show_wpml_widget" class="cmn-toggle cmn-toggle-round"/>
										<label for="copallyt_show_wpml_widget"></label>
									</td>
								</tr>
							<?php }
							?>
							<tr class="social_link" <?php if (copallyt_get_option ('wd_show_top_social_bare') != "on") : ?> style="display: none" <?php endif ?>>
								<td>
									<strong><?php echo esc_html__ ('Social Media', 'copallyt'); ?></strong>
								</td>
								<td>
									<div class="socialmedia_wrapper">
										<?php
										$socialmedia_arry = explode (' ', copallyt_get_option ('socialmedia_name'));
										$socialmediaicon_arry = explode (' ', copallyt_get_option ('social_icon'));
										if (!empty($socialmedia_arry[0])) {
											?>
											<p class="social_label"><?php echo esc_html__ ('Media Icon', 'copallyt'); ?></p>
											<p class="social_label"><?php echo esc_html__ ('Media Link', 'copallyt'); ?></p>
											<?php
											$i = 1;
											foreach ($socialmedia_arry as $social_data) {
												$i++;
												?>
												<div class="social_media">
													<select name="social_icon[icon<?php echo esc_attr ($i) ?>]">
														<option value="-1" disabled><?php echo esc_html__ ('Select social media icon', 'copallyt'); ?></option>
														<option value="fa-facebook" <?php if ($socialmediaicon_arry[$i - 2] == 'fa-facebook') {
															echo "selected='selected'";
														} ?> >&#xf09a; facebook
														</option>
														<option value="fa-flickr" <?php if ($socialmediaicon_arry[$i - 2] == 'fa-flickr') {
															echo "selected='selected'";
														} ?> >&#xf16e; flickr
														</option>
														<option value="fa-google-plus" <?php if ($socialmediaicon_arry[$i - 2] == 'fa-google-plus') {
															echo "selected='selected'";
														} ?> >&#xf0d5; google-plus
														</option>
														<option value="fa-instagram" <?php if ($socialmediaicon_arry[$i - 2] == 'fa-instagram') {
															echo "selected='selected'";
														} ?>>&#xf16d; instagram
														</option>
														<option value="fa-linkedin" <?php if ($socialmediaicon_arry[$i - 2] == 'fa-linkedin') {
															echo "selected='selected'";
														} ?>>&#xf0e1; linkedin
														</option>
														<option value="fa-twitter" <?php if ($socialmediaicon_arry[$i - 2] == 'fa-twitter') {
															echo "selected='selected'";
														} ?>>&#xf099; twitter
														</option>
														<option value="fa-vimeo" <?php if ($socialmediaicon_arry[$i - 2] == 'fa-vimeo') {
															echo "selected='selected'";
														} ?>>&#xf27d; vimeo
														</option>
														<option value="fa-whatsapp" <?php if ($socialmediaicon_arry[$i - 2] == 'fa-whatsapp') {
															echo "selected='selected'";
														} ?>>&#xf232; whatsapp
														</option>
														<option value="fa-youtube" <?php if ($socialmediaicon_arry[$i - 2] == 'fa-youtube') {
															echo "selected='selected'";
														} ?>>&#xf167; youtube
														</option>
													</select>
													<input type="text" name="socialmedia_name[media<?php echo esc_attr ($i) ?>]" data-number="<?php echo esc_attr ($i) ?>" placeholder="<?php echo esc_attr__('Your social media link','copallyt'); ?>" value="<?php echo esc_attr ($social_data) ?>"/>
													<a href="javascript:void(0);" class="remove_button" title="<?php echo esc_attr__('Remove field', 'copallyt'); ?>">
														<button type="button" class="button bg_delete_button"> <?php echo esc_html__ ('delete', 'copallyt') ?></button>
													</a>
												</div>
												<?php
											}
										}
										?>
										<div>
											<a href="javascript:void(0);" class="add_button" title="<?php echo esc_attr__('Add field', 'copallyt'); ?>">
												<button type="button" class="button"><?php echo esc_html__ ('Add Social Media', 'copallyt'); ?></button>
											</a>
										</div>
									</div>
								</td>
							</tr>

							<tr
								class="social_link" <?php if (copallyt_get_option ('wd_show_top_social_bare') != "on") : ?> style="display: none" <?php endif ?>>
								<td>
									<strong><?php echo esc_html__ ('Phone', 'copallyt'); ?></strong></td>
								<td>
									<input type="text" class="log_input" name="phone" placeholder="<?php echo esc_attr__('Your Phone number', 'copallyt') ?>" value="<?php echo esc_attr (copallyt_get_option ('phone')); ?>">
								</td>
							</tr>
							<tr
								class="social_link" <?php if (copallyt_get_option ('wd_show_top_social_bare') != "on") : ?> style="display: none" <?php endif ?>>
								<td>
									<strong><?php echo esc_html__ ('Address', 'copallyt'); ?></strong></td>
								<td>
									<input type="text" class="log_input" name="adress" placeholder="<?php echo esc_attr__ ('Your Address', 'copallyt') ?>" value="<?php echo esc_attr (copallyt_get_option ('adress')); ?>">
								</td>
							</tr>
							<tr
								class="social_link" <?php if (copallyt_get_option ('wd_show_top_social_bare', 'off') != "on") : ?> style="display: none" <?php endif ?>>
								<td>
									<strong><?php echo esc_html__ ('Times', 'copallyt'); ?></strong></td>
								<td>
									<input type="text" class="log_input" name="time" placeholder="<?php echo esc_attr__ ('Your time', 'copallyt') ?>" value="<?php echo html_entity_decode (copallyt_get_option ('time', '')); ?>">
								</td>
							</tr>

							</tbody>
						</table>
					</div>
					<div id="tabs-2">
						<table class="form-table">
							<tbody>
							<tr>
								<td>
									<strong><?php echo esc_html__ ('Main text font', 'copallyt'); ?></strong>
								</td>
								<td>
									<?php $copallyt_body_font_familly = copallyt_get_option ('wd_body_font_familly');
									$copallyt_fontArray = copallyt_google_fonts_array ();
									$selected_font = 'default';
									$selected_font_variants = $copallyt_fontArray[0]['variants'];
									$selected_font_subsets = $copallyt_fontArray[0]['subsets'];
									$selected_font_variants_weights = $copallyt_fontArray[0]['variants'][0]['weight'];
									$selected_style = $copallyt_fontArray[0]['variants'][0]['style'];
									$selected_weight = $copallyt_fontArray[0]['variants'][0]['weight'][0];
									?>
									<table>
										<tbody>
										<tr>
											<td>
												<label for="wd_body_font_familly"><?php echo esc_html__ ('Font family', 'copallyt'); ?> :<br>
												</label>
											</td>
											<td>
												<select name="wd_body_font_familly" id="wd_body_font_familly" class="font_familly main_fonts" data-classes="main_fonts">
													<option value="Ubuntu"><?php echo esc_html__ ('Ubuntu', 'copallyt'); ?></option>
													<?php foreach ($copallyt_fontArray as $pititablo) {
														$font_name = $pititablo['name'];
														?>
														<option value="<?php echo esc_attr ($font_name); ?>" <?php if (copallyt_get_option ('wd_body_font_familly') == $font_name) {
															echo "selected='selected'";
															$selected_font = $font_name;
															$selected_font_variants = $pititablo['variants'];
															$selected_font_variants_weights = $pititablo['variants'][0]['weight'];
															$selected_font_subsets = $pititablo['subsets'];
														} ?> ><?php echo esc_attr ($font_name); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_body_font_style"><?php echo esc_html__ ('Font style', 'copallyt'); ?> :</label>
											</td>
											<td>
												<select name="wd_body_font_style" id="wd_body_font_style" class="font_style main_fonts" data-classes="main_fonts">
													<?php
													if ($selected_font != 'default') {
														foreach ($selected_font_variants as $pititablo) {
															$font_style = $pititablo['style'];
															?>
															<option value="<?php echo esc_attr ($font_style); ?>" <?php if (copallyt_get_option ('wd_body_font_style') == $font_style) {
																echo "selected='selected'";
																$selected_font_variants_weights = $pititablo['weight'];
															} ?> ><?php echo esc_attr ($font_style); ?></option>
														<?php }
													}
													else { ?>
														<option value="Default"><?php echo esc_html__ ('Default', 'copallyt'); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_body_font_weight"><?php echo esc_html__ ('Font weight', 'copallyt'); ?>
													:</label>
											</td>
											<td>
												<select name="wd_body_font_weight" id="wd_body_font_weight" class="font_weight main_fonts" data-classes="main_fonts">
													<?php
													if ($selected_font != 'default') {
														foreach ($selected_font_variants_weights as $pititablo) {
															$font_weight = $pititablo;
															?>
															<option value="<?php echo esc_attr ($font_weight); ?>" <?php if (copallyt_get_option ('wd_body_font_weight') == $font_weight)
																echo "selected='selected'"; ?> ><?php echo esc_attr (copallyt_font_weight_name ($font_weight)); ?></option>
														<?php }
													}
													else {
														for ($i = 100; $i < 1000; $i += 100) { ?>
															<option value="<?php echo esc_attr ($i); ?>"><?php echo copallyt_font_weight_name ($i); ?></option>
														<?php }
													} ?>

												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_body_font_weight_list"><?php echo esc_html__ ('Font weights to load', 'copallyt'); ?>
													:</label>
											</td>
											<td>
												<select name="wd_body_font_weight_list[]" class="font_weight_list main_fonts" data-classes="main_fonts" multiple style="height: 100%;">
													<?php
													$font_weight_list = explode (',', copallyt_get_option ('wd_body_font_weight_list'));
													if ($selected_font != 'default') {
														foreach ($selected_font_variants as $style) {
															$style_flag = ($style['style'] == 'italic') ? 'i' : '';
															$style_name = ($style['style'] == 'italic') ? ' Italic' : '';
															$weighters = $style['weight'];
															for ($i = 0; $i < count ($weighters); $i++) {
																$weights_touse = $weighters[$i] . $style_flag;
																$position = array_search ($weights_touse, $font_weight_list);
																?>
																<option value="<?php echo esc_attr ($weights_touse); ?>" <?php if ($position !== false)
																	echo "selected='selected'"; ?> ><?php echo esc_attr (copallyt_font_weight_name ($weighters[$i]) . ' ' . $style_name); ?></option>
																<?php
															}
															?>
														<?php }
													}
													else {
														for ($i = 100; $i < 1000; $i += 100) { ?>
															<option value="<?php echo esc_attr ($i); ?>"><?php echo copallyt_font_weight_name ($i); ?></option>
														<?php }
													} ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_body_font_size"><?php echo esc_html__ ('Font size', 'copallyt'); ?> :</label>
											</td>
											<td>
												<input type="text" class="wd_txt_big fonts_size main_fonts" name="wd_body_font_size" placeholder="<?php echo esc_attr__ ('example 12px', 'copallyt'); ?>" value="<?php if (null !== copallyt_get_option ('wd_body_font_size') && copallyt_get_option ('wd_body_font_size') != '') {
													echo esc_attr (copallyt_get_option ('wd_body_font_size'));
												}
												else {
													echo "12px";
												} ?>" data-classes="main_fonts">
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_main_text_lettre_spacing"><?php echo esc_html__ ('Lettre Spacing', 'copallyt'); ?>
													:</label>
											</td>
											<td>
												<?php
												$copallyt_main_text_lettre_spacing = copallyt_get_option ('wd_main_text_lettre_spacing');
												$copallyt_main_text_lettre_spacing = (!empty($copallyt_main_text_lettre_spacing)) ? copallyt_get_option ('wd_main_text_lettre_spacing') : ''; ?>
												<input type="text" class="wd_txt_big letter_spacing" name="wd_main_text_lettre_spacing" placeholder="<?php echo esc_attr__ ('example 1px', 'copallyt') ?>" value="<?php echo esc_attr ($copallyt_main_text_lettre_spacing); ?>" data-classes="main_fonts">
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_main-text-font-subsets"><?php echo esc_html__ ('Font subsets', 'copallyt'); ?>
													:</label>
											</td>
											<td>
												<select id="wd_main-text-font-subsets" name="wd_main-text-font-subsets" class="font_subsets main_fonts" data-classes="main_fonts"><?php
													if ($selected_font != 'default') {
														foreach ($selected_font_subsets as $pititablo) {
															$font_subset = $pititablo;
															?>
															<option value="<?php echo esc_attr ($font_subset); ?>" <?php if (copallyt_get_option ('wd_main-text-font-subsets') == $font_subset)
																echo "selected='selected'"; ?> ><?php echo esc_attr ($font_subset); ?></option>
														<?php }
													}
													else { ?>
														<option value="Default"><?php echo esc_html__ ('Default', 'copallyt'); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php echo esc_html__ ('Preview:', 'copallyt'); ?> :</label>
											</td>
											<td> <?php $font_family = (copallyt_get_option ('wd_body_font_familly') != "default") ? copallyt_get_option ('wd_body_font_familly') : 'Open Sans'; ?>
												<p class="preview_result  main_fonts" <?php echo 'style="font-family: ' . $font_family . '; font-weight: ' . copallyt_get_option ('wd_body_font_weight') . '; font-style: ' . copallyt_get_option ('wd_body_font_style') . '; letter-spacing: ' . copallyt_get_option ('wd_main_text_lettre_spacing') . ';';
												if (null !== copallyt_get_option ('wd_body_font_size') && copallyt_get_option ('wd_body_font_size') != '') {
													echo ';font-size: ' . copallyt_get_option ('wd_body_font_size') . ';';
												}
												else {
													echo 'font-size:12px';
												}
												echo '"'; ?>><?php echo esc_html__ ('Sphinx of black quartz, judge my vow', 'copallyt'); ?><br>
													<?php echo esc_html__ ('Sphinx of black quartz, judge my vow', 'copallyt'); ?>
													<br><?php echo esc_html__ ('Sphinx of black quartz, judge my vow', 'copallyt'); ?></p>
											</td>
										</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__ ('Head font family', 'copallyt'); ?></strong>
								</td>
								<td>
									<?php
									$selected_font = 'Default';
									$selected_font_variants = $copallyt_fontArray[0]['variants'];
									$selected_font_subsets = $copallyt_fontArray[0]['subsets'];
									$selected_font_variants_weights = $copallyt_fontArray[0]['variants'][0]['weight'];
									$selected_style = $copallyt_fontArray[0]['variants'][0]['style'];
									$selected_weight = $copallyt_fontArray[0]['variants'][0]['weight'][0];
									?>
									<table>
										<tbody>
										<tr>
											<td>
												<label for="wd_head_font_familly"><?php echo esc_html__ ('Font family', 'copallyt'); ?>:</label>
											</td>
											<td>
												<select name="wd_head_font_familly" id="wd_head_font_familly" class="font_familly heading_fonts" data-classes="heading_fonts">
													<option value="Ubuntu"><?php echo esc_html__ ('Ubuntu', 'copallyt'); ?></option>
													<?php foreach ($copallyt_fontArray as $pititablo) {
														$font_name = $pititablo['name'];
														?>
														<option value="<?php echo esc_attr ($font_name); ?>" <?php if (copallyt_get_option ('wd_head_font_familly') == $font_name) {
															echo "selected='selected'";
															$selected_font = $font_name;
															$selected_font_variants = $pititablo['variants'];
															$selected_font_variants_weights = $pititablo['variants'][0]['weight'];
															$selected_font_subsets = $pititablo['subsets'];
														} ?> ><?php echo esc_attr ($font_name); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_head_font_style"><?php echo esc_html__ ('Font style', 'copallyt'); ?> :</label>
											</td>
											<td>
												<select name="wd_head_font_style" id="wd_head_font_style" class="font_style heading_fonts" data-classes="heading_fonts">
													<?php
													if ($selected_font != 'default') {
														foreach ($selected_font_variants as $pititablo) {
															$font_style = $pititablo['style'];
															?>
															<option value="<?php echo esc_attr ($font_style); ?>" <?php if (copallyt_get_option ('wd_head_font_style') == $font_style) {
																echo "selected='selected'";
																$selected_font_variants_weights = $pititablo['weight'];
															} ?> ><?php echo esc_attr ($font_style); ?></option>
														<?php }
													}
													else { ?>
														<option value="Ubuntu"><?php echo esc_html__ ('Ubuntu', 'copallyt'); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_heading-font-weight-style"><?php echo esc_html__ ('Font weight', 'copallyt'); ?>
													:</label>
											</td>
											<td>
												<select name="wd_heading-font-weight-style" id="wd_heading-font-weight-style" class="font_weight heading_fonts" data-classes="heading_fonts">
													<?php
													if ($selected_font != 'default') {
														foreach ($selected_font_variants_weights as $pititablo) {
															$font_weight = $pititablo;
															?>
															<option value="<?php echo esc_attr ($font_weight); ?>" <?php if (copallyt_get_option ('wd_heading-font-weight-style') == $font_weight)
																echo "selected='selected'"; ?> ><?php echo esc_attr (copallyt_font_weight_name ($font_weight)); ?></option>
														<?php }
													}
													else {
														for ($i = 100; $i < 1000; $i += 100) { ?>
															<option value="<?php echo esc_attr ($i); ?>"><?php echo esc_attr (copallyt_font_weight_name ($i)); ?></option>
														<?php }
													} ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_heading-font-weight-style-list"><?php echo esc_html__ ('Font weights to load', 'copallyt'); ?>
													:</label>
											</td>
											<td>
												<select name="wd_heading-font-weight-style-list[]" class="font_weight_list main_fonts" data-classes="main_fonts" multiple style='height: 100%;'>
													<?php
													$font_weight_list = explode (',', copallyt_get_option ('wd_heading-font-weight-style-list'));
													if ($selected_font != 'default') {
														foreach ($selected_font_variants as $style) {
															$style_flag = ($style['style'] == 'italic') ? 'i' : '';
															$style_name = ($style['style'] == 'italic') ? ' Italic' : '';
															$weighters = $style['weight'];
															for ($i = 0; $i < count ($weighters); $i++) {
																$weights_touse = $weighters[$i] . $style_flag;
																$position = array_search ($weights_touse, $font_weight_list);
																?>
																<option value="<?php echo esc_attr ($weights_touse); ?>" <?php if ($position !== false)
																	echo "selected='selected'"; ?> ><?php echo esc_attr (copallyt_font_weight_name ($weighters[$i]) . ' ' . $style_name); ?></option>
																<?php
															}
															?>
														<?php }
													}
													else {
														for ($i = 100; $i < 1000; $i += 100) { ?>
															<option value="<?php echo esc_attr ($i); ?>"><?php echo esc_attr (copallyt_font_weight_name ($i)); ?></option>
														<?php }
													} ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_head_font_size"><?php echo esc_html__ ('Font size', 'copallyt'); ?> :</label>
											</td>
											<td>
												<input type="text" class="wd_txt_big fonts_size heading_fonts" name="wd_head_font_size" placeholder="<?php echo esc_attr__('example 12px', 'copallyt'); ?>" value="<?php if (null !== copallyt_get_option ('wd_head_font_size') && copallyt_get_option ('wd_head_font_size') != '') {
													echo esc_attr (copallyt_get_option ('wd_head_font_size'));
												}
												else {
													echo "12px";
												} ?>" data-classes="heading_fonts">
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_heading_text_lettre_spacing"><?php echo esc_html__ ('Lettre Spacing', 'copallyt'); ?>
													:</label>
											</td>
											<td>
												<?php
												$copallyt_heading_text_lettre_spacing = copallyt_get_option ('wd_heading_text_lettre_spacing');
												$copallyt_heading_text_lettre_spacing = (!empty($copallyt_heading_text_lettre_spacing)) ? copallyt_get_option ('wd_heading_text_lettre_spacing') : ''; ?>
												<input type="text" class="wd_txt_big letter_spacing" name="wd_heading_text_lettre_spacing" placeholder="<?php echo esc_attr__('example 1px', 'copallyt'); ?>" value="<?php echo esc_attr ($copallyt_heading_text_lettre_spacing); ?>" data-classes="heading_fonts">
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_heading-text-font-subsets"><?php echo esc_html__ ('Font subsets', 'copallyt'); ?>
													:</label>
											</td>
											<td>
												<select id="wd_heading-text-font-subsets" name="wd_heading-text-font-subsets" class="font_subsets heading_fonts" data-classes="heading_fonts"><?php
													if ($selected_font != 'default') {
														foreach ($selected_font_subsets as $pititablo) {
															$font_subset = $pititablo;
															?>
															<option value="<?php echo esc_attr ($font_subset); ?>" <?php if (copallyt_get_option ('wd_heading-text-font-subsets') == $font_subset)
																echo "selected='selected'"; ?> ><?php echo esc_attr ($font_subset); ?></option>
														<?php }
													}
													else { ?>
														<option value="default"><?php echo esc_html__ ('Default', 'copallyt'); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php echo esc_html__ ('Preview:', 'copallyt'); ?> :</label>
											</td>
											<td><?php $font_family = (copallyt_get_option ('wd_body_font_familly') != "default") ? copallyt_get_option ('wd_body_font_familly') : 'Open Sans'; ?>
												<p class="preview_result heading_fonts"
													<?php echo 'style="font-family: ' . $font_family . '; font-weight: ' . copallyt_get_option ('wd_heading-font-weight-style') . '; font-style: ' . copallyt_get_option ('wd_head_font_style') . '; letter-spacing: ' . copallyt_get_option ('wd_heading_text_lettre_spacing') . ';';
													if (null !== copallyt_get_option ('wd_head_font_size') && copallyt_get_option ('wd_head_font_size') != '') {
														echo ';font-size: ' . copallyt_get_option ('wd_head_font_size') . ';';
													}
													else {
														echo 'font-size:12px';
													} ?>;"><?php echo esc_html__ ('Sphinx of black quartz, judge my vow', 'copallyt'); ?><br>
												<?php echo esc_html__ ('Sphinx of black quartz, judge my vow', 'copallyt'); ?><br>
												<?php echo esc_html__ ('Sphinx of black quartz, judge my vow', 'copallyt'); ?><br></p>
											</td>
										</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__ ('Navigation font family', 'copallyt'); ?></strong>
								</td>
								<td>
									<?php
									$selected_font = 'default';
									$selected_font_variants = $copallyt_fontArray[0]['variants'];
									$selected_font_subsets = $copallyt_fontArray[0]['subsets'];
									$selected_font_variants_weights = $copallyt_fontArray[0]['variants'][0]['weight'];
									$selected_style = $copallyt_fontArray[0]['variants'][0]['style'];
									$selected_weight = $copallyt_fontArray[0]['variants'][0]['weight'][0];
									?>
									<table>
										<tbody>
										<tr>
											<td>
												<label for="wd_navigation_font_familly"><?php echo esc_html__ ('Font family', 'copallyt'); ?>
													:</label>
											</td>
											<td>
												<select name="wd_navigation_font_familly" id="wd_navigation_font_familly" class="font_familly navigation_fonts" data-classes="navigation_fonts">
													<option value="Poppins"><?php echo esc_html__ ('Poppins', 'copallyt'); ?></option>
													<?php foreach ($copallyt_fontArray as $pititablo) {
														$font_name = $pititablo['name'];
														?>
														<option value="<?php echo esc_attr ($font_name); ?>" <?php if (copallyt_get_option ('wd_navigation_font_familly') == $font_name) {
															echo "selected='selected'";
															$selected_font = $font_name;
															$selected_font_variants = $pititablo['variants'];
															$selected_font_variants_weights = $pititablo['variants'][0]['weight'];
															$selected_font_subsets = $pititablo['subsets'];
														} ?> ><?php echo esc_attr ($font_name); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_navigation_font_style"><?php echo esc_html__ ('Font style', 'copallyt'); ?>
													:</label>
											</td>
											<td>
												<select name="wd_navigation_font_style" id="wd_head_font_style" class="font_style navigation_fonts" data-classes="navigation_fonts">
													<?php
													if ($selected_font != 'default') {
														foreach ($selected_font_variants as $pititablo) {
															$font_style = $pititablo['style'];
															?>
															<option value="<?php echo esc_attr ($font_style); ?>" <?php if (copallyt_get_option ('wd_navigation_font_style') == $font_style) {
																echo "selected='selected'";
																$selected_font_variants_weights = $pititablo['weight'];
															} ?> ><?php echo esc_attr ($font_style); ?></option>
														<?php }
													}
													else { ?>
														<option value="default"><?php echo esc_html__ ('Default', 'copallyt'); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label
													for="wd_navigation-font-weight-style"><?php echo esc_html__ ('Font weight', 'copallyt'); ?>
													:</label>
											</td>
											<td>
												<select name="wd_navigation-font-weight-style" id="wd_navigation-font-weight-style" class="font_weight navigation_fonts" data-classes="navigation_fonts">
													<?php
													if ($selected_font != 'default') {
														foreach ($selected_font_variants_weights as $pititablo) {
															$font_weight = $pititablo;
															?>
															<option value="<?php echo esc_attr ($font_weight); ?>" <?php if (copallyt_get_option ('wd_navigation-font-weight-style') == $font_weight)
																echo "selected='selected'"; ?> ><?php echo esc_attr (copallyt_font_weight_name ($font_weight)); ?></option>
														<?php }
													}
													else {
														for ($i = 100; $i < 1000; $i += 100) { ?>
															<option value="<?php echo esc_attr ($i); ?>"><?php echo esc_attr (copallyt_font_weight_name ($i)); ?></option>
														<?php }
													} ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_navigation-font-weight-style-list"><?php echo esc_html__ ('Font weights to load', 'copallyt'); ?>
													:</label>
											</td>
											<td>
												<select name="wd_navigation-font-weight-style-list[]" class="font_weight_list main_fonts" data-classes="main_fonts" multiple style='height: 100%;'>
													<?php
													$font_weight_list = explode (',', copallyt_get_option ('wd_navigation-font-weight-style-list'));
													if ($selected_font != 'default') {
														foreach ($selected_font_variants as $style) {
															$style_flag = ($style['style'] == 'italic') ? 'i' : '';
															$style_name = ($style['style'] == 'italic') ? ' Italic' : '';
															$weighters = $style['weight'];
															for ($i = 0; $i < count ($weighters); $i++) {
																$weights_touse = $weighters[$i] . $style_flag;
																$position = array_search ($weights_touse, $font_weight_list);
																?>
																<option value="<?php echo esc_attr ($weights_touse); ?>" <?php if ($position !== false)
																	echo "selected='selected'"; ?> ><?php echo esc_attr (copallyt_font_weight_name ($weighters[$i]) . ' ' . $style_name); ?></option>
																<?php
															}
															?>
														<?php }
													}
													else {
														for ($i = 100; $i < 1000; $i += 100) { ?>
															<option value="<?php echo esc_attr ($i); ?>"><?php echo esc_attr (copallyt_font_weight_name ($i)); ?></option>
														<?php }
													} ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_navigation_font_size"><?php echo esc_html__ ('Font size', 'copallyt'); ?>
													:</label>
											</td>
											<td>
												<input type="text" class="wd_txt_big fonts_size navigation_fonts" name="wd_navigation_font_size" placeholder="<?php echo esc_attr__('example 12px', 'copallyt'); ?>" value="<?php if (null !== copallyt_get_option ('wd_navigation_font_size') && copallyt_get_option ('wd_navigation_font_size') != '') {
													echo esc_attr (copallyt_get_option ('wd_navigation_font_size'));
												}
												else {
													echo "12px";
												} ?>" data-classes="navigation_fonts">
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_navigation_text_lettre_spacing"><?php echo esc_html__ ('Lettre Spacing', 'copallyt'); ?>
													:</label>
											</td>
											<td>
												<?php
												$copallyt_navigation_text_lettre_spacing = copallyt_get_option ('wd_navigation_text_lettre_spacing');
												$copallyt_navigation_text_lettre_spacing = (!empty($copallyt_navigation_text_lettre_spacing)) ? copallyt_get_option ('wd_navigation_text_lettre_spacing') : ''; ?>
												<input type="text" class="wd_txt_big letter_spacing" name="wd_navigation_text_lettre_spacing" placeholder="<?php echo esc_attr__('example 1px', 'copallyt'); ?>" value="<?php echo esc_attr ($copallyt_navigation_text_lettre_spacing); ?>" data-classes="navigation_fonts">
											</td>
										</tr>
										<tr>
											<td>
												<label for="wd_navigation-text-font-subsets"><?php echo esc_html__ ('Font subsets', 'copallyt'); ?>
													:</label>
											</td>
											<td>
												<select id="wd_navigation-text-font-subsets" name="wd_navigation-text-font-subsets" class="font_subsets navigation_fonts" data-classes="navigation_fonts"><?php
													if ($selected_font != 'default') {
														foreach ($selected_font_subsets as $pititablo) {
															$font_subset = $pititablo;
															?>
															<option value="<?php echo esc_attr ($font_subset); ?>" <?php if (copallyt_get_option ('wd_navigation-text-font-subsets') == $font_subset)
																echo "selected='selected'"; ?> ><?php echo esc_attr ($font_subset); ?></option>
														<?php }
													}
													else { ?>
														<option value="default"><?php echo esc_html__ ('Default', 'copallyt'); ?></option>
													<?php } ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												<label><?php echo esc_html__ ('Preview:', 'copallyt'); ?> :</label>
											</td>
											<td><?php $font_family = (copallyt_get_option ('wd_body_font_familly') != "default") ? copallyt_get_option ('wd_body_font_familly') : 'Open Sans'; ?>
												<p class="preview_result navigation_fonts"
													<?php echo 'style="font-family: ' . $font_family . '; font-weight: ' . copallyt_get_option ('wd_navigation-font-weight-style') . '; font-style: ' . copallyt_get_option ('wd_navigation_font_style') . '; letter-spacing: ' . copallyt_get_option ('wd_navigation_text_lettre_spacing') . ';';
													if (null !== copallyt_get_option ('wd_navigation_font_size') && copallyt_get_option ('wd_navigation_font_size') != '') {
														echo ';font-size: ' . copallyt_get_option ('wd_navigation_font_size') . ';';
													}
													else {
														echo 'font-size:12px';
													} ?>;"><?php echo esc_html__ ('Sphinx of black quartz, judge my vow', 'copallyt'); ?><br>
												<?php echo esc_html__ ('Sphinx of black quartz, judge my vow', 'copallyt'); ?><br>
												<?php echo esc_html__ ('Sphinx of black quartz, judge my vow', 'copallyt'); ?><br></p>
											</td>
										</tr>
										</tbody>
									</table>
								</td>
							</tr>

							</tbody>
						</table>
					</div>
					<div id="tabs-3">
						<table class="form-table">
							<tbody>
							<tr>
								<td>
									<strong><?php echo esc_html__ ('Background image', 'copallyt'); ?></strong></h3>
								</td>
								<td>
									<input type="text" name="settings[_wd_bg_404_page]" id="wd_404_page_filed" value="<?php echo esc_attr (copallyt_get_option ('wd_bg_404_page')) ?>" class="copallyt_404_input bg_input_field" data-bgimage="copallyt_404"/>
									<input class="button" name="bg_404_page" id="wd_bg_404_page" value="Upload"/>
									<input type="button" value="<?php echo esc_attr ('Delete', 'copallyt'); ?>" class="button bg_delete_button" data-bgimage="copallyt_404"/></br>
								</td>
								<td>
									<?php
									$copallyt_title_bg_image = copallyt_get_option ('wd_bg_404_page');
									?>
									<img src="<?php print esc_url($copallyt_title_bg_image); ?>" style="max-height: 70px;" class="copallyt_404_image"/>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
					<div id="tabs-4">
						<table class="form-table">
							<tbody>
							<tr>
								<td><strong><?php echo esc_html__ ('Footer columns', 'copallyt'); ?></strong></td>
								<td class="admiral_footer_columns">
									<?php $logo_position = copallyt_get_option ('wd_footer_columns', 'three_columns') ?>
									<input id="copallyt_footer1" type="radio" name="wd_footer_columns" value="one_columns" <?php if ($logo_position == 'one_columns') {
										echo 'checked';
									} ?> />
									<label for="copallyt_footer1" class="admiral_footer1 <?php if ($logo_position == 'one_columns') {
										echo 'label_selected ';
									} ?>"></label>
									<input id="copallyt_footer2" type="radio" name="wd_footer_columns" value="tow_a_columns" <?php if ($logo_position == 'tow_a_columns') {
										echo 'checked';
									} ?> />
									<label for="copallyt_footer2" class="admiral_footer2 <?php if ($logo_position == 'tow_a_columns') {
										echo 'label_selected ';
									} ?>"></label>
									<input id="copallyt_footer3" type="radio" name="wd_footer_columns" value="tow_b_columns" <?php if ($logo_position == 'tow_b_columns') {
										echo 'checked';
									} ?> />
									<label for="copallyt_footer3" class="admiral_footer3 <?php if ($logo_position == 'tow_b_columns') {
										echo 'label_selected ';
									} ?>"></label>
									<input id="copallyt_footer4" type="radio" name="wd_footer_columns" value="tow_c_columns" <?php if ($logo_position == 'tow_c_columns') {
										echo 'checked';
									} ?> />
									<label for="copallyt_footer4" class="admiral_footer4 <?php if ($logo_position == 'tow_c_columns') {
										echo 'label_selected ';
									} ?>"></label>
									<input id="copallyt_footer5" type="radio" name="wd_footer_columns" value="three_columns" <?php if ($logo_position == 'three_columns') {
										echo 'checked';
									} ?> />
									<label for="copallyt_footer5" class="admiral_footer5 <?php if ($logo_position == 'three_columns') {
										echo 'label_selected ';
									} ?>"></label>
									<input id="copallyt_footer6" type="radio" name="wd_footer_columns" value="four_columns" <?php if ($logo_position == 'four_columns') {
										echo 'checked';
									} ?> />
									<label for="copallyt_footer6" class="admiral_footer6 <?php if ($logo_position == 'four_columns') {
										echo 'label_selected ';
									} ?>"></label>
								</td>

							</tr>
							<tr>
								<td><strong><?php echo esc_html__ ('Footer background image', 'copallyt'); ?></strong></td>
								<td>
									<input type="text" name="settings[_wd_footer_bg_image]" id="wd_footer_bg_filed" value="<?php echo esc_attr (copallyt_get_option ('wd_footer_bg_image')); ?>" class="copallyt_footer_input bg_input_field" data-bgimage="copallyt_footer"/>
									<input class="button" name="_unique_footer_bg_button" id="wd_footer_bg_btn" value="Upload"/>
									<input type="button" value="Delete" class="button bg_delete_button" data-bgimage="copallyt_footer"/></br>
								</td>
								<td>
									<?php $copallyt_footer_bg_image = copallyt_get_option ('wd_footer_bg_image');
									?>
									<img src="<?php print esc_url($copallyt_footer_bg_image); ?>" style="max-height: 70px;" class="copallyt_footer_image"/> <?php// endif;
									?></td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__ ('Footer Copyright text', 'copallyt'); ?></strong>
								</td>
								<td>
									<?php
									$copyright = copallyt_get_option ('wd_copyright');
									$copyright = (!empty($copyright)) ? copallyt_get_option ('wd_copyright') : ''; ?>
									<textarea type="text" class="log_input" class="wd_txt_big" name="wd_copyright" placeholder="<?php echo esc_attr__('Footer Copyright text', 'copallyt') ?>"><?php echo html_entity_decode ($copyright); ?></textarea>
								</td>
							</tr>
							<tr>
								<td>
									<strong><?php echo esc_html__ ('Powered by text', 'copallyt'); ?></strong>
								</td>
								<td>
									<?php
									$poweredby = html_entity_decode (copallyt_get_option ('wd_poweredby'));
									$poweredby = (!empty($poweredby)) ? copallyt_get_option ('wd_poweredby') : ''; ?>
									<textarea type="text" class="log_input" class="wd_txt_big" name="wd_poweredby" placeholder="<?php echo esc_attr__('Powered by', 'copallyt') ?>"> <?php echo esc_html ($poweredby); ?></textarea>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
		</div>
		<div class="eight columns wp-core-ui wd-validate">
			<p>
				<button class="button" value="Update Options" name="search" type="submit">
					<span class="ti-save"></span><?php echo esc_html__ ('Update Options', 'copallyt'); ?></button>
			</p>
		</div>
		</form>
		</div>


		<div style="clear: both;">
			<br/><br/><br/><br/><br/><br/>
		</div>


		<div class="wb-item">
			<div class="icon-themes">

			</div>
		</div>
		<?php
	}
}

if (!function_exists ('copallyt_import_demo')) {
	function copallyt_import_demo () {
		?>
		<div id="tabs-6">
			<div id="wd-metaboxes-general" class="wrap wd-page wd-page-info" style="padding: 20px;background-color: #FFF;">
				<table class="form-table">
					<tbody>
					<tr>
						<td style="display: none;"></td>
						<td class="import-demo-screenshot" style="padding-left: 250px;">
							<em class="wd-field-description"><?php echo esc_html__ ('Select demo to import', 'copallyt'); ?> : </em>
							<select name="Demo_selector" id="Demo_selector" class="form-control wd-form-element">
								<option value="demo-1"><?php echo esc_html__ ('Demo 1', 'copallyt'); ?></option>
								<option value="demo-2"><?php echo esc_html__ ('Demo 2', 'copallyt'); ?></option>
								<option value="demo-3"><?php echo esc_html__ ('Demo 3', 'copallyt'); ?></option>
							</select><br>
							<label class="demo-1 demos_label" for="demo-1"></label>
							<label class="demo-2 demos_label" for="demo-2" style="display: none"></label>
							<label class="demo-3 demos_label" for="demo-3" style="display: none"></label>
						</td>
					</tr>
					<tr>
						<td style="display:none;"></td>
						<td style="padding-left: 250px;">
							<em class="wd-field-description"><?php echo esc_html__ ('Import Type', 'copallyt'); ?> : </em>
							<select name="import_option" id="import_option" class="form-control wd-form-element">
								<option value=""><?php echo esc_html__ ('Please Select', 'copallyt'); ?></option>
								<option value="complete_content"><?php echo esc_html__ ('All', 'copallyt'); ?></option>
								<option value="content"><?php echo esc_html__ ('Content', 'copallyt'); ?></option>
								<option value="widgets"><?php echo esc_html__ ('Widgets', 'copallyt'); ?></option>
								<option value="options"><?php echo esc_html__ ('Options', 'copallyt'); ?></option>
								<option value="menus"><?php echo esc_html__ ('Menus', 'copallyt'); ?></option>
							</select>
						</td>
					</tr>
					<tr id="tr_import_attachments" style="display:none;">
						<td style="display: none;"></td>
						<td style="padding-left: 250px;">
							<p><?php echo esc_html__ ('Do you want to import media files?', 'copallyt'); ?></p>
							<input type="checkbox" value="1" class="wd-form-element" name="import_attachments" id="import_attachments"/>
						</td>
					</tr>
					<tr id="tr_delete_menus" style="display:none;">
						<td style="display: none;"></td>
						<td style="padding-left: 250px;">
							<p><?php echo esc_html__ ('Do you want to delete all existing menus?', 'copallyt'); ?></p>
							<input type="checkbox" value="1" class="wd-form-element" name="delete_menus" id="delete_menus"/>
						</td>
					</tr>
					<tr>
						<td style="display: none;"></td>
						<td style="padding-left: 250px;">
							<input type="submit" class="button button-primary" value="<?php echo esc_html__ ('Import', 'copallyt'); ?>" name="import" id="import_demo_data"/>
							<img id="loading_gif" src="<?php echo get_template_directory_uri () . '/images/loading_import.gif'; ?>" style="margin-left:20px; display:none"/>
							<img id="OK_result" src="<?php echo get_template_directory_uri () . '/images/OK_result.png'; ?>" style="margin-left:20px; display:none"/>
							<img id="NOK_result" src="<?php echo get_template_directory_uri () . '/images/NOK_result.png'; ?>" style="margin-left:20px; display:none"/>
						</td>
					</tr>
					<tr>
						<td style="display: none;"></td>
						<td style="padding-left: 250px;">
							<span><?php esc_html__ ('The import process may take some time. Please be patient.', 'copallyt') ?> </span><br/>
							<div class="import_load">
								<div class="wd-progress-bar-wrapper html5-progress-bar">
									<div class="progress-bar-wrapper">
										<progress id="progressbar" value="0" max="100"></progress>
									</div>
									<div class="progress-value">0%</div>
									<div class="progress-bar-message"></div>
									<div class="error-message" style="color:#990000; font-weight:bold;"></div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td style="display: none;"></td>
						<td style="text-align: center;">
							<div class="alert alert-warning">
								<strong><?php echo esc_html__('Important notes:', 'copallyt') ?></strong>
								<ul>
									<li><?php echo esc_html__('Please note that import process will take time needed to download all attachments from demo web site.', 'copallyt'); ?></li>
									<li> <?php echo esc_html__('If you plan to use shop, please install <b>WooCommerce</b> before you run import.', 'copallyt') ?></li>
								</ul>
							</div>
						</td>
					</tr>
					</tbody>
				</table>
			</div>

		</div>
		<?php
	}
}

function copallyt_google_fonts_array () {
	$google_fonts = array (
		array (
			"name" => "ABeeZee",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Abel",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Abhaya Libre",
			"subsets" => array (
				"latin-ext",
				"sinhala",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array (
			"name" => "Abril Fatface",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Aclonica",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Acme",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Actor",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Adamina",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Advent Pro",
			"subsets" => array (
				"latin-ext",
				"latin",
				"greek"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Aguafina Script",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Akronim",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Aladin",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Aldrich",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Alef",
			"subsets" => array (
				"latin",
				"hebrew"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Alegreya",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Alegreya SC",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Alegreya Sans",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"100",
						"300",
						"400",
						"500",
						"700",
						"800",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"300",
						"400",
						"500",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Alegreya Sans SC",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"100",
						"300",
						"400",
						"500",
						"700",
						"800",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"300",
						"400",
						"500",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Alex Brush",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Alfa Slab One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Alice",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Alike",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Alike Angular",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Allan",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Allerta",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Allerta Stencil",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Allura",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Almendra",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Almendra Display",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Almendra SC",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Amarante",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Amaranth",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Amatic SC",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Amatica SC",
			"subsets" => array (
				"latin-ext",
				"latin",
				"hebrew"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Amethysta",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Amiko",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Amiri",
			"subsets" => array (
				"arabic",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Amita",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Anaheim",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Andada",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Andika",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Angkor",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Annie Use Your Telescope",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Anonymous Pro",
			"subsets" => array (
				"latin-ext",
				"latin",
				"greek",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Antic",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Antic Didone",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Antic Slab",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Anton",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Arapey",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Arbutus",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Arbutus Slab",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Architects Daughter",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Archivo Black",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Archivo Narrow",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Aref Ruqaa",
			"subsets" => array (
				"arabic",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Arima Madurai",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese",
				"tamil"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Arimo",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"hebrew",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Arizonia",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Armata",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Artifika",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Arvo",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Arya",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Asap",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"500",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"500",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Asar",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Asset",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Assistant",
			"subsets" => array (
				"latin",
				"hebrew"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array (
			"name" => "Astloch",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Asul",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Athiti",
			"subsets" => array (
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Atma",
			"subsets" => array (
				"latin-ext",
				"latin",
				"bengali"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Atomic Age",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Aubrey",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Audiowide",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Autour One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Average",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Average Sans",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Averia Gruesa Libre",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Averia Libre",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"300",
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Averia Sans Libre",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"300",
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Averia Serif Libre",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"300",
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Bad Script",
			"subsets" => array (
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Baloo",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Baloo Bhai",
			"subsets" => array (
				"latin-ext",
				"latin",
				"gujarati",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Baloo Bhaina",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese",
				"oriya"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Baloo Chettan",
			"subsets" => array (
				"latin-ext",
				"latin",
				"malayalam",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Baloo Da",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese",
				"bengali"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Baloo Paaji",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese",
				"gurmukhi"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Baloo Tamma",
			"subsets" => array (
				"latin-ext",
				"latin",
				"kannada",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Baloo Thambi",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese",
				"tamil"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Balthazar",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bangers",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Basic",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Battambang",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Baumans",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bayon",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Belgrano",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Belleza",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "BenchNine",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Bentham",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Berkshire Swash",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bevan",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bigelow Rules",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bigshot One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bilbo",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bilbo Swash Caps",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "BioRhyme",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"700",
						"800"
					)
				)
			)
		),
		array (
			"name" => "BioRhyme Expanded",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"700",
						"800"
					)
				)
			)
		),
		array (
			"name" => "Biryani",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Bitter",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Black Ops One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bokor",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bonbon",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Boogaloo",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bowlby One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bowlby One SC",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Brawler",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bree Serif",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bubblegum Sans",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bubbler One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Buda",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("300")
				)
			)
		),
		array (
			"name" => "Buenard",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Bungee",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bungee Hairline",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bungee Inline",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bungee Outline",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Bungee Shade",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Butcherman",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Butterfly Kids",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Cabin",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"500",
						"600",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Cabin Condensed",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Cabin Sketch",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Caesar Dressing",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Cagliostro",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Cairo",
			"subsets" => array (
				"arabic",
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"600",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Calligraffitti",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Cambay",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Cambo",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Candal",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Cantarell",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Cantata One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Cantora One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Capriola",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Cardo",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"greek"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Carme",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Carrois Gothic",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Carrois Gothic SC",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Carter One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Catamaran",
			"subsets" => array (
				"latin-ext",
				"latin",
				"tamil"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Caudex",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"greek"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Caveat",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Caveat Brush",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Cedarville Cursive",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ceviche One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Changa",
			"subsets" => array (
				"arabic",
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array (
			"name" => "Changa One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Chango",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Chathura",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"300",
						"400",
						"700",
						"800"
					)
				)
			)
		),
		array (
			"name" => "Chau Philomene One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Chela One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Chelsea Market",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Chenla",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Cherry Cream Soda",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Cherry Swash",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Chewy",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Chicle",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Chivo",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Chonburi",
			"subsets" => array (
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Cinzel",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Cinzel Decorative",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Clicker Script",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Coda",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"800"
					)
				)
			)
		),
		array (
			"name" => "Coda Caption",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("800")
				)
			)
		),
		array (
			"name" => "Codystar",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400"
					)
				)
			)
		),
		array (
			"name" => "Coiny",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese",
				"tamil"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Combo",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Comfortaa",
			"subsets" => array (
				"latin-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Coming Soon",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Concert One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Condiment",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Content",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Contrail One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Convergence",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Cookie",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Copse",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Corben",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Cormorant",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Cormorant Garamond",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Cormorant Infant",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Cormorant SC",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Cormorant Unicase",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Cormorant Upright",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Courgette",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Cousine",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"hebrew",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Coustard",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Covered By Your Grace",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Crafty Girls",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Creepster",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Crete Round",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Crimson Text",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"600",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Croissant One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Crushed",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Cuprum",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Cutive",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Cutive Mono",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Damion",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Dancing Script",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Dangrek",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "David Libre",
			"subsets" => array (
				"latin-ext",
				"latin",
				"hebrew",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"500",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Dawning of a New Day",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Days One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Dekko",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Delius",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Delius Swash Caps",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Delius Unicase",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Della Respira",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Denk One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Devonshire",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Dhurjati",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Didact Gothic",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Diplomata",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Diplomata SC",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Domine",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Donegal One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Doppio One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Dorsa",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Dosis",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array (
			"name" => "Dr Sugiyama",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Droid Sans",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Droid Sans Mono",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Droid Serif",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Duru Sans",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Dynalight",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "EB Garamond",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Eagle Lake",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Eater",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Economica",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Eczar",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array (
			"name" => "Ek Mukta",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array (
			"name" => "El Messiri",
			"subsets" => array (
				"arabic",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Electrolize",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Elsie",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Elsie Swash Caps",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Emblema One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Emilys Candy",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Engagement",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Englebert",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Enriqueta",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Erica One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Esteban",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Euphoria Script",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ewert",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Exo",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Exo 2",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Expletus Sans",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"500",
						"600",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Fanwood Text",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Farsan",
			"subsets" => array (
				"latin-ext",
				"latin",
				"gujarati",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Fascinate",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Fascinate Inline",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Faster One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Fasthand",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Fauna One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Federant",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Federo",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Felipa",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Fenix",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Finger Paint",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Fira Mono",
			"subsets" => array (
				"latin-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Fira Sans",
			"subsets" => array (
				"latin-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"300",
						"400",
						"500",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Fjalla One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Fjord One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Flamenco",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400"
					)
				)
			)
		),
		array (
			"name" => "Flavors",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Fondamento",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Fontdiner Swanky",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Forum",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Francois One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Frank Ruhl Libre",
			"subsets" => array (
				"latin-ext",
				"latin",
				"hebrew"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Freckle Face",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Fredericka the Great",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Fredoka One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Freehand",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Fresca",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Frijole",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Fruktur",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Fugaz One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "GFS Didot",
			"subsets" => array ("greek"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "GFS Neohellenic",
			"subsets" => array ("greek"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Gabriela",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Gafata",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Galada",
			"subsets" => array (
				"latin",
				"bengali"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Galdeano",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Galindo",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Gentium Basic",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Gentium Book Basic",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Geo",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Geostar",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Geostar Fill",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Germania One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Gidugu",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Gilda Display",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Give You Glory",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Glass Antiqua",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Glegoo",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Gloria Hallelujah",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Goblin One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Gochi Hand",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Gorditas",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Goudy Bookletter 1911",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Graduate",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Grand Hotel",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Gravitas One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Great Vibes",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Griffy",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Gruppo",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Gudea",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Gurajada",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Habibi",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Halant",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Hammersmith One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Hanalei",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Hanalei Fill",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Handlee",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Hanuman",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Happy Monkey",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Harmattan",
			"subsets" => array (
				"arabic",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Headland One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Heebo",
			"subsets" => array (
				"latin",
				"hebrew"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"300",
						"400",
						"500",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Henny Penny",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Herr Von Muellerhoff",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Hind",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Hind Guntur",
			"subsets" => array (
				"latin-ext",
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Hind Madurai",
			"subsets" => array (
				"latin-ext",
				"latin",
				"tamil"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Hind Siliguri",
			"subsets" => array (
				"latin-ext",
				"latin",
				"bengali"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Hind Vadodara",
			"subsets" => array (
				"latin-ext",
				"latin",
				"gujarati"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Holtwood One SC",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Homemade Apple",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Homenaje",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "IM Fell DW Pica",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "IM Fell DW Pica SC",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "IM Fell Double Pica",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "IM Fell Double Pica SC",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "IM Fell English",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "IM Fell English SC",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "IM Fell French Canon",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "IM Fell French Canon SC",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "IM Fell Great Primer",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "IM Fell Great Primer SC",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Iceberg",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Iceland",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Imprima",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Inconsolata",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Inder",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Indie Flower",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Inika",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Inknut Antiqua",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Irish Grover",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Istok Web",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Italiana",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Italianno",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Itim",
			"subsets" => array (
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Jacques Francois",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Jacques Francois Shadow",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Jaldi",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Jim Nightshade",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Jockey One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Jolly Lodger",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Jomhuria",
			"subsets" => array (
				"arabic",
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Josefin Sans",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"100",
						"300",
						"400",
						"600",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"300",
						"400",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Josefin Slab",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"100",
						"300",
						"400",
						"600",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"300",
						"400",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Joti One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Judson",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Julee",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Julius Sans One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Junge",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Jura",
			"subsets" => array (
				"latin-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600"
					)
				)
			)
		),
		array (
			"name" => "Just Another Hand",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Just Me Again Down Here",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Kadwa",
			"subsets" => array (
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Kalam",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Kameron",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Kanit",
			"subsets" => array (
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Kantumruy",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Karla",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Karma",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Katibeh",
			"subsets" => array (
				"arabic",
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Kaushan Script",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Kavivanar",
			"subsets" => array (
				"latin-ext",
				"latin",
				"tamil"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Kavoon",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Kdam Thmor",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Keania One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Kelly Slab",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Kenia",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Khand",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Khmer",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Khula",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array (
			"name" => "Kite One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Knewave",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Kotta One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Koulen",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Kranky",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Kreon",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Kristi",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Krona One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Kumar One",
			"subsets" => array (
				"latin-ext",
				"latin",
				"gujarati"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Kumar One Outline",
			"subsets" => array (
				"latin-ext",
				"latin",
				"gujarati"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Kurale",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "La Belle Aurore",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Laila",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Lakki Reddy",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Lalezar",
			"subsets" => array (
				"arabic",
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Lancelot",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Lateef",
			"subsets" => array (
				"arabic",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Lato",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"100",
						"300",
						"400",
						"700",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"300",
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "League Script",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Leckerli One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ledger",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Lekton",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Lemon",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Lemonada",
			"subsets" => array (
				"arabic",
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Libre Baskerville",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Libre Franklin",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Life Savers",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Lilita One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Lily Script One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Limelight",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Linden Hill",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Lobster",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Lobster Two",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Londrina Outline",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Londrina Shadow",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Londrina Sketch",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Londrina Solid",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Lora",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Love Ya Like A Sister",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Loved by the King",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Lovers Quarrel",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Luckiest Guy",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Lusitana",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Lustria",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Macondo",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Macondo Swash Caps",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Mada",
			"subsets" => array (
				"arabic",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Magra",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Maiden Orange",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Maitree",
			"subsets" => array (
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Mako",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Mallanna",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Mandali",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Marcellus",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Marcellus SC",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Marck Script",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Margarine",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Marko One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Marmelad",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Martel",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Martel Sans",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Marvel",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Mate",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Mate SC",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Maven Pro",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"500",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "McLaren",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Meddon",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "MedievalSharp",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Medula One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Meera Inimai",
			"subsets" => array (
				"latin",
				"tamil"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Megrim",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Meie Script",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Merienda",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Merienda One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Merriweather",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"300",
						"400",
						"700",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Merriweather Sans",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"300",
						"400",
						"700",
						"800"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"700",
						"800"
					)
				)
			)
		),
		array (
			"name" => "Metal",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Metal Mania",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Metamorphous",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Metrophobic",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Michroma",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Milonga",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Miltonian",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Miltonian Tattoo",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Miniver",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Miriam Libre",
			"subsets" => array (
				"latin-ext",
				"latin",
				"hebrew"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Mirza",
			"subsets" => array (
				"arabic",
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Miss Fajardose",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Mitr",
			"subsets" => array (
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Modak",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Modern Antiqua",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Mogra",
			"subsets" => array (
				"latin-ext",
				"latin",
				"gujarati"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Molengo",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Molle",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Monda",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Monofett",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Monoton",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Monsieur La Doulaise",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Montaga",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Montez",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Montserrat",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Montserrat Alternates",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Montserrat Subrayada",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Moul",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Moulpali",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Mountains of Christmas",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Mouse Memoirs",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Mr Bedfort",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Mr Dafoe",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Mr De Haviland",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Mrs Saint Delafield",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Mrs Sheppards",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Mukta Vaani",
			"subsets" => array (
				"latin-ext",
				"latin",
				"gujarati"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array (
			"name" => "Muli",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Mystery Quest",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "NTR",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Neucha",
			"subsets" => array (
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Neuton",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"700",
						"800"
					)
				)
			)
		),
		array (
			"name" => "New Rocker",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "News Cycle",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Niconne",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Nixie One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Nobile",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Nokora",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Norican",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Nosifer",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Nothing You Could Do",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Noticia Text",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Noto Sans",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Noto Serif",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Nova Cut",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Nova Flat",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Nova Mono",
			"subsets" => array (
				"latin",
				"greek"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Nova Oval",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Nova Round",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Nova Script",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Nova Slim",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Nova Square",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Numans",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Nunito",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Nunito Sans",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Odor Mean Chey",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Offside",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Old Standard TT",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Oldenburg",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Oleo Script",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Oleo Script Swash Caps",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Open Sans",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"300",
						"400",
						"600",
						"700",
						"800"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array (
			"name" => "Open Sans Condensed",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("300")
				),
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Oranienbaum",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Orbitron",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"500",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Oregano",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Orienta",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Original Surfer",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Oswald",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Over the Rainbow",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Overlock",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Overlock SC",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ovo",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Oxygen",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Oxygen Mono",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "PT Mono",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "PT Sans",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "PT Sans Caption",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "PT Sans Narrow",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "PT Serif",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "PT Serif Caption",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Pacifico",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Palanquin",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Palanquin Dark",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Paprika",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Parisienne",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Passero One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Passion One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Pathway Gothic One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Patrick Hand",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Patrick Hand SC",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Pattaya",
			"subsets" => array (
				"latin-ext",
				"latin",
				"thai",
				"cyrillic",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Patua One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Pavanam",
			"subsets" => array (
				"latin-ext",
				"latin",
				"tamil"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Paytone One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Peddana",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Peralta",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Permanent Marker",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Petit Formal Script",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Petrona",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Philosopher",
			"subsets" => array (
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Piedra",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Pinyon Script",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Pirata One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Plaster",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Play",
			"subsets" => array (
				"latin-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Playball",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Playfair Display",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Playfair Display SC",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Podkova",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Poiret One",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Poller One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Poly",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Pompiere",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Pontano Sans",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Poppins",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Port Lligat Sans",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Port Lligat Slab",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Pragati Narrow",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Prata",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Preahvihear",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Press Start 2P",
			"subsets" => array (
				"latin-ext",
				"latin",
				"greek",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Pridi",
			"subsets" => array (
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Princess Sofia",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Prociono",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Prompt",
			"subsets" => array (
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Prosto One",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Proza Libre",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array (
			"name" => "Puritan",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Purple Purse",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Quando",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Quantico",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Quattrocento",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Quattrocento Sans",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Questrial",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Quicksand",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Quintessential",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Qwigley",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Racing Sans One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Radley",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Rajdhani",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Rakkas",
			"subsets" => array (
				"arabic",
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Raleway",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Raleway Dots",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ramabhadra",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ramaraja",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Rambla",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Rammetto One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ranchers",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Rancho",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ranga",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Rasa",
			"subsets" => array (
				"latin-ext",
				"latin",
				"gujarati"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Rationale",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ravi Prakash",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Redressed",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Reem Kufi",
			"subsets" => array (
				"arabic",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Reenie Beanie",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Revalia",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Rhodium Libre",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ribeye",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ribeye Marrow",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Righteous",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Risque",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Roboto",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"100",
						"300",
						"400",
						"500",
						"700",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"300",
						"400",
						"500",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Roboto Condensed",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"300",
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Roboto Mono",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"100",
						"300",
						"400",
						"500",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"300",
						"400",
						"500",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Roboto Slab",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Rochester",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Rock Salt",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Rokkitt",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Romanesco",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ropa Sans",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Rosario",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Rosarivo",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Rouge Script",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Rozha One",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Rubik",
			"subsets" => array (
				"latin-ext",
				"latin",
				"hebrew",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"300",
						"400",
						"500",
						"700",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Rubik Mono One",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Rubik One",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ruda",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Rufina",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Ruge Boogie",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ruluko",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Rum Raisin",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ruslan Display",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Russo One",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ruthie",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Rye",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sacramento",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sahitya",
			"subsets" => array (
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Sail",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Salsa",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sanchez",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sancreek",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sansita One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sarala",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Sarina",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sarpanch",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Satisfy",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Scada",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Scheherazade",
			"subsets" => array (
				"arabic",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Schoolbell",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Scope One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Seaweed Script",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Secular One",
			"subsets" => array (
				"latin-ext",
				"latin",
				"hebrew"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sevillana",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Seymour One",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Shadows Into Light",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Shadows Into Light Two",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Shanti",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Share",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Share Tech",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Share Tech Mono",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Shojumaru",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Short Stack",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Shrikhand",
			"subsets" => array (
				"latin-ext",
				"latin",
				"gujarati"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Siemreap",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sigmar One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Signika",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Signika Negative",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Simonetta",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Sintony",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Sirin Stencil",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Six Caps",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Skranji",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Slabo 13px",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Slabo 27px",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Slackey",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Smokum",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Smythe",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sniglet",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"800"
					)
				)
			)
		),
		array (
			"name" => "Snippet",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Snowburst One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sofadi One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sofia",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sonsie One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sorts Mill Goudy",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Source Code Pro",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Source Sans Pro",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"200",
						"300",
						"400",
						"600",
						"700",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"600",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Source Serif Pro",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Space Mono",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Special Elite",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Spicy Rice",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Spinnaker",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Spirax",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Squada One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sree Krushnadevaraya",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sriracha",
			"subsets" => array (
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Stalemate",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Stalinist One",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Stardos Stencil",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Stint Ultra Condensed",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Stint Ultra Expanded",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Stoke",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400"
					)
				)
			)
		),
		array (
			"name" => "Strait",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sue Ellen Francisco",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Suez One",
			"subsets" => array (
				"latin-ext",
				"latin",
				"hebrew"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sumana",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Sunshiney",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Supermercado One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Sura",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Suranna",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Suravaram",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Suwannaphum",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Swanky and Moo Moo",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Syncopate",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Tangerine",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Taprom",
			"subsets" => array ("khmer"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Tauri",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Taviraj",
			"subsets" => array (
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Teko",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Telex",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Tenali Ramakrishna",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Tenor Sans",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Text Me One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "The Girl Next Door",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Tienne",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Tillana",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"500",
						"600",
						"700",
						"800"
					)
				)
			)
		),
		array (
			"name" => "Timmana",
			"subsets" => array (
				"telugu",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Tinos",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"hebrew",
				"greek",
				"cyrillic",
				"cyrillic-ext",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Titan One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Titillium Web",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"200",
						"300",
						"400",
						"600",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"600",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Trade Winds",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Trirong",
			"subsets" => array (
				"latin-ext",
				"latin",
				"thai",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Trocchi",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Trochut",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array ("400")
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Trykker",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Tulpen One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ubuntu",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"300",
						"400",
						"500",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Ubuntu Condensed",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Ubuntu Mono",
			"subsets" => array (
				"latin-ext",
				"greek-ext",
				"latin",
				"greek",
				"cyrillic",
				"cyrillic-ext"
			),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Ultra",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Uncial Antiqua",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Underdog",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Unica One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "UnifrakturCook",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("700")
				)
			)
		),
		array (
			"name" => "UnifrakturMaguntia",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Unkempt",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Unlock",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Unna",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "VT323",
			"subsets" => array (
				"latin-ext",
				"latin",
				"vietnamese"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Vampiro One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Varela",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Varela Round",
			"subsets" => array (
				"latin",
				"hebrew"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Vast Shadow",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Vesper Libre",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"500",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Vibur",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Vidaloka",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Viga",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Voces",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Volkhov",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Vollkorn",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "italic",
					"weight" => array (
						"400",
						"700"
					)
				),
				array (
					"style" => "normal",
					"weight" => array (
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Voltaire",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Waiting for the Sunrise",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Wallpoet",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Walter Turncoat",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Warnes",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Wellfleet",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Wendy One",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Wire One",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Work Sans",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"200",
						"300",
						"400",
						"500",
						"600",
						"700",
						"800",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Yanone Kaffeesatz",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"200",
						"300",
						"400",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Yantramanav",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"100",
						"300",
						"400",
						"500",
						"700",
						"900"
					)
				)
			)
		),
		array (
			"name" => "Yatra One",
			"subsets" => array (
				"latin-ext",
				"latin",
				"devanagari"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Yellowtail",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Yeseva One",
			"subsets" => array (
				"latin-ext",
				"latin",
				"cyrillic"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Yesteryear",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		),
		array (
			"name" => "Yrsa",
			"subsets" => array (
				"latin-ext",
				"latin"
			),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array (
						"300",
						"400",
						"500",
						"600",
						"700"
					)
				)
			)
		),
		array (
			"name" => "Zeyada",
			"subsets" => array ("latin"),
			"variants" => array (
				array (
					"style" => "normal",
					"weight" => array ("400")
				)
			)
		)
	);
	return $google_fonts;
}

function copallyt_font_weight_name ($weight) {
	switch ($weight) {
		case "100":
			return "Thin 100";
			break;
		case "200":
			return "Extra-Light 200";
			break;
		case "300":
			return "Light 300";
			break;
		case "400":
			return "Regular 400";
			break;
		case "500":
			return "Medium 500";
			break;
		case "600":
			return "Semi-Bold 600";
			break;
		case "700":
			return "Bold 700";
			break;
		case "800":
			return "Extra-Bold 800";
			break;
		case "900":
			return "Ultra-bold 900";
			break;
		default:
			return "";

	}

}