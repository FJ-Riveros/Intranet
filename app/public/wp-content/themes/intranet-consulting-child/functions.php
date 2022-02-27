<?php

//Constant with the directory path
define("INTRANET_FOLDER_PATH", get_stylesheet_directory());

//Extracting the css from the father theme and Bootstrap
function intranet_assets()
{
    $parent_style = "parent-style";
    wp_register_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css", []);
    wp_enqueue_style($parent_style, get_template_directory_uri() . "/style.css", ["bootstrap"], "1.0", "all");
}
add_action("wp_enqueue_scripts", "intranet_assets");

//Registering the main nav menu 
function intranet_register_main_menu()
{
    register_nav_menu("intranet_primary_menu", "Intranet Primary Menu");
}
add_action("init", "intranet_register_main_menu");
