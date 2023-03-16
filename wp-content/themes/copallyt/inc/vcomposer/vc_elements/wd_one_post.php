<?php 

global $vc_add_css_animation;
/*--------------------one post---------------*/

$posts = get_posts(array('post_type' => 'portfolio'));
$posts_array = array();

foreach ( $posts as $key => $post ) {
	$posts_array[$post->post_title] = $post->ID;
}

vc_map( array(
    "name" => esc_html__("one post", 'copallyt'),
    "base" => "wd_one_post", 
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, 
    "is_container" => FALSE,
    "params" => array(         
		array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Title", 'copallyt'),
            "param_name" => "title",
        ),
        array(
            "type" => "textarea", // it will bind a textfield in WP
            "heading" => esc_html__("Description", 'copallyt'),
            "param_name" => "discription",
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Link to page", 'copallyt'),
            "param_name" => "link",
        ),
        array(
            "type" => "dropdown", // it will bind a textfield in WP
            "heading" => esc_html__("Project", 'copallyt'),
            "param_name" => "post_id", 
            "value" => $posts_array,
      			
			  ),
        $vc_add_css_animation
    )
) );