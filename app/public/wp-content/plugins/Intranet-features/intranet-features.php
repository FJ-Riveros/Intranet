<?php
/*
   Plugin Name: Intranet Features
   Plugin URI: 
   Description: A plugin made to complement the functionalities from the consulting-child-theme made by FJ-Riveros. It includes a custom Post Type "Assign Tasks" and the register and login functionalities.
   Version: 1.0
   Author: FJ-Riveros
   Author URI: https://github.com/FJ-Riveros
   License: GPL2
   */

define("INTRANET_PLUGIN_FOLDER_PATH", plugin_dir_path(__FILE__));

// Shortcodes/Forms
require_once INTRANET_PLUGIN_FOLDER_PATH . "/public/shortcode/form-login.php";
require_once INTRANET_PLUGIN_FOLDER_PATH . "/public/shortcode/form-register.php";

//API REST routes
require_once INTRANET_PLUGIN_FOLDER_PATH . "/includes/API/api-registro.php";
require_once INTRANET_PLUGIN_FOLDER_PATH . "/includes/API/api-login.php";

//Creation of the PT that assign tasks to the workers
function intranet_create_pt_tasks()
{
  $args = [
    "labels"              =>
    [
      "name"          => "Tasks",
      "singular_name" => "Task",
    ],
    "public"              => true,
    "rewrite"             => ["slug" => "tasks"],
    "show_in_rest"        => true,
    "show_in_menu"        => true,
    "menu_icon"           => "dashicons-schedule",
    "menu_position"       => 2,
    "hierarchical"        => true,
    'publicly_queryable'  => true,
    "capability_type"     => "page",
    "has_archive"         => false,
    "supports"            => [
      "title", "editor", "custom-fields", "thumbnail"
    ],
  ];
  register_post_type("intranet_tasks", $args);
  flush_rewrite_rules();
}

add_action("init", "intranet_create_pt_tasks");
