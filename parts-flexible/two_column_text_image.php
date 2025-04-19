<?php if( get_row_layout() == 'two_column_text_image' ) {
  $text = get_sub_field('text');
  $image = get_sub_field('image');
  $columnClass = ($text && $image) ? 'half' : 'full';
  $disable_section = get_sub_field('disable_section');
  $is_visible = ($disable_section) ? false : true;
  if( $is_visible && $text ) { ?>
  <section class="repeatable repeatable--<?php echo get_row_layout() ?> repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?>">
    <div class="wrapper">
      <div class="flexwrap <?php echo $columnClass ?>">
        <?php if ($text) { ?>
          <div class="textCol"><?php echo anti_email_spam($text); ?></div>
        <?php } ?>
        <?php if ($image) { ?>
          <div class="imageCol">
            <figure>
              <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
            </figure>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <?php } ?>
<?php } ?>