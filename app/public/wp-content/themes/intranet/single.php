<?php
get_header();
?>
<div class="row">
  <div class="col-6">
    <h1><?= the_title(); ?></h1>
    <p class="text-justify"><?= wp_strip_all_tags(get_the_content()); ?>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu lobortis ipsum, ut faucibus libero. Praesent non tristique justo. Vestibulum tempus lectus ut ligula aliquam, et sollicitudin augue ornare. Suspendisse id felis id magna commodo finibus. Etiam ut elementum ex. Aenean sem magna, sagittis ut aliquam at, facilisis ac dolor. Nam ex odio, bibendum at elementum in, congue fringilla augue. Integer laoreet tristique pellentesque. Sed a pulvinar elit. Sed et blandit ex. Vestibulum id risus at augue ullamcorper commodo. Nullam ultrices gravida diam sit amet aliquet. Fusce sit amet maximus urna, ac tempus lorem. Quisque efficitur lectus quis massa posuere, non consectetur diam placerat. Nullam sit amet ultrices leo. Curabitur dignissim mollis pharetra.
      Nullam aliquet ipsum quis sapien blandit, quis laoreet nulla suscipit. Integer pretium venenatis justo, at finibus purus sagittis eu. Etiam non neque faucibus, suscipit leo in, accumsan mauris. In pellentesque risus libero, blandit pellentesque lectus auctor at. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam et mi mauris. Proin et ex orci. Quisque magna ligula, bibendum commodo viverra ut, mattis et magna. Nulla hendrerit erat vel egestas malesuada.</p>
  </div>
  <div class="col-6">
    <?= the_post_thumbnail() ?>
  </div>
</div>
<?php
get_footer();
