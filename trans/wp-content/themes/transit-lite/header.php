 <?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Transit Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php if(is_singular() && pings_open()) { ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' )); ?>">
<?php } ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#sitemain">
	<?php _e( 'Skip to content', 'transit-lite' ); ?>
</a>
<?php $hidetopbar = esc_html(get_theme_mod('hide_topbar', '1')); ?>
<?php if($hidetopbar == ''){ ?>
<div class="header-top">
  <div class="head-top-inner">
  		<?php if(get_theme_mod('time',true) != '') { ?>
     		<div class="top-left">
            	<span> <i class="fa fa-clock-o"></i> <?php echo esc_html(get_theme_mod('time')); ?></span> 
            </div><!-- top-left -->
        <?php } ?>
        <?php if(get_theme_mod('email',true) != '') { ?>
            <div class="top-right">
            	<i class="fa fa-envelope"></i> <a href="<?php echo esc_url('mailto:'.esc_attr(get_theme_mod('email'))); ?>"><?php echo esc_html(get_theme_mod('email')); ?></a>
            </div><!-- top-right -->
            <?php } ?>
            <div class="clear"></div>
  </div><!-- head-top-inner -->
</div><!--end header-top--> 
<?php } ?>


<div id="header">
	<div class="header-inner">
      <div class="logo">
           <?php transit_lite_the_custom_logo(); ?>
			    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>
					<?php $description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
						<p><?php echo esc_html($description); ?></p>
					<?php endif; ?>
      </div><!-- logo -->      
      
     <?php if(get_theme_mod('phone_text') != '' || get_theme_mod('phone') != '') { ?>              
    <div class="header_right"> 
        <div class="call-us">
            <img src="<?php echo esc_url(get_template_directory_uri())."/images/call.png"; ?>"><p><?php echo esc_html(get_theme_mod('phone_text')); ?></p>
            </div><!-- call-us -->
            <div class="call-number">
            	<h3><?php echo esc_html(get_theme_mod('phone')); ?></h3>
            </div><!-- call-number -->
            <div class="clear"></div>
    </div><!--header_right-->  
    <?php } ?>  
 <div class="clear"></div>
</div><!-- .header-inner-->
</div><!-- .header -->

<div class="prime-menu">
	<div class="prime-inner">
        <div class="toggle">
                <a class="toggleMenu" href="#">
                    <?php esc_attr_e('Menu','transit-lite'); ?>                
                </a>
         </div><!-- toggle -->    
        <div class="sitenav">                   
            <?php wp_nav_menu( array('theme_location' => 'primary') ); ?> 
        </div><!--.sitenav -->
        <div class="clear"></div>
      </div><!-- prime-inner -->
</div><!-- prime-menu -->