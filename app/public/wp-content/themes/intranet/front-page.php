<?php

get_header();
?>
<div class="container content principal">
  <div class="banner row d-flex justify-content-center">
    <h1 class="text-center col-12">Our Services</h1>
    <p class="text-center col-12 col-lg-6 ">We lead the digital transformation of companies worldwide driven by the Top 1% of Tech Talent, from fully managed teams to individual expert Engineers.</p>
  </div>

  <div class="row gy-5 d-flex justify-content-around mt-4">
    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post();
    ?>
        <div class="post__card col-12 col-lg-5 d-flex justify-content-around flex-column align-items-center">
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