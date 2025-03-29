<?php if( get_row_layout() == 'two_column_name_listing' ) {
  $listing_details = get_sub_field('listing_details');
  $description = get_sub_field('description');
  $buttons = get_sub_field('buttons');
  //$disable_section = get_sub_field('disable_section');
  //$is_visible = ($disable_section) ? false : true;
  $section_class = ( $listing_details && $description ) ? 'twocol':'onecol';
  if( $listing_details || $description ) { ?>
  <section class="repeatable repeatable--<?php echo get_row_layout() ?> repeatable--<?php echo get_row_layout() ?>-<?php echo $ctr ?>">
    <div class="wrapper">
      <div class="flexwrap <?php echo $section_class ?>">
        <?php if ($listing_details) { ?>
        <div class="fxcol fxLeft">
          <div class="card-gradient">
            <ul class="listing">
            <?php foreach ($listing_details as $e) { 
              $name = $e['name'];
              $job = $e['job_title'];
              $email = $e['email'];
              $photo = $e['photo'];
              $row_class = ($name && $photo) ? 'twocol':'onecol';
              ?>
              <li class="<?php echo $row_class ?>">
                <?php if ($photo) { ?>
                <figure class="photo">
                  <img src="<?php echo $photo['url'] ?>" alt="<?php echo $photo['title'] ?>" />
                </figure>
                <?php } ?>

                <?php if ($name) { ?>
                <div class="info">
                  <h3 class="name"><?php echo $name ?></h3>
                  <?php if ($job) { ?>
                  <div class="job"><?php echo $job ?></div>
                  <?php } ?>
                  <?php if ($email) { ?>
                  <div class="email"><a href="mailto:<?php echo antispambot($email,1) ?>"><?php echo antispambot($email) ?></a></div>
                  <?php } ?>
                </div>
                <?php } ?>
              </li>
            <?php } ?>
            </ul>
          </div>
        </div> 
        <?php } ?>

        <?php if ($description) { ?>
        <div class="fxcol fxRight">
          <div class="details">
            <?php echo anti_email_spam($description); ?>
            
            <?php if ($buttons) { ?>
            <div class="button-wrapper">
              <?php foreach ($buttons as $b) { 
                $btn = $b['button'];
                $btnName = (isset($btn['title']) && $btn['title']) ? $btn['title'] : '';
                $btnLink = (isset($btn['url']) && $btn['url']) ? $btn['url'] : '';
                $btnTarget = (isset($btn['target']) && $btn['target']) ? $btn['target'] : '_self';
                if($btnName && $btnLink) { ?>
                <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>" class="button-outline"><span><?php echo $btnName ?></span></a>
                <?php } ?>
              <?php } ?>
            </div>
            <?php } ?>  
          </div>
        </div> 
        <?php } ?>
      </div>
    </div>
  </section>
  <?php } ?>
<?php } ?>