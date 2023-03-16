<?php

class copallyt_Customizer_Controls_Social_Icons extends copallyt_Customizer_Controls {

    public $controls = array();

    public function __construct() {
        $this->section = 'copallyt_social_icons';
     //   $this->priority = new copallyt_Customizer_Priority(0, 1);

        parent::__construct();

        add_action( 'customize_register', array( $this, 'add_controls' ), 30 );
        add_action( 'customize_register', array( $this, 'set_controls' ), 35 );
    }

    public function add_controls( $wp_customize ) {
        $this->controls = array(
            'wd_options_array[copallyt_show_top_social_bare]' => array(
                'label' => __( 'Show Top Bar', 'copallyt' ),
                'type' => 'checkbox',
                'description' => 'Show or hide top bar',
                'default' => copallyt_get_option('copallyt_show_top_social_bare')
            ),
            'wd_options_array[copallyt_facebook]' => array(
                'label' => __( 'Facebook', 'copallyt' ),
                'type' => 'text',
                'default' => copallyt_get_option('copallyt_facebook'),
                'description' => 'Facebook',
                'input_attrs' => array(
                    'placeholder' => esc_html__('Your Facebook Page Link','copallyt')
                )
            ),
            'wd_options_array[copallyt_twitter]' => array(
                'label' => __( 'Twitter', 'copallyt' ),
                'type' => 'text',
                'default' => copallyt_get_option('copallyt_twitter'),
                'description' => 'Twitter',
                'input_attrs' => array(
                    'placeholder' => esc_html__('Your Twitter Page Link','copallyt')
                )
            ),
            'wd_options_array[copallyt_google_plus]' => array(
                'label' => __( 'Google+', 'copallyt' ),
                'type' => 'text',
                'default' => copallyt_get_option('copallyt_google_plus'),
                'description' => 'Google+',
                'input_attrs' => array(
                    'placeholder' => esc_html__('Your Google+ Page Link','copallyt')
                )
            ),
            'wd_options_array[copallyt_phone]' => array(
                'label' => __( 'Phone', 'copallyt' ),
                'type' => 'text',
                'default' => copallyt_get_option('copallyt_phone'),
                'description' => 'Phone',
                'input_attrs' => array(
                    'placeholder' => esc_html__('Your Phone number','copallyt')
                )
            ),
            'wd_options_array[copallyt_address]' => array(
                'label' => __( 'Address', 'copallyt' ),
                'type' => 'text',
                'default' => copallyt_get_option('copallyt_address'),
                'description' => 'Address',
                'input_attrs' => array(
                    'placeholder' => esc_html__('Your first Address','copallyt')
                )
            )
        );

        return $this->controls;
    }

}

new copallyt_Customizer_Controls_Social_Icons();
