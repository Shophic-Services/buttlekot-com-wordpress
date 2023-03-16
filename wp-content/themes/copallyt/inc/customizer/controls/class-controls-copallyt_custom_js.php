<?php

class copallyt_Customizer_Controls_Custom_CSS_JS extends copallyt_Customizer_Controls {

    public $controls = array();

    public function __construct() {
        $this->section = 'copallyt_custom_js';
        $this->priority = new copallyt_Customizer_Priority(49, 1);

        parent::__construct();

        add_action( 'customize_register', array( $this, 'add_controls' ), 30 );
        add_action( 'customize_register', array( $this, 'set_controls' ), 35 );
    }

    public function add_controls( $wp_customize ) {
        $this->controls = array(
            'wd_options_array[copallyt_theme_custom_js]' => array(
                'label' => __( 'Custom JavaScript', 'copallyt' ),
                'type' => 'textarea',
                'default' => copallyt_get_option('copallyt_theme_custom_js'),
                'description' => 'Custom JavaScript',
                'input_attrs' => array(
                    'placeholder' => esc_html__('Put your JavaScript here','copallyt')
                )
            ),
        );

        return $this->controls;
    }

}

new copallyt_Customizer_Controls_Custom_CSS_JS();
