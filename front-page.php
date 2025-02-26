<?php
get_header(); 
?>
<main id="main" class="site-main" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
  <h1 style="display:none;"><?php the_title(); ?></h1>
  
  <?php /* CTAS */ ?>
  <?php if ( $ctas = get_field('ctas') ) { ?>
  <section class="ctas-section">
    <div class="wrapper">
      <div class="infoCards">
      <?php foreach ($ctas as $cta) { 
        $icon = $cta['icon'];
        $title = $cta['title'];
        $text = $cta['text'];
        $btn = $cta['button'];
        $btnTitle = (isset($btn['title']) && $btn['title']) ? $btn['title'] : '';
        $btnLink = (isset($btn['url']) && $btn['url']) ? $btn['url'] : '';
        $btnTarget = (isset($btn['target']) && $btn['target']) ? $btn['target'] : '_self';
        if ($title || $text) {  ?>
        <div class="infoCard">
          <div class="inside">
            <div class="top">
              <?php if ($icon) { ?>
              <div class="infoIcon"><span style="background-image: url('<?php echo $icon['url'] ?>');"></span></div>  
              <?php } ?>
              <?php if ($title) { ?>
              <div class="infoTitle"><?php echo $title ?></div>  
              <?php } ?>
              <?php if ($text) { ?>
              <div class="infoText"><?php echo $text ?></div>  
              <?php } ?>
            </div>
            <?php if ($btnTitle && $btnLink) { ?>
            <div class="infoButton">
              <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>" class="btn-default"><?php echo $btnTitle ?></a>
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

  <?php /* MAKING DIFFERENCE */ ?>
  <?php  
  $row2_intro = get_field('row2_intro');
  $row2_buttons = get_field('row2_buttons');
  $row2_data = get_field('row2_accordion');
  $row2_feat_image = get_field('row2_featured_image');
  $row2_title = (isset($row2_data['title']) && $row2_data['title']) ? $row2_data['title'] : '';
  $row2_accordion = (isset($row2_data['accordion_items']) && $row2_data['accordion_items']) ? $row2_data['accordion_items'] : '';
  ?>
  <?php if ($row2_intro || $row2_accordion) { ?>
  <section class="intro-section">
    <div class="wrapper">
      <div class="columns">
        <?php if ($row2_intro) { ?>
        <div class="fcol fcol1">
          <div class="textwrap"><?php echo anti_email_spam($row2_intro); ?></div>
          <?php if ($row2_buttons) { ?>
          <div class="buttons">
            <?php foreach ($row2_buttons as $b) { 
              $btn = $b['button'];
              $btnName = (isset($btn['title']) && $btn['title']) ? $btn['title'] : '';
              $btnLink = (isset($btn['url']) && $btn['url']) ? $btn['url'] : '';
              $btnTarget = (isset($btn['target']) && $btn['target']) ? $btn['target'] : '';
              if( $btnName && $btnLink ) { ?>
              <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>" class="btn-default"><?php echo $btnName ?></a>
              <?php } ?>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
        
        <?php if ($row2_accordion) { ?>
        <div class="fcol fcol2">
          <?php if ($row2_feat_image) { ?>
          <div class="featured-image clear">
            <figure>
              <img src="<?php echo $row2_feat_image['url'] ?>" alt="<?php echo $row2_feat_image['title'] ?>">
            </figure>
          </div>
          <?php } ?>

          <?php if ($row2_title || $row2_accordion) { ?>
          <div class="infobox">
            <?php if ($row2_title) { ?>
            <h3 class="h3"><span><?php echo $row2_title ?></span></h3>
            <?php } ?>

            <?php if ($row2_accordion) { ?>
            <div class="collapsible-wrapper">
              <ul class="collapsible">
              <?php $i=1; foreach ($row2_accordion as $a) { 
                $a_title = $a['title'];
                $a_details = $a['details'];
                $panelId = 'collapsible-item--' . $i;
                if($a_title) { ?>
                <li class="collapsible-item">
                  <button class="collapsible-title" aria-expanded="false" aria-controls="<?php echo $panelId ?>"><span><?php echo $a_title ?></span><i class="arrow"></i></button>
                  <div id="<?php echo $panelId ?>" class="collapsible-content">
                    <?php if ($a_details) { ?>
                    <?php echo anti_email_spam($a_details); ?>  
                    <?php } ?>
                  </div>
                </li>
                <?php $i++; } ?>
              <?php } ?>
              </ul>
            </div>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <?php } ?>

  <?php endwhile; ?>
</main>

<?php
get_footer();
