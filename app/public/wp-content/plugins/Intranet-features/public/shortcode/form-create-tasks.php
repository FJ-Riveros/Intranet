<?php

//Registering the specific script for the create_tasks form
function intranet_add_form_create_tasks_script()
{
  wp_register_script("form_create_tasks_script", plugins_url("../assets/js/create_tasks.js", __FILE__), []);

  /*Passing the intranet_url object to the create_tasks.js in order
  to redirect the user when the creation of the task is successful
  */
  wp_localize_script(
    "form_create_tasks_script",
    "intranet_url",
    [
      "home_url" => home_url()
    ]
  );
}
add_action("wp_enqueue_scripts", "intranet_add_form_create_tasks_script");

//Body of the create tasks form
function intranet_add_task_creator()
{
  wp_enqueue_script("form_create_tasks_script");

  //Get the users with the role "employee"
  $users  = get_users(["role__in" => "employee"]);

  //Create the form structure depending on how many employees are available
  $userFields = "";
  foreach ($users as $user) {
    $userFields .=
      '
      <div class="form-group mb-4">
        <label for="employee-' . $user->data->ID . '">' . $user->data->display_name . '</label>
        <input class="form-control" name="employee-' . $user->data->ID . '"" type="text" list="tasks">
      </div>
      ';
  }

  //Form body
  return '
    <div class="container">
      <form id="create-tasks-form"  method="POST">
        <div class="row d-flex justify-content-center">
          <div class="col-4 d-flex flex-column">'
            . $userFields .
            '
            <datalist id="tasks">
              <option>Writing and testing code for new programs</option>
              <option>Updating existing programs</option>
              <option>Identifying and correcting coding errors</option>
              <option>Secure programs against cybersecurity threats</option>
              <option>Rewriting programs for different operating systems</option>
            </datalist>
            <button type="submit" class="btn btn-primary">Submit</button>
            <div class="statusMsg"></div>
          </div>
        </div>
      </form>
    </div>
    ';
}

add_shortcode("intranet_form_create_tasks", "intranet_add_task_creator");
