<?php

//Registering the specific script for the register form
function intranet_add_form_register_script()
{
  wp_register_script("form_register_script", plugins_url("../assets/js/register.js", __FILE__), []);

  /*We pass the intranet_url object to the register.js in order
  to redirect the user when the register is successful
  */
  wp_localize_script(
    "form_register_script",
    "intranet_url",
    [
      "home_url" => home_url()
    ]
  );
}
add_action("wp_enqueue_scripts", "intranet_add_form_register_script");

//Body of the register form
function intranet_add_form_register()
{
  wp_enqueue_script("form_register_script");
  return '
    <div class="container content">
      <form id="register-form">
        <div class="row d-flex justify-content-center">
          <div class="col-4 d-flex flex-column">
            <div class="form-group mb-4">
              <label for="username">Username</label>
              <input class="form-control" name="username" type="text" placeholder="Enter your username" required>
            </div>
            <div class="form-group mb-4">
              <label for="password">Password</label>
              <input class="form-control" name="password" type="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group mb-4">
              <label for="email">Email</label>
              <input class="form-control" name="email" type="email" placeholder="Enter your email" required>
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
            <div class="statusMsg mt-3"></div>
          </div>
        </div>
      </form>
    </div>
    ';
}

add_shortcode("intranet_form_register", "intranet_add_form_register");
