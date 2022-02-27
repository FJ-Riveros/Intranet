<?php

//Register the login route
function intranet_api_login()
{
  register_rest_route(
    "intranet/v1",
    "login",
    [
      "methods"   => "POST",
      "callback" => "intranet_api_login_resolver"
    ]
  );
}
add_action("rest_api_init", "intranet_api_login");

//Callback
function intranet_api_login_resolver($params)
{

  $credentials = [
    "user_login"    => $params["username"],
    "user_password" => $params["password"],
    "remember"      => true
  ];

  //Try to login with the credentials provided
  $user = wp_signon($credentials);

  return $user->get_error_message();
}
