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
require_once INTRANET_PLUGIN_FOLDER_PATH . "/public/shortcode/form-create-tasks.php";

//API REST routes
require_once INTRANET_PLUGIN_FOLDER_PATH . "/includes/API/api-registro.php";
require_once INTRANET_PLUGIN_FOLDER_PATH . "/includes/API/api-login.php";
require_once INTRANET_PLUGIN_FOLDER_PATH . "/includes/API/api-create-tasks.php";

//Add the employee role when the plugin is activated
function add_roles_on_plugin_activation()
{
  add_role("employee", "Employee", [
    "read"       => true,
    "edit_posts" => false
  ]);
}

register_activation_hook(__FILE__, "add_roles_on_plugin_activation");


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


// wp_insert_post([
//   "post_title" => "Esto es una prueba",
//   "post_content" => "<h1>Holaaa</h1>",
//   "post_type" => "intranet_tasks"
// ]);