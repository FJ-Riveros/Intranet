<?php

//Register the login route
function intranet_api_login()
{
  register_rest_route(
    "intranet/v1",
    "login",
    [
      "method"   => "POST",
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

  $user = wp_signon($credentials);

  if ($user->get_error_message() == "") {
    wp_redirect(home_url());
    exit;
  }

  return ["response" => $user->get_error_message()];
}
