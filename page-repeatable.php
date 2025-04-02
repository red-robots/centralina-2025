<?php
/**
 * Template Name: Flexible Content
 */
get_header(); 
?>

<main id="main" class="site-main" role="main">

  <?php while ( have_posts() ) : the_post(); ?>
  <?php endwhile; ?>

	<?php if( have_rows('flexible_content') ) {  ?>
  <div class="flexible-content-wrapper">
    <?php $ctr=1; while( have_rows('flexible_content') ): the_row(); ?>
      
    <?php 
      include( locate_template('parts-flexible/intro.php') ); 
      include( locate_template('parts-flexible/postcard.php') ); 
      include( locate_template('parts-flexible/two_column_text.php') ); 
      include( locate_template('parts-flexible/affiliations.php') ); 
      include( locate_template('parts-flexible/fullwidth_text_content.php') ); 
      include( locate_template('parts-flexible/two_column_name_listing.php') ); 
      include( locate_template('parts-flexible/multiple_cards.php') ); 
      include( locate_template('parts-flexible/two_column_contact_info.php') ); 
    ?>

    <?php $ctr++; endwhile; ?>
  </div>
  <?php } ?>

</main>

<?php
get_footer();