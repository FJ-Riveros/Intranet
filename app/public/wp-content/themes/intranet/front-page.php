<?php

get_header();
?>
<div class="container content principal">
  <div class="banner row">
    <h1 class="text-center col-12">Our Services</h1>
    <p class="text-center col-6 offset-3">We lead the digital transformation of companies worldwide driven by the Top 1% of Tech Talent, from fully managed teams to individual expert Engineers.</p>
  </div>

  <div class="row gy-5">
    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post();
    ?>
        <div class="post__card col-5 offset-1 d-flex justify-content-center flex-column align-items-center">
          <?= the_post_thumbnail() ?>
          <h3 class="box__title mt-2"><?= the_title() ?></h3>
          <?= the_content() ?>
        </div>
    <?php
      }
    }
    ?>
  </div>
</div>
<?php

get_footer();
?>