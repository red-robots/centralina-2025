<div id="mobileNavigation" class="mobileHeader">
  <div class="mobileHeaderInner">

    <div class="mobileMain">
      <div class="site-logo">
        <?php if( get_custom_logo() ) { ?>
          <?php the_custom_logo(); ?>
        <?php } else { ?>
          <a hef="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php } ?>
      </div>

      <div class="right-info">
        <button class="searchBtn">
          <span class="sr">Search</span>
          <?xml version="1.0" encoding="UTF-8"?><svg viewBox="0 0 33.794 33.621" xmlns="http://www.w3.org/2000/svg"> <g transform="translate(-1824 -11)" fill="none" stroke="#fff" stroke-width="3" data-name="search icon"> <g transform="translate(1824 11)" data-name="Ellipse 1"> <circle cx="13.478" cy="13.478" r="13.478" stroke="none"/> <circle cx="13.478" cy="13.478" r="11.978" fill="none"/> </g> <line transform="translate(1846.7 33.5)" x2="9" y2="9" stroke-linecap="round" data-name="Line 1"/> </g> </svg>
        </button>
        <button id="menuToggle"><span class="sr">Mobile Menu Toggle</span><span class="bar"></span></button>
      </div>
    </div>
    
    <div class="mobileMenuLinks">
      <?php $header_top = get_field('header_top_links','option'); ?>
      <nav class="mobileSecondaryNav">
      <?php if($header_top) { ?>
        <?php foreach($header_top as $h) { 
          $type = $h['type'];
          $link = $h['link'];
          $text = $h['text'];
          if($type=='link') { 
            $pageLink = (isset($link['url']) && $link['url']) ? $link['url'] : '';  
            $pageTitle = (isset($link['title']) && $link['title']) ? $link['title'] : '';  
            $pageTarget = (isset($link['target']) && $link['target']) ? $link['target'] : '_self';  
            if($pageLink && $pageTitle) { ?>
            <span class="info type-link"><a href="<?php echo $pageLink?>" target="<?php echo $pageTarget?>"><?php echo $pageTitle?></a></span>
            <?php } ?>
          <?php } else { ?>
            <?php if ($text) { ?>
            <span class="info type-link"><?php echo $text?></span>
            <?php } ?>
          <?php } ?>
        <?php } ?>
      <?php } ?>
      </nav>
      <nav class="mobilePrimaryNav" role="navigation">
        <?php  wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu','container_class'=>false ) ); ?>
      </nav>
    </div>

  </div>
</div>