<?php

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

  var_dump($params);
  // $credentials = [
  //   "user_login"    => $params["username"],
  //   "user_password" => $params["password"],
  //   "remember"      => true
  // ];

  return "hola";
  //Try to login with the credentials provided
  // $user = wp_signon($credentials);

  // return $user->get_error_message();
}
