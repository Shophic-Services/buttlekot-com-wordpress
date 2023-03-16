<?php

class copallyt_Customizer_Controls_Footer extends copallyt_Customizer_Controls {

    public $controls = array();

    public function __construct() {
        $this->section = 'copallyt_footer';
        $this->priority = new copallyt_Customizer_Priority(49, 1);

        parent::__construct();

        add_action( 'customize_register', array( $this, 'add_controls' ), 30 );
        add_action( 'customize_register', array( $this, 'set_controls' ), 35 );
    }

    public function add_controls( $wp_customize ) {
        $this->controls = array(
            'wd_options_array[wd_footer_columns]' => array(
                'label' => __( 'Footer columns', 'copallyt' ),
                'type'    => 'radio',
                'default' => copallyt_get_option('wd_footer_columns'),
                'choices' => array(
                    'one_columns' => __( '1 Column', 'copallyt' ),
                    'tow_a_columns' => __( '2 columns (1/2 + 1/2)', 'copallyt' ),
                    'tow_b_columns' => __( '2 columns (1/3 + 2/3)', 'copallyt' ),
                    'tow_c_columns' => __( '2 columns (2/3 + 1/3)', 'copallyt' ),
                    'three_columns' => __( '3 columns', 'copallyt' ),
                    'four_columns' => __( '4 columns', 'copallyt' ),
                ),
                'sanitize_callback' => 'esc_attr',
                'description' => __( 'Footer columns', 'copallyt' )
            ),
            'wd_options_array[wd_footer_bg_image]' => array(
	            'label' => __( 'Footer background image', 'copallyt' ),
	            'type' => 'WP_Customize_Image_Control',
	            'default' => copallyt_get_option('wd_footer_bg_image'),
	            'settings' => 'wd_options_array[wd_footer_bg_image]'
            ),
            'wd_options_array[copallyt_copyright]' => array(
                'label' => __( 'Footer Copyright Text', 'copallyt' ),
                'type' => 'text',
                'default' => copallyt_get_option('copallyt_copyright'),
                'description' => 'Footer copyright text',
                'input_attrs' => array(
                    'placeholder' => esc_html__('Footer copyright text','copallyt')
                )
            ),
            'wd_options_array[wd_poweredby]' => array(
                'label' => __( 'Powered by text', 'copallyt' ),
                'type' => 'text',
                'default' => copallyt_get_option('wd_poweredby'),
                'input_attrs' => array(
                    'placeholder' => esc_html__('Powered by','copallyt')
                )
            )
        );

        return $this->controls;
    }

}

new copallyt_Customizer_Controls_Footer();
