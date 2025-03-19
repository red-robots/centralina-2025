<?php if( get_row_layout() == 'postcard' ) {
  $details_position = get_sub_field('details_position');
  $details = get_sub_field('details');
  $featured_image = get_sub_field('featured_image');
  $textcolor = get_sub_field('textcolor');
  $bgcolor = get_sub_field('bgcolor');

  $is_split = ($details && $featured_image) ? 'half' : 'full';
  $disable_section = get_sub_field('disable_section');
  $is_visible = ($disable_section) ? false : true;
  if( $is_visible && ($details || $featured_image) ) { ?>
  <style>
    .repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?> {
      background-color: <?php echo $bgcolor ?>;
      color:<?php echo $textcolor ?>
    }
    .repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?> .textBlock h2,
    .repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?> .textBlock h3,
    .repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?> .textBlock p {
      color:<?php echo $textcolor ?>
    }
    .repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?> .textBlock a {
      color:<?php echo $textcolor ?>
    }
  </style>
  <section class="repeatable repeatable--<?php echo get_row_layout() ?> repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?>">
    <div class="flexwrap details-<?php echo $details_position ?> <?php echo $is_split ?>">
      <?php if ($details) { ?>
      <div class="flexcol textBlock">
        <div class="inner"><?php echo anti_email_spam($details); ?></div>
      </div>
      <?php } ?>
      <?php if ($featured_image) { ?>
      <div class="flexcol imageBlock">
        <div class="image" style="background-image:url('<?php echo $featured_image['url'] ?>')"></div>
      </div>
      <?php } ?>
    </div>
  </section>
  <?php } ?>
<?php } ?>