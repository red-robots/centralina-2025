<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<script>var pageTitle = '<?php get_the_title(); ?>'</script>
<?php 
if ( is_single() || is_page() ) { 
global $post;
$post_id = $post->ID;
$thumbId = get_post_thumbnail_id($post_id); 
$featImg = wp_get_attachment_image_src($thumbId,'full'); 
$altTitle = get_field('alternative_title',$post_id);
$pageTitle = ($altTitle) ? $altTitle : get_the_title();
?>
<!-- SOCIAL MEDIA META TAGS -->
<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
<meta property="og:url"		content="<?php echo get_permalink(); ?>" />
<meta property="og:type"	content="article" />
<meta property="og:title"	content="<?php echo $pageTitle; ?>" />
<meta property="og:description"	content="<?php echo (get_the_excerpt()) ? strip_tags(get_the_excerpt()):''; ?>" />
<?php if ($featImg) { ?>
<meta property="og:image"	content="<?php echo $featImg[0] ?>" />
<?php } ?>
<!-- end of SOCIAL MEDIA META TAGS -->
<?php } ?>
<script>
var siteURL = '<?php echo get_site_url();?>';
var currentURL = '<?php echo get_permalink();?>';
var params={};location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){params[k]=v});
</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<div id="overlay"></div>
	<a class="skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>
  <header id="masthead" class="site-header">
    <div class="header-top">
      <div class="header-right">
        <?php $header_top = get_field('header_top_links','option'); ?>
        <nav class="secondaryNav">
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
        <button class="searchBtn">
          <span class="sr">Search</span>
          <?xml version="1.0" encoding="UTF-8"?><svg viewBox="0 0 33.794 33.621" xmlns="http://www.w3.org/2000/svg"> <g transform="translate(-1824 -11)" fill="none" stroke="#fff" stroke-width="3" data-name="search icon"> <g transform="translate(1824 11)" data-name="Ellipse 1"> <circle cx="13.478" cy="13.478" r="13.478" stroke="none"/> <circle cx="13.478" cy="13.478" r="11.978" fill="none"/> </g> <line transform="translate(1846.7 33.5)" x2="9" y2="9" stroke-linecap="round" data-name="Line 1"/> </g> </svg>
        </button>
        </nav>
      </div>
    </div>
    <div class="header-inner">
      <div class="site-logo">
        <?php if( get_custom_logo() ) { ?>
          <?php the_custom_logo(); ?>
        <?php } else { ?>
          <a hef="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php } ?>
      </div>
      <div class="primary-navigation">
        <nav id="site-navigation" class="main-navigation" role="navigation">
          <?php  wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu','container_class'=>false, 'link_before'=>'<span>','link_after'=>'</span><i aria-hidden="true"></i>') ); ?>
        </nav>
      </div>
    </div>
	</header>
  
  <?php get_template_part("parts/mobile-navigation"); ?>

  <?php get_template_part("parts/hero"); ?>

	<div id="content" class="site-content">
