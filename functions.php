<?php 
/*
 * My Theme Function
 */



 //Theme Title
 add_theme_support('title-tag');


 //Theme CSS ans jQuery File calling
 function sujon_css_js_file_calling(){
    wp_register_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css', array(),'5.0.0','all');
    wp_register_style('custom',get_template_directory_uri().'/css/custom.css', array(),'1.0.0','all');
    wp_enqueue_style( 'bootstrap');
    wp_enqueue_style( 'custom');
    wp_enqueue_style('sujon-style', get_stylesheet_uri());

    //jQuery
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.js', array(), '5.0.0', 'true');
    wp_enqueue_script('main',get_template_directory_uri().'/js/main.js', array(), '1.0.0', 'true');
 };
 add_action('wp_enqueue_scripts','sujon_css_js_file_calling');


//  Google Font Enqueue 
function sujon_add_google_fonts(){
   wp_enqueue_style('sujon_google_fonts', 'https://fonts.googleapis.com/css2?family=Oswald&display=swap', false);
}
add_action('wp_enqueue_scripts', 'sujon_add_google_fonts');


//  Theme Function 
function sujon_customizar_register($wp_customize){

   // Header Area Function 
   $wp_customize->add_section('sujon_header_area', array(
      'title' => __('Header Area', 'sujonpramanik'),
      'description' => 'If you interested to update your header area, you can do it here',
   ));
   $wp_customize->add_setting('sujon_logo', array(
      'default' => get_bloginfo('template_directory'). '/img/wordpress.png',
   ));
   $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize, 'sujon_logo', array(
      'label' => 'Logo Upload',
      'description' => 'If you interested to change or update your logo, you can do it here',
      'setting' => 'sujon_logo',
      'section' => 'sujon_header_area',
   )));


   // Menu Position Option 
   $wp_customize -> add_section('sujon_menu_option', array(
      'title' => __('Menu Position Option', 'sujonpramanik'),
      'description' => 'If you interested to change your Menu Position, you can do it here',

   ));

   $wp_customize->add_setting('sujon_menu_position', array(
      'default' => 'right_menu',
   ));

   $wp_customize -> add_control('sujon_menu_position', array(
      'label' => 'Menu Position',
      'description' => 'Select Your Menu Position',
      'setting' => 'sujon_menu_position',
      'section' => 'sujon_menu_option',
      'type' => 'radio',
      'choices' => array(
         'left_menu' => 'Left Menu',
         'right_menu' => 'Right Menu',
         'center_menu' => 'Center Menu',
      ),
   ));


   // Footer Option 
   $wp_customize -> add_section('sujon_footer_option', array(
      'title' => __('Footer Option', 'sujonpramanik'),
      'description' => 'If you interested to change or update your Footer Settings, you can do it here',

   ));

   $wp_customize->add_setting('sujon_copyright_section', array(
      'default' => '&copy; Copyright 2023 | Sujon Pramanik',
   ));

   $wp_customize -> add_control('sujon_copyright_section', array(
      'label' => 'Copyright Text',
      'description' => 'If need you can update your copyright text from here',
      'setting' => 'sujon_copyright_section',
      'section' => 'sujon_footer_option',
   ));
}

add_action('customize_register', 'sujon_customizar_register');



// Menu Register 
register_nav_menu( 'main_menu', __('Main Menu', 'sujonpramanik' ) );


//Walker Menu Properties
// function sujon_nav_description($item_output, $item, $args) {
//    if( !empty ($item -> description)){
//       $item_output = str_replace( $args -> link_after . '</a>', '<span class="walker_nav">. $item -> description .</span>' . $args -> link_after . '</a>' , $item_output);
//    }
//    return $item_output;
// }
// add_filter('walker_nav_menu_start_el', 'sujon_nav_description', 10, 3);
