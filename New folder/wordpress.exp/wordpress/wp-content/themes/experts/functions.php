<?php

//add_action('wp_enqueue_scripts','experts_add_assets');

//function experts_add_assets()
//{

  //  wp_register_style('experts-main-style', get_template)
//}







add_action('after_setup_theme','experts_setup');

function experts_setup()
{

    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('post-formats',['gallery','video','audio']);


}