<?php

function createTasksTable($params)
{
  //Get the data from the form
  $data = $params->get_params();

  //The structure of the table that shows the tasks from the employees
  $tasksTable =
    '
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Employee ID</th>
          <th scope="col">Employee</th>
          <th scope="col">Task</th>
        </tr>
      </thead>
      <tbody>  
    ';

  //Employee variables
  $employeeID = 0;
  $employeeInfo = "";
  $employeeName = "";
  foreach ($data as $key => $singleData) {

    //Get the ID from the employee
    $employeeID = trim($key, "employee-");
    //Get the user
    $employeeInfo = get_userdata((int)$employeeID);
    //Get the employee name
    $employeeName =  $employeeInfo->get("display_name");

    $tasksTable .=
      '
      <tr>
        <th scope="row">' . $employeeID . '</th>
        <td>' . $employeeName . '</td>
        <td>' . $singleData . '<td>
      </tr>
    ';
  }

  $tasksTable .=
    '
      </tbody>
    </table>
    ';

  return $tasksTable;
}
