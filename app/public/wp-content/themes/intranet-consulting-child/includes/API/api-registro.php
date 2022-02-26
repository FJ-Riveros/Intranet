<?php

//Register the route
function intranet_api_register()
{
  register_rest_route(
    "intranet/v1",
    "register",
    [
      "method"   => "POST",
      "callback" => "intranet_api_register_resolver"
    ]
  );
}
add_action("rest_api_init", "intranet_api_register");

//Callback
function intranet_api_register_resolver($params)
{

  $response = "The user was created!";

  //Check if the username is already in use
  $validUsername = get_user_by("login", $params["username"]);

  //Check if the email is already in use
  $validEmail = get_user_by("email", $params["email"]);

  //Available credentials?
  if ($validUsername) $response = "The username already exists";
  else if ($validEmail) $response = "The email already exists";
  else {
    //User credentials
    $args = [
      "user_login" => $params["username"],
      "user_pass"  => $params["password"],
      "user_email" => $params["email"],
      "role"       => "staff"
    ];

    //Create the new user
    wp_insert_user($args);
  }

  return ["response" => $response];
}
