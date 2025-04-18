<?php if( get_row_layout() == 'cards_pattern_background' ) {
  $numcols = get_sub_field('numcols');
  $numcols = ($numcols) ? $numcols : 3;
  $cards = get_sub_field('cards');
  $bgcolor = get_sub_field('bgcolor');
  $bgpattern = get_sub_field('bgpattern');
  $has_pattern = ($bgpattern) ? ' has-pattern':' no-pattern';
  $disable_section = get_sub_field('disable_section');
  $is_visible = ($disable_section) ? false : true;
  if( $is_visible && $cards ) { ?>
  <style>
    .repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?> {
      background-color: <?php echo $bgcolor ?>;
    }
  </style>
  <section class="repeatable repeatable--<?php echo get_row_layout() ?> repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?><?php echo $has_pattern ?>">
    <div class="wrapper">
      <div class="infoCards numcols-<?php echo $numcols ?>">
        <?php foreach ($cards as $c) { 
          $title = $c['title'];
          $details = $c['text'];
          $image = $c['image'];
          if($title || $details || $image) { ?>
          <div class="infoCard">
            <div class="inner">
              <?php if ($image) { ?>
              <figure class="image">
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>" />
              </figure>
              <?php } ?>
              <?php if($title || $details) { ?>
              <div class="infoText">
                <?php if ($title) { ?>
                  <h2 class="h2"><?php echo $title ?></h2>
                <?php } ?>
                <?php if ($details) { ?>
                <div class="details"><?php echo anti_email_spam($details); ?></div>
                <?php } ?>
              </div>
              <?php } ?>
            </div>
          </div>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </section>
  <?php } ?>
<?php } ?>