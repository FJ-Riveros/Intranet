<?php

//Registering the specific script for the login form
function intranet_add_form_login_script()
{
  wp_register_script("form_login_script", plugins_url("../assets/js/login.js", __FILE__), []);

  /*We pass the intranet_url object to the login.js in order
  to redirect the user when the login is successful
  */
  wp_localize_script(
    "form_login_script",
    "intranet_url",
    [
      "home_url" => home_url()
    ]
  );
}
add_action("wp_enqueue_scripts", "intranet_add_form_login_script");

//Body of the login form
function intranet_add_form_login()
{
  wp_enqueue_script("form_login_script");

  return '
    <div class="container">
      <form id="login-form" action="" method="POST">
        <div class="row d-flex justify-content-center">
          <div class="col-4 d-flex flex-column">
            <div class="form-group mb-4">
              <label for="username">Username</label>
              <input class="form-control" name="username" type="text" placeholder="Enter your username">
            </div>
            <div class="form-group mb-4">
              <label for="password">Password</label>
              <input class="form-control" name="password" type="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="' . get_permalink(get_page_by_title("Register")) . '">Not registered?</a>
            <div class="statusMsg"></div>
          </div>
        </div>
      </form>
    </div>
    ';
}

add_shortcode("intranet_form_login", "intranet_add_form_login");
