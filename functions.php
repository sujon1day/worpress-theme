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

//  Theme Function 
function sujon_customizar_register($wp_customize){
   $wp_customize->add_section('sujon_header_area', array(
      'title' => 
   ));
}