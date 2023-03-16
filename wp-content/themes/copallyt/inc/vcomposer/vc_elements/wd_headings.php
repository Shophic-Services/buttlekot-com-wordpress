<?php
global $vc_add_css_animation;
global $wd_fonts_array;

vc_map( array(
     "name" => esc_html__("Headings", 'copallyt'),
     "base" => "wd_headings",
     "icon" => get_template_directory_uri()."/images/icon/meknes.png",
     "content_element" => true,
     "is_container" => FALSE,
     "params" => array(
          array(
               "heading" => esc_html__("Title", 'copallyt'),
               "type" => "textfield",
               'value' => 'I am a title change me',
               "param_name" => "headings_title",
          ),
          array(
               "heading" => esc_html__("Title Tag", 'copallyt'),
               "type" => "dropdown",
               "param_name" => "headings_title_tag",
               "value" => array( 'H2 (Default)' => 'h2',
                                 'H1' => 'h1',
                                 'H3' => 'h3',
                                 'H4' => 'h4',
                                 'H5' => 'h5',
                                 'H6' => 'h6'),
          ),
          array(
               "heading" => esc_html__("subtitle", 'copallyt'),
               "type" => "textfield",
               'value' => 'I am a subtitle change me',
               "param_name" => "headings_subtitle",
          ),
          array(
               "heading" => esc_html__("Subtitle Tag", 'copallyt'),
               "type" => "dropdown",
               "param_name" => "headings_subtitle_tag",
               "value" => array('H4 (Default)' => 'h4',
                                                       'H1' => 'h1',
                                                       'H2' => 'h2',
                                                       'H3' => 'h3',
                                                       'H5' => 'h5',
                                                       'H6' => 'h6',
                                                       'P' => 'p'),
          ),
          array(
               "heading" => esc_html__("Layout", 'copallyt'),
               "type" => "dropdown",
               "param_name" => "headings_layout",
               "value" => array('Subtitle under the title' => "s-under-t",
                                   'Title under the subtitle' => "t-under-s",
                                                        'Subtitle behind the  title' => "s-behind-t"),
          ),
          array(
               "heading" => esc_html__("Alignment", 'copallyt'),
               "type" => "dropdown",
               "param_name" => "headings_alignment",
               "value" => array('Center' => "center",
                                'Left' => "left",
                                                        'Right' => "right" ),
          ),
          array(
               "heading" => esc_html__("Separator Type", 'copallyt'),
               "type" => "dropdown",
               "param_name" => "headings_separator",
               "value" => array('No separator' => "none",
                                'Border' => "border",
                                                        'Image' => "image" )
          ),
          array(
               "heading" => esc_html__("Separator Position", 'copallyt'),
               "type" => "dropdown",
               "param_name" => "headings_separator_position",
               "value" => array('Center' => "center",
                                'Top' => "top",
                                                        'Bottom' => "bottom" ),
               "dependency" => Array("element" => "headings_separator", "value" => array('border', 'image')),
          ),
          array(
               "heading" => esc_html__("Border Style", 'copallyt'),
               "type" => "dropdown",
               "param_name" => "headings_separator_border_style",
               "value" => array('Solid' => "solid",
                                'Dashed' => "dashed",
                                                        'Dotted' => "dotted" ),
               "dependency" => Array("element" => "headings_separator", "value" => array('border')),
          ),
          array(
               "type" => "colorpicker",
               "heading" => esc_html__("Border Color", 'copallyt'),
               "param_name" => "headings_separator_border_color",
               "value" => "#DB4436",
               "dependency" => Array("element" => "headings_separator", "value" => array('border')),
          ),
          array(
               "type" => "textfield",
               "heading" => esc_html__("Border Width", 'copallyt'),
               "param_name" => "headings_separator_border_width",
               "value" => "3px",
               "dependency" => Array("element" => "headings_separator", "value" => array('border')),
          ),
          array(
               "type" => "textfield",
               "heading" => esc_html__("Margin between Title and subtitle", 'copallyt'),
               "param_name" => "wd_heading_spacing",
          ),



          //////////// Typography
          array(
               "type" => "dropdown",
               "heading" => esc_html__("Font Family", 'copallyt'),
               "param_name" => "wd_heading_font_family",
               'value' => $wd_fonts_array,
               "group" => "Typography",
          ),
          array(
               "type" => "dropdown",
               "heading"           =>   esc_html__("Font Style", 'copallyt'),
               "param_name"   =>   "wd_heading_font_style",
               'value' => array(
                    esc_html__('Normal', 'copallyt')  =>   'normal',
                    esc_html__('Italic','copallyt')        =>   'italic',
                    esc_html__('Inherit','copallyt')       =>   'inherit',
                    esc_html__('Initial','copallyt')       =>   'initial',
               ),
               "group" => "Typography"
          ),
          array(
               "type" => "dropdown",
               "heading"           =>   esc_html__("Font Weight", 'copallyt'),
               "param_name"   =>   "wd_heading_font_weight",
               'value' => array(
                    esc_html__('Default', 'copallyt') =>   '400',
                    '100'     =>   '100',
                    '200'     =>   '200',
                    '300'     =>   '300',
                    '500'     =>   '500',
                    '600'     =>   '600',
                    '700'     =>   '700',
                    '800'     =>   '800',
                    '900'     =>   '900',
               ),
               "group" => "Typography"
          ),
          array(
               "type" => "textfield",
               "class" => "",
               "heading" => esc_html__("Font Size", 'copallyt'),
               "param_name" => "wd_heading_font_size",
               "min" => 14,
               "suffix" => "px",
               "group" => "Typography",
          ),
          array(
               "type" => "colorpicker",
               "class" => "",
               "heading" => esc_html__("Font Color", 'copallyt'),
               "param_name" => "wd_heading_color",
               "value" => "",
               "group" => "Typography",
          ),
          array(
               "type" => "dropdown",
               "heading" => esc_html__("Text Transform", 'copallyt'),
               "param_name" => "wd_heading_text_transform",
               'value' => array(
                    esc_html__('Default', 'copallyt') =>   'None',
                    'lowercase'    =>   'Lowercase',
                    'uppercase'    =>   'Uppercase',
                    'capitalize'   =>   'Capitalize',
                    'inherit' =>   'Inherit',
               ),
               "group" => "Typography"
          ),
          array(
               "type" => "textfield",
               "class" => "",
               "heading" => esc_html__("Line Height", 'copallyt'),
               "param_name" => "wd_heading_line_height",
               "value" => "",
               "suffix" => "px",
               "group" => "Typography"
          ),
          array(
               "type" => "textfield",
               "class" => "",
               "heading" => esc_html__("Letter spacing", 'copallyt'),
               "param_name" => "wd_heading_letter_spacing",
               "value" => "",
               "suffix" => "px",
               "group" => "Typography"
          ),
          /////// Sub Title
          array(
               "type" => "dropdown",
               'value' => $wd_fonts_array,
               "heading" => esc_html__("Font Family", 'copallyt'),
               "param_name" => "wd_sub_heading_font_family",
               "group" => "Typography",
          ),
          array(
               "type" => "dropdown",
               "heading"           =>   esc_html__("Font Style", 'copallyt'),
               "param_name"   =>   "wd_sub_heading_font_style",
               'value' => array(
                    esc_html__('Normal', 'copallyt')  =>   'normal',
                    esc_html__('Italic','copallyt')        =>   'italic',
                    esc_html__('Inherit','copallyt')       =>   'inherit',
                    esc_html__('Initial','copallyt')       =>   'initial',
               ),
               "group" => "Typography"
          ),
          array(
               "type" => "dropdown",
               "heading"           =>   esc_html__("Font Weight", 'copallyt'),
               "param_name"   =>   "wd_sub_heading_font_weight",
               'value' => array(
                    esc_html__('Default', 'copallyt') =>   '400',
                    '100'     =>   '100',
                    '200'     =>   '200',
                    '300'     =>   '300',
                    '500'     =>   '500',
                    '600'     =>   '600',
                    '700'     =>   '700',
                    '800'     =>   '800',
                    '900'     =>   '900',
               ),
               "group" => "Typography"
          ),
          array(
               "type" => "textfield",
               "class" => "",
               "heading" => esc_html__("Font Size", 'copallyt'),
               "param_name" => "wd_sub_heading_font_size",
               "min" => 14,
               "suffix" => "px",
               "group" => "Typography",
          ),
          array(
               "type" => "colorpicker",
               "class" => "",
               "heading" => esc_html__("Font Color", 'copallyt'),
               "param_name" => "wd_sub_heading_color",
               "value" => "",
               "group" => "Typography",
          ),
          array(
               "type" => "dropdown",
               "heading" => esc_html__("Text Transform", 'copallyt'),
               "param_name" => "wd_sub_heading_text_transform",
               'value' => array(
                    esc_html__('Default', 'copallyt') =>   'None',
                    'lowercase'    =>   'Lowercase',
                    'uppercase'    =>   'Uppercase',
                    'capitalize'   =>   'Capitalize',
                    'inherit' =>   'Inherit',
               ),
               "group" => "Typography"
          ),
          array(
               "type" => "textfield",
               "class" => "",
               "heading" => esc_html__("Line Height", 'copallyt'),
               "param_name" => "wd_sub_heading_line_height",
               "value" => "",
               "suffix" => "px",
               "group" => "Typography"
          ),
          array(
               "type" => "textfield",
               "class" => "",
               "heading" => esc_html__("Letter spacing", 'copallyt'),
               "param_name" => "wd_sub_heading_letter_spacing",
               "value" => "",
               "suffix" => "px",
               "group" => "Typography"
          ),

          array(
               "type" => "textfield",
               "class" => "",
               "heading" => esc_html__("Extra class name", 'copallyt'),
               "param_name" => "heading_extraclass",
               "value" => "",
          ),


          $vc_add_css_animation

     )
) );