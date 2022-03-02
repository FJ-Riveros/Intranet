<?php

get_header();
?>
<div class="container mt-4">
  <div class="banner row">
    <h2 class="text-center col-12">Our Services</h2>
    <p class="text-center col-6 offset-3">We lead the digital transformation of companies worldwide driven by the Top 1% of Tech Talent, from fully managed teams to individual expert Engineers.</p>
  </div>
</div>
<div class="row">
  <?php
  if (have_posts()) {
    while (have_posts()) {
      the_post();
  ?>
      <div class="col-5 offset-1 d-flex justify-content-center flex-column align-items-center">
        <?= the_post_thumbnail() ?>
        <h3><?= the_title() ?></h3>
        <p><?= the_content() ?></p>
      </div>
  <?php

    }
  }
  ?>
</div>
<?php

get_footer();
?>