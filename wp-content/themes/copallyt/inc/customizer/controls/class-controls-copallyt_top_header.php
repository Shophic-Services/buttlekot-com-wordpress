<?php

class copallyt_Customizer_Controls_top_header extends copallyt_Customizer_Controls {

	public $controls = array();

	public function __construct () {
		$this->section = 'copallyt_top_header';
		//   $this->priority = new copallyt_Customizer_Priority(0, 1);

		parent::__construct();

		add_action('customize_register', array($this, 'add_controls'), 30);
		add_action('customize_register', array($this, 'set_controls'), 35);
	}

	public function add_controls ($wp_customize) {
		$this->controls = array(
			'wd_options_array[wd_call_to_action]' => array(
				'label' => __( 'Call to action text butoon', 'copallyt' ),
				'type' => 'text',
				'default' => copallyt_get_option('wd_call_to_action'),
				'settings' => 'wd_options_array[wd_call_to_action]'
			),
			'wd_options_array[wd_call_to_action_button_link]' => array(
				'label' => __( 'Call to action Link Button', 'copallyt' ),
				'type' => 'text',
				'default' => copallyt_get_option('wd_call_to_action_button_link'),
				'settings' => 'wd_options_array[wd_call_to_action_button_link]'
			),
			'wd_options_array[wd_show_top_social_bare]' => array(
				'label' => __( 'Show Top bare', 'copallyt' ),
				'type' => 'radio',
				'default' => copallyt_get_option('wd_show_top_social_bare'),
				'settings' => 'wd_options_array[wd_show_top_social_bare]',
				'choices'  => array(
					'on'  => 'Yes',
					'of' => 'No',
				),
			),
			'wd_options_array[social_bar_color]' => array(
				'label' => __( 'Social bar color', 'copallyt' ),
				'type' => 'WP_Customize_Color_Control',
				'default' => copallyt_get_option('social_bar_color'),
				'description' => 'copallyt primary color control'
			),
			'wd_options_array[language_area_html]' => array(
				'label' => __( 'Language Area HTML', 'copallyt' ),
				'type' => 'textarea',
				'default' => copallyt_get_option('language_area_html'),
				'settings' => 'wd_options_array[language_area_html]'
			),
			'wd_options_array[phone]' => array(
				'label' => __( 'Your Phone number', 'copallyt' ),
				'type' => 'text',
				'default' => copallyt_get_option('phone'),
				'settings' => 'wd_options_array[phone]'
			),
			'wd_options_array[adress]' => array(
				'label' => __( 'Your Address', 'copallyt' ),
				'type' => 'text',
				'default' => copallyt_get_option('adress'),
				'settings' => 'wd_options_array[adress]'
			),
			'wd_options_array[time]' => array(
				'label' => __( 'Your time', 'copallyt' ),
				'type' => 'text',
				'default' => copallyt_get_option('time'),
				'settings' => 'wd_options_array[time]'
			),

		);

		return $this->controls;
	}

}

new copallyt_Customizer_Controls_top_header();
