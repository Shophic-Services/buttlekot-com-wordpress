<?php

class copallyt_Customizer_Controls_Colors extends copallyt_Customizer_Controls {

    public $controls = array();

    public function __construct() {
        $this->section = 'copallyt_colors';
        //  $this->priority = new copallyt_Customizer_Priority(0, 1);

        parent::__construct();

        add_action( 'customize_register', array( $this, 'add_controls' ), 30 );
        add_action( 'customize_register', array( $this, 'set_controls' ), 35 );
    }

    public function add_controls( $wp_customize ) {
        $this->controls = array(
            'wd_options_array[wrapper_bg_color]' => array(
                'label' => __( 'Background Color', 'copallyt' ),
                'type' => 'WP_Customize_Color_Control',
                'default' => copallyt_get_option('wrapper_bg_color'),
                'settings' => 'wd_options_array[wrapper_bg_color]',
                'description' => 'copallyt Background Color control'
            ),
            'wd_options_array[primary_color]' => array(
                'label' => __( 'Primary Color', 'copallyt' ),
                'type' => 'WP_Customize_Color_Control',
                'default' => copallyt_get_option('primary_color'),
                'settings' => 'wd_options_array[primary_color]',
                'description' => 'copallyt primary color control'
            ),
            'wd_options_array[secondary_color]' => array(
                'label' => __( 'Secondary Color', 'copallyt' ),
                'type' => 'WP_Customize_Color_Control',
                'default' => copallyt_get_option('secondary_color'),
                'settings' => 'wd_options_array[secondary_color]',
                'description' => 'copallyt secondary color control'
            ),
            'wd_options_array[adress_bar_bgcolor]' => array(
                'label' => __( 'Address Bar Background color', 'copallyt' ),
                'type' => 'WP_Customize_Color_Control',
                'default' => copallyt_get_option('adress_bar_bgcolor'),
                'settings' => 'wd_options_array[adress_bar_bgcolor]',
                'description' => 'Address Bar background color control'
            ),
            'wd_options_array[adress_bar_color]' => array(
                'label' => __( 'Address Bar color', 'copallyt' ),
                'type' => 'WP_Customize_Color_Control',
                'default' => copallyt_get_option('adress_bar_color'),
                'settings' => 'wd_options_array[adress_bar_color]',
                'description' => 'Address Bar color control'
            ),
            'wd_options_array[container_bg]' => array(
                'label' => __( 'Container background color', 'copallyt' ),
                'type' => 'WP_Customize_Color_Control',
                'default' => copallyt_get_option('container_bg'),
                'settings' => 'wd_options_array[container_bg]',
                'description' => 'Container background color control'
            ),
            'wd_options_array[header_bg]' => array(
                'label' => __( 'Header background color', 'copallyt' ),
                'type' => 'WP_Customize_Color_Control',
                'default' => copallyt_get_option('header_bg'),
                'settings' => 'wd_options_array[header_bg]',
                'description' => 'Header background color control'
            ),
            'wd_options_array[navigation_text_color]' => array(
                'label' => __( 'Navigation Text Color', 'copallyt' ),
                'type' => 'WP_Customize_Color_Control',
                'default' => copallyt_get_option('navigation_text_color'),
                'settings' => 'wd_options_array[navigation_text_color]',
                'description' => 'Navigation Text Color control'
            ),
            'wd_options_array[navigation_bg_color_sticky]' => array(
                'label' => __( 'Navigation (sticky) background color', 'copallyt' ),
                'type' => 'WP_Customize_Color_Control',
                'default' => copallyt_get_option('navigation_bg_color_sticky'),
                'settings' => 'wd_options_array[navigation_bg_color_sticky]',
                'description' => 'Navigation (sticky) background color control'
            ),
            'wd_options_array[footer_bg_color]' => array(
                'label' => __( 'Footer background color', 'copallyt' ),
                'type' => 'WP_Customize_Color_Control',
                'default' => copallyt_get_option('footer_bg_color'),
                'settings' => 'wd_options_array[footer_bg_color]',
                'description' => 'Footer background color control'
            ),
            'wd_options_array[footer_text_color]' => array(
                'label' => __( 'Footer text color', 'copallyt' ),
                'type' => 'WP_Customize_Color_Control',
                'default' => copallyt_get_option('footer_text_color'),
                'settings' => 'wd_options_array[footer_text_color]',
                'description' => 'Footer text color control'
            ),
            'wd_options_array[copyright_bg]' => array(
                'label' => __( 'Copyright background color', 'copallyt' ),
                'type' => 'WP_Customize_Color_Control',
                'default' => copallyt_get_option('copyright_bg'),
                'settings' => 'wd_options_array[copyright_bg]',
                'description' => 'Copyright background color control'
            ),
            'wd_options_array[copyright_text_color]' => array(
                'label' => __( 'Copyright bar text color', 'copallyt' ),
                'type' => 'WP_Customize_Color_Control',
                'default' => copallyt_get_option('copyright_text_color'),
                'settings' => 'wd_options_array[copyright_text_color]',
                'description' => 'Copyright bar text color control'
            ),
        );

        return $this->controls;
    }

}

new copallyt_Customizer_Controls_Colors();
