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

  $content = createTasksTable($params);

  // //Get the data from the form
  // $data = $params->get_params();

  // //The structure of the table that shows the tasks from the employees
  // $content =
  //   '
  //   <table class="table table-striped">
  //     <thead class="thead-dark">
  //       <tr>
  //         <th scope="col">Employee ID</th>
  //         <th scope="col">Employee</th>
  //         <th scope="col">Task</th>
  //       </tr>
  //     </thead>
  //     <tbody>  
  //   ';

  // //Employee variables
  // $employeeID = 0;
  // $employeeInfo = "";
  // $employeeName = "";
  // foreach ($data as $key => $singleData) {

  //   //Get the ID from the employee
  //   $employeeID = trim($key, "employee-");
  //   //Get the user
  //   $employeeInfo = get_userdata((int)$employeeID);
  //   //Get the employee name
  //   $employeeName =  $employeeInfo->get("display_name");

  //   $content .=
  //     '
  //     <tr>
  //       <th scope="row">' . $employeeID . '</th>
  //       <td>' . $employeeName . '</td>
  //       <td>' . $singleData . '<td>
  //     </tr>
  //   ';
  // }

  // $content .=
  //   '
  //     </tbody>
  //   </table>
  //   ';

  //Create a new object from the CPT create_tasks
  $new_daily_tasks_instance =
    wp_insert_post([
      "post_title" => "Daily Tasks " . date("d/m/Y"),
      "post_content" => $content,
      "post_type" => "intranet_tasks"
    ]);

  //Returns int if the instance was created successfully or WP_ERROR_OBJECT
  //if there was an error
  return $new_daily_tasks_instance;
}
