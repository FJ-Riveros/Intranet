<?php
get_header();
?>
<div class="row daily-tasks d-flex flex-column justify-content-between">
  <div class="col daily-tasks-head d-inline-block">
    <?php
    $post_date = substr(the_title("", "", false), 11);
    ?>
    <h1 class="text-center daily-tasks-title mt-4">Daily Tasks</h1>
    <h4 class="text-center"><?= $post_date ?></h4>
  </div>
  <div class="col d-inline-block">
    <?php
    the_content();
    ?>
  </div>
</div>
<?php
get_footer();
