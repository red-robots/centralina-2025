<?php
/**
 * Template Name: Webinars/Events
 */
get_header(); 
?>

<main id="main" class="site-main webinars" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php  
    $staff_assigned = get_field('staff_assigned');
    $section_title1 = get_field('section_title1');
    $intro_text1 = get_field('intro_text1');
    $post_type1 = get_field('post_type1');
    if($post_type1) {
      $event_args = array(
        'posts_per_page'   => 3,
        'post_type'        => $post_type1,
        'post_status'      => 'publish',
        'meta_key' => 'start_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
      );
      $events = new WP_Query($event_args);
    }
    ?>

    <?php if($section_title1 || $events->have_posts()) { 
      $count = $events->found_posts;
    ?>
    <section class="section-post-feeds post-<?php echo $post_type1 ?>">
      <div class="wrapper">
      <?php if($section_title1) { ?>
        <div class="section-title"><h2><?php echo $section_title1 ?></h2></div>
      <?php } ?>
      <?php if ( $events->have_posts() ) {  ?>
        <div class="post-feeds">
          <div class="leftCol">
            <?php $i=1; while ( $events->have_posts() ) : $events->the_post(); 
              $id = get_the_ID();
              $thumbID = get_post_thumbnail_id($id);
              $img = ($thumbID) ? wp_get_attachment_image_src($thumbID,'large') : '';
              $imgAlt = ($img) ? get_the_title($thumbID) : '';
              $start_date = get_field('start_date', $id);
              $start_date = ($start_date) ? date('F j, Y', strtotime($start_date)) : '';
              $content = ( get_the_content() ) ? strip_tags(get_the_content()) : '';
              ?>
              <?php if ($i==1) { ?>
              <figure class="post-image">
                <a href="<?php echo get_permalink() ?>">
                  <img src="<?php echo $img[0] ?>" alt="<?php echo $imgAlt ?>">
                </a>
              </figure>
              <div class="details">
                <?php if ($start_date) { ?>
                <div class="event-date"><?php echo $start_date ?></div>
                <?php } ?>
                <h3><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></h3>
                <?php if ( get_the_content() ) { ?>
                <div class="excerpt">
                  <?php echo shortenText($content, 250, ' '); ?>
                </div>
                <?php } ?>
              </div>
              <?php } ?>
            <?php $i++; endwhile; wp_reset_postdata(); ?>
          </div>

          <div class="rightCol">
            <?php if ($staff_assigned) { 
              $pid = $staff_assigned->ID;
              $name = $staff_assigned->post_title;
              $job = get_field('title', $pid);
              $email = get_field('email', $pid);
              $photo = get_field('photo', $pid);
              $row_class = ($name && $photo) ? 'twocol':'onecol';
            ?>
            <div class="staff-infocard">
              <div class="card-gradient">
                <ul class="listing">
                  <li class="<?php echo $row_class ?>">
                    <figure class="photo">
                      <?php if ( isset($photo['url']) ) { ?>
                      <img src="<?php echo $photo['url'] ?>" alt="<?php echo $photo['title'] ?>" />
                      <?php } else { ?>
                      <span class="no-image"><i class="fa-solid fa-user"></i></span>
                      <?php } ?>
                    </figure>

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
                </ul>
              </div>
            </div>
            <?php } ?>
            <ul class="feeds">
            <?php $n=1; while ( $events->have_posts() ) : $events->the_post(); 
              $id = get_the_ID();
              $thumbID = get_post_thumbnail_id($id);
              $img = ($thumbID) ? wp_get_attachment_image_src($thumbID,'large') : '';
              $imgAlt = ($img) ? get_the_title($thumbID) : '';
              $start_date = get_field('start_date', $id);
              $start_date = ($start_date) ? date('F j, Y', strtotime($start_date)) : '';
              $content = ( get_the_content() ) ? strip_tags(get_the_content()) : '';
            ?>
              <?php if ($n>1) { ?>
                <li class="item">
                  <div class="inside">
                    <?php if ($img) { ?>
                    <figure class="post-image">
                      <a href="<?php echo get_permalink() ?>">
                        <img src="<?php echo $img[0] ?>" alt="<?php echo $imgAlt ?>">
                      </a>
                    </figure> 
                    <?php } ?>

                    <div class="details">
                      <?php if ($start_date) { ?>
                      <div class="event-date"><?php echo $start_date ?></div>
                      <?php } ?>
                      <h3><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></h3>
                      <?php if ( get_the_content() ) { ?>
                      <div class="excerpt">
                        <?php echo shortenText($content, 60, ' '); ?>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                </li>
              <?php } ?>
            <?php $n++; endwhile; wp_reset_postdata(); ?>
            </ul>
          </div>
        </div>
      <?php } ?>
      </div>
    </section>  
    <?php } ?>

  <?php endwhile; ?>

	<?php if( have_rows('flexible_content') ) {  ?>
  <div class="flexible-content-wrapper">
    <?php $ctr=1; while( have_rows('flexible_content') ): the_row(); ?>
      
    <?php include( locate_template('parts/content-repeater.php') ); ?>

    <?php $ctr++; endwhile; ?>
  </div>
  <?php } ?>

</main>

<?php
get_footer();