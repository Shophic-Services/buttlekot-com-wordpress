<?php 

/*********---------testimonial--------------------------*/
add_action('admin_init', 'copallyt_testimonial_init');

function copallyt_testimonial_init() {
  global $vc_add_css_animation;
  global $wd_fonts_array;
  vc_map( array(
    "name" => esc_html__("Wd Testimonail", 'copallyt'), // add a name
    "base" => "webdevia_testimonials", // bind with our shortcode
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, // set this parameter when element will has a content
    "is_container" => FALSE, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent
    "params" => array( 
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Layout Style", 'copallyt'),
            "param_name" => "layout_style",
             "value" => array('Carousel' => 'carousel',
                              'Slider' => 'slider',
                              'Boxes Carousel' => 'boxes-carousel',
                 'Layout 4' => 'layout-4'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Show Thumbnail", 'copallyt'),
            "param_name" => "show_thumbnail",
             "value" => array('Yes' => 'yes',
                              'No' => 'no'),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Thumbnail position", 'copallyt'),
            "param_name" => "thumbnail_position",
             "value" => array('Bottom' => 'bottom',
                              'Top' => 'top'),
        ),
        array(
            "type"       => "checkbox",
            "heading"    => esc_html__( "Categories", 'copallyt' ),
            "param_name" => "webdevia_testimonial_categories",
            'value'      => copallyt_get_categories( 'testimonials_categories' ),
        ),
  	    array(
  		    "type" => "checkbox",
  		    "heading" => esc_html__("Infinity Scroll", 'copallyt'),
  		    "param_name" => "infinity_scroll",
  		    'value' => array( esc_html__( 'Yes, please', 'copallyt' ) => 'yes' ),
  	    ),
        array(
             "type"       => "dropdown",
                    "heading"    => esc_html__( "Items To Show", 'copallyt' ),
                    "param_name" => "testimonial_items_to_show",
                    'value'      => array(
                        'All items' => '-1',
                        '1 item'  => '1',
                        '2 items' => '2',
                        '3 items' => '3',
                        '4 items' => '4',
                        '5 items' => '5',
                        '6 items' => '6',
                        '7 items' => '7',
                        '8 items' => '8',
                        '9 items' => '9',
                        '10 items' => '10',
                        '11 items' => '11',
                        '12 items' => '12',
                        '13 items' => '13',
                        '14 items' => '14',
                        '15 items' => '15',
                        '20 items' => '20',
                        '25 items' => '25',
                        '30 items' => '30',
                        '35 items' => '35',
                        '40 items' => '40'
                        
                        
                        
                    ),
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Text margin", 'copallyt'),
             "param_name" => "testimonial_text_margin",
             'description' => esc_html__( 'for example : 10px 10px 10px 10px', 'copallyt' ),
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Quotes margin", 'copallyt'),
             "param_name" => "testimonial_quotes_margin",
             'description' => esc_html__( 'for example : 10px 10px 10px 10px', 'copallyt' ),
        ),
        // ________Name Typo
        array(
             "heading" => esc_html__("Testimonial Title Tag", 'copallyt'),
             "type" => "dropdown",
             "param_name" => "testimonial_title_tag",
             "value" => array('H6 (Default)' => 'h6',
                                                'H1' => 'h1',
                                                'H2' => 'h2',
                                                'H3' => 'h3',
                                                'H4' => 'h4',
                                                'H5' => 'h5',
                                                'P' => 'p',
                                                'Span' => 'span',
                                                ),
             "group" => "Name Style",
          ),
        array(
             "type" => "dropdown",
             'value' => $wd_fonts_array,
             "heading" => esc_html__("Testimonial Title Font Family", 'copallyt'),
             "param_name" => "testimonial_title_font_family",
             "group" => "Name Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Testimonial Title Font Size", 'copallyt'),
             "param_name" => "testimonial_title_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Name Style",
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Testimonial Title Font Color", 'copallyt'),
             "param_name" => "testimonial_title_color",
             "value" => "",
             "group" => "Name Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Testimonial Title Font Weight", 'copallyt'),
             "param_name"   =>   "testimonial_title_font_weight",
             'value' => array(
                  esc_html__('Default', 'copallyt') =>   '900',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '400'     =>   '400',
             ),
             "group" => "Name Style",
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Testimonial Title Text Transform", 'copallyt'),
             "param_name" => "testimonial_title_text_transform",
             'value' => array(
                  esc_html__('Default', 'copallyt') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Name Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Testimonial Title Line Height", 'copallyt'),
             "param_name" => "testimonial_title_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "Name Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Testimonial Title Letter spacing", 'copallyt'),
             "param_name" => "testimonial_title_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Name Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Testimonial Title Font Style", 'copallyt'),
             "param_name"   =>   "testimonial_title_font_style",
             'value' => array(
                  esc_html__('Normal', 'copallyt')  =>   'normal',
                  esc_html__('Italic','copallyt')        =>   'italic',
                  esc_html__('Inherit','copallyt')       =>   'inherit',
                  esc_html__('Initial','copallyt')       =>   'initial',
             ),
             "group" => "Name Style",
        ),
        // ________Job Title Typo
        array(
             "heading" => esc_html__("Testimonial Job Title Tag", 'copallyt'),
             "type" => "dropdown",
             "param_name" => "testimonial_job_title_tag",
             "value" => array('H2 (Default)' => 'h2',
                                                'H1' => 'h1',
                                                'H3' => 'h3',
                                                'H4' => 'h4',
                                                'H5' => 'h5',
                                                'H6' => 'h6',
                                                'P' => 'p',
                                                'Span' => 'span',
                                                ),
             "group" => "Job Title Style",
          ),
        array(
             "type" => "dropdown",
             'value' => $wd_fonts_array,
             "heading" => esc_html__("Testimonial Job Title Font Family", 'copallyt'),
             "param_name" => "testimonial_job_title_font_family",
             "group" => "Job Title Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Testimonial Job Title Font Size", 'copallyt'),
             "param_name" => "testimonial_job_title_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Job Title Style",
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Testimonial Job Title Font Color", 'copallyt'),
             "param_name" => "testimonial_job_title_color",
             "value" => "",
             "group" => "Job Title Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Testimonial Job Title Font Weight", 'copallyt'),
             "param_name"   =>   "testimonial_job_title_font_weight",
             'value' => array(
                  esc_html__('Default', 'copallyt') =>   '900',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '400'     =>   '400',
             ),
             "group" => "Job Title Style",
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Testimonial Job Title Text Transform", 'copallyt'),
             "param_name" => "testimonial_job_title_text_transform",
             'value' => array(
                  esc_html__('Default', 'copallyt') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Job Title Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Testimonial Job Title Line Height", 'copallyt'),
             "param_name" => "testimonial_job_title_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "Job Title Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Testimonial Job Title Letter spacing", 'copallyt'),
             "param_name" => "testimonial_job_title_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Job Title Style",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Testimonial Job Title Font Style", 'copallyt'),
             "param_name"   =>   "testimonial_job_title_font_style",
             'value' => array(
                  esc_html__('Normal', 'copallyt')  =>   'normal',
                  esc_html__('Italic','copallyt')        =>   'italic',
                  esc_html__('Inherit','copallyt')       =>   'inherit',
                  esc_html__('Initial','copallyt')       =>   'initial',
             ),
             "group" => "Job Title Style",
        ),

        // ________Paragraph Typo
        array(
             "type" => "dropdown",
             'value' => $wd_fonts_array,
             "heading" => esc_html__("Testimonial Text Font Family", 'copallyt'),
             "param_name" => "testimonial_text_font_family",
             "group" => "Testimonial Text",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Testimonial Text Font Size", 'copallyt'),
             "param_name" => "testimonial_text_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Testimonial Text",
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Testimonial Text Font Color", 'copallyt'),
             "param_name" => "testimonial_text_color",
             "value" => "",
             "group" => "Testimonial Text",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Testimonial Text Font Weight", 'copallyt'),
             "param_name"   =>   "testimonial_text_font_weight",
             'value' => array(
                  esc_html__('Default', 'copallyt') =>   '900',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '400'     =>   '400',
             ),
             "group" => "Testimonial Text",
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Testimonial Text Text Transform", 'copallyt'),
             "param_name" => "testimonial_text_text_transform",
             'value' => array(
                  esc_html__('Default', 'copallyt') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Testimonial Text",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Testimonial Text Line Height", 'copallyt'),
             "param_name" => "testimonial_text_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "Testimonial Text",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Testimonial Text Letter spacing", 'copallyt'),
             "param_name" => "testimonial_text_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Testimonial Text",
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Testimonial Text Font Style", 'copallyt'),
             "param_name"   =>   "testimonial_text_font_style",
             'value' => array(
                  esc_html__('Italic','copallyt')        =>   'italic',
                  esc_html__('Normal', 'copallyt')  =>   'normal',
                  esc_html__('Inherit','copallyt')       =>   'inherit',
                  esc_html__('Initial','copallyt')       =>   'initial',
             ),
             "group" => "Testimonial Text",
        ),
        // Quots Typo
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Testimonial Quotes Font Size", 'copallyt'),
             "param_name" => "testimonial_quotes_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Quotes Style",
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Testimonial Quotes Font Color", 'copallyt'),
             "param_name" => "testimonial_quotes_color",
             "value" => "",
             "group" => "Quotes Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Testimonial Quotes Opacity", 'copallyt'),
             "param_name" => "testimonial_quotes_opacity",
             "group" => "Quotes Style",
        ),

        $vc_add_css_animation
    )
) );
}