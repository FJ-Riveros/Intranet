<?php
/*
This function takes the data from the daily tasks form and converts 
it intto a table that display that data.
*/
function createTasksTable($params)
{
  //Get the data from the form
  $data = $params->get_params();

  $observations = $data["observations"];

  //The structure of the table that shows the tasks from the employees
  $tasksTable =
    '
    <h2>' . ($observations == "" ? "" : "Observations") . '</h2>
    <p class="text-justify">' . $observations . '</p>
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Employee ID</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Task</th>
        </tr>
      </thead>
      <tbody>  
    ';

  //Employee variables
  $employeeID = 0;
  $employeeInfo = "";
  $employeeName = "";

  //Loop through every employee
  foreach ($data as $key => $singleData) {
    if ($key != "observations") {
      //Get the ID from the employee
      $employeeID = trim($key, "employee-");
      //Get the user
      $employeeInfo = get_userdata((int)$employeeID);

      $tasksTable .=
        '
      <tr class="' . ($singleData == '' ? 'table-danger' : '') . '">
        <th scope="row">' . $employeeID . '</th>
        <td>' . $employeeInfo->get("first_name") . '</td>
        <td>' . $employeeInfo->get("last_name") . '</td>
        <td>' . ($singleData == '' ? 'No task' : $singleData) . '</td>
      </tr>
    ';
    }
  }

  $tasksTable .=
    '
      </tbody>
    </table>
    ';

  return $tasksTable;
}
