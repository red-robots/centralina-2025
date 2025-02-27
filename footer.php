	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    <?php  
      $contact_details = get_field('contact_details','option');
      $map_embed = get_field('map_embed','option');
      $social_media = get_field('social_media','option');
    ?>		
    <div class="wrapper">
      <div class="footer-columns">
        <?php if ($contact_details) { ?>
        <div class="footcol foot-contact-info">
          <div class="foot-title">Contact</div>
          <div class="foot-info">
            <?php foreach ($contact_details as $cd) { 
              $label = $cd['label'];
              $description = $cd['description'];
              $icon = $cd['icon'];
              if($description) { ?>
              <div class="info">
                <?php if ($icon) { ?><?php echo $icon ?><?php } ?>
                <?php if ($description) { ?>
                <div class="text"><?php echo $description ?></div>
                <?php } ?>
              </div>
              <?php } ?>
            <?php } ?>
          </div>
        </div>
        <?php } ?>

        <?php if ($map_embed ) { ?>
        <div class="footcol foot-contact-map">
          <div class="mapframe">
            <?php echo $map_embed ?>
          </div>
        </div>
        <?php } ?>
      </div>
      <?php if ($social_media) { ?>
      <div class="foot-social-media">
        <div class="foot-title">Follow</div>
        <?php foreach ($social_media as $sm) { ?>
          
        <?php } ?>
      </div>    
      <?php } ?>
    </div>
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
