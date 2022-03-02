<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo("charset") ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body>
  <?php wp_body_open(); ?>
  <header class="header">
    <div class="container">
      <div class="row">
        <div class="header__logo col-2">
          <a href="#">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/intranet.png" alt="menu icon" height="70" width="70">
          </a>
        </div>

        <div class="header__menu col-5 col-md-4 col-sm-8 offset-sm-2 offset-md-6 offset-5">
          <?php wp_nav_menu(
            [
              "menu" => 'menu-principal'
            ]
          ); ?>
        </div>
      </div>
    </div>
  </header>

  <main class="productos">
    <div class="container-fluid gx-5">