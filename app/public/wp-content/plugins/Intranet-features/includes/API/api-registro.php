<?php

//Register the route
function intranet_api_register()
{
  register_rest_route(
    "intranet/v1",
    "register",
    [
      "methods"   => "POST",
      "callback" => "intranet_api_register_resolver"
    ]
  );
}
add_action("rest_api_init", "intranet_api_register");

//Callback
function intranet_api_register_resolver($params)
{

  //Feedback of the registration
  $response = [
    "message"                 => "",
    "successful_registration" => false
  ];


  //Check if the username is already in use
  $validUsername = get_user_by("login", $params["username"]);

  //Check if the email is already in use
  $validEmail = get_user_by("email", $params["email"]);

  //Checking the credentials provided
  if ($validUsername) $response["message"] = "The username already exists";
  else if ($validEmail) $response["message"] = "The email already exists";
  else {

    //User credentials
    $args = [
      "user_login" => $params["username"],
      "user_pass"  => $params["password"],
      "first_name" => $params["first_name"],
      "last_name"  => $params["last_name"],
      "user_email" => $params["email"],
      "role"       => "employee"
    ];

    //Create the new user
    $insert_user = wp_insert_user($args);

    //If the new user registration is successful
    if (is_numeric($insert_user)) {
      $response["message"]                 = "The user was created!";
      $response["successful_registration"] =  true;
    }
  }

  return $response;
}
