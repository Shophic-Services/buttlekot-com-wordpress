<?php

class copallyt_Customizer_Controls_General extends copallyt_Customizer_Controls {

	public $controls = array();

	public function __construct () {
		$this->section = 'copallyt_general';
		//   $this->priority = new copallyt_Customizer_Priority(0, 1);

		parent::__construct();

		add_action('customize_register', array($this,
		                                       'add_controls'), 30);
		add_action('customize_register', array($this,
		                                       'set_controls'), 35);
	}

	public function add_controls ($wp_customize) {
		$this->controls = array(
			'wd_options_array[wd_logo]' => array(
				'label' => __( 'Logo Link', 'copallyt' ),
				'type' => 'WP_Customize_Image_Control',
				'default' => copallyt_get_option('wd_logo'),
				'settings' => 'wd_options_array[wd_logo]'
			),
			'wd_options_array[copallyt_title_bg_image]' => array(
				'label' => __( 'Background Title Bar for Single Post', 'copallyt' ),
				'type' => 'WP_Customize_Image_Control',
				'default' => copallyt_get_option('copallyt_title_bg_image'),
				'settings' => 'wd_options_array[copallyt_title_bg_image]'
			),
			'wd_options_array[wd_home_page]' => array(
				'label' => __( 'Background image', 'copallyt' ),
				'type' => 'WP_Customize_Image_Control',
				'default' => copallyt_get_option('wd_home_page'),
				'settings' => 'wd_options_array[wd_home_page]'
			),
			'wd_options_array[wd_menu_style]' => array(
				'label' => __( 'Menu style', 'copallyt' ),
				'type' => 'select',
				'default' => copallyt_get_option('wd_menu_style'),
				'settings' => 'wd_options_array[wd_menu_style]',
				'choices'  => array(
					'corporate'  => 'corporate',
					'creative' => 'creative',
				),
			),
			'wd_options_array[wd_box_wrapper]' => array(
				'label' => __( 'Boxed Layout', 'copallyt' ),
				'type' => 'radio',
				'default' => copallyt_get_option('wd_box_wrapper'),
				'settings' => 'wd_options_array[wd_box_wrapper]',
				'choices'  => array(
					'on'  => 'Yes',
					'of' => 'No',
				),
			),
			'wd_options_array[wd_show_title]' => array(
				'label' => __( 'Show Website Title', 'copallyt' ),
				'type' => 'radio',
				'default' => copallyt_get_option('wd_show_title'),
				'settings' => 'wd_options_array[wd_show_title]',
				'choices'  => array(
					'on'  => 'Yes',
					'of' => 'No',
				),
			),
			'wd_options_array[wd_menu_sticky]' => array(
				'label' => __( 'Stick the menu to Top', 'copallyt' ),
				'type' => 'radio',
				'default' => copallyt_get_option('wd_menu_sticky','of'),
				'settings' => 'wd_options_array[wd_menu_sticky]',
				'choices'  => array(
					'on'  => 'Yes',
					'of' => 'No',
				),
			),
			'wd_options_array[shred_map_key]' => array(
				'label' => __( 'Google Key Map', 'copallyt' ),
				'type' => 'text',
				'default' => copallyt_get_option('shred_map_key'),
				'settings' => 'wd_options_array[shred_map_key]',
			),
		);

		return $this->controls;
	}

}

new copallyt_Customizer_Controls_General();
