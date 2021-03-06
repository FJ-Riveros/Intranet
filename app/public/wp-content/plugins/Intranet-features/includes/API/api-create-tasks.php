<?php
require_once  INTRANET_PLUGIN_FOLDER_PATH . "public/assets/helpers/daily_tasks_table.php";
//Register the login route
function intranet_api_create_tasks()
{
  register_rest_route(
    "intranet/v1",
    "create_tasks",
    [
      "methods"   => "POST",
      "callback" => "intranet_api_create_tasks_resolver"
    ]
  );
}
add_action("rest_api_init", "intranet_api_create_tasks");

//Callback
function intranet_api_create_tasks_resolver($params)
{

  //Output to display in the frontend
  $response = "You already have a daily task for today.";

  //If there is already a daily task for today, return it
  $checkIfAlreadyExist = get_posts([
    "post_type"    => "intranet_tasks",
    "title"        => "Daily Tasks " . date("d/m/Y")
  ]);

  //If there is not a task for today, create it
  if (count($checkIfAlreadyExist) <= 0) {
    /*
    Function from the file ../public/assets/helpers/daily_tasks_table.php
    that takes the data from the form and transfer it to a table
    */
    $content = createTasksTable($params);

    //Create a new object from the CPT create_tasks
    $response =
      wp_insert_post([
        "post_title"    => "Daily Tasks " . date("d/m/Y"),
        "post_content"  => $content,
        "post_type"     => "intranet_tasks",
        "post_status"   => "publish"
      ]);
  }

  /*
  Returns int if the instance was created successfully or a string
  if there was an error
  */
  return $response;
}
