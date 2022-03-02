<?php

//Constant with the directory path
define("INTRANET_FOLDER_PATH", get_stylesheet_directory());

//Extracting the css from the father theme and Bootstrap
function intranet_assets()
{
    wp_register_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css", []);
    wp_register_style("bootstrap-icons", "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css", []);
    wp_register_style("footer-style", get_template_directory_uri() . "/assets/css/footer.css", []);
    wp_register_style("header-style", get_template_directory_uri() . "/assets/css/header.css", []);
    wp_register_style("content-style", get_template_directory_uri() . "/assets/css/content.css", []);
    wp_enqueue_style("intranet-style", get_template_directory_uri() . "/style.css", ["bootstrap", "bootstrap-icons", "footer-style", "header-style", "content-style"], "1.0", "all");
}
add_action("wp_enqueue_scripts", "intranet_assets");

//Registering the main nav menu 
function intranet_register_main_menu()
{
    register_nav_menu("intranet_primary_menu", "Intranet Primary Menu");
}
add_action("init", "intranet_register_main_menu");

//Adding custom features
function intranet_theme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support(
        'custom-logo',
        [
            "width" => 170,
            "height" => 35,
            "flex-width" => true,
            "flex-height" => true,
        ]
    );
}

add_action("after_setup_theme", "intranet_theme_supports");

function intranet_add_sidebar()
{
    register_sidebar(
        array(
            'name' => 'Pie de página',
            'id' => 'pie-pagina',
            'before_widget' => '',
            'after_widget' => ''
        )
    );
}


add_action("widgets_init", "intranet_add_sidebar");
