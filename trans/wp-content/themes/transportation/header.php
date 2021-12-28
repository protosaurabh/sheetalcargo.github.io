<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Transportation
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
	<?php _e( 'Skip to content', 'transportation' ); ?>
</a>

<?php
	$hidetophead = get_theme_mod('transport_hide_tophead',true);
	if( $hidetophead == '' ){
		
		$gettophrs = get_theme_mod('transport_th_wrkhrs');
		$gettopmail = get_theme_mod('transport_th_mail');
		$gettopphn = get_theme_mod('transport_th_phn');
		$gettopctatxt = get_theme_mod('transport_th_cttxt');
		$gettopctalnk = get_theme_mod('transport_th_ctlnk');
		
		echo '<div class="header-top"><div class="container"><div class="flex-box">';
			echo '<div class="header-top-left">';
				if( !empty( $gettophrs ) ){
					echo '<span><i class="fa fa-clock-o"></i> '.$gettophrs.'</span>';
				}if( !empty( $gettopmail ) ){
					echo '<span><i class="fa fa-envelope-o"></i> '.$gettopmail.'</span>';
				}if( !empty( $gettopphn ) ){
					echo '<span><i class="fa fa-phone"></i> '.$gettopphn.'</span>';
				}
			echo'</div>';
			if( !empty( $gettopctatxt ) ){
				echo '<div class="header-top-right"><div class="cta-btn"><a href="'.esc_url($gettopctalnk).'">'.$gettopctatxt.'</a></div></div>';
			}
		echo '</div></div></div>';
	}
?>

<header id="header" class="header">
	<div class="container">
		<div class="flex-box">
			
			<div class="header-left">
				<div class="site-logo">
					<?php if ( has_custom_logo() ) { ?>
						<div class="custom-logo">
							<?php transportation_the_custom_logo(); ?>
						</div><!-- cutom logo -->
					<?php } ?>
					<div class="site-title-desc">
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
						</h1>
						<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) :
								echo '<p class="site-description">'.esc_html($description).'</p>';
							endif;
						?>
					</div><!-- site-title-desc -->
				</div><!-- site-logo -->
			</div><!-- header right -->
			
			<div class="header-right">
				<div class="toggle">
					<a class="toggleMenu" href="#"><?php esc_html_e('Menu','transportation'); ?></a>
				</div><!-- toggle --> 	
				<nav id="main-navigation" class="site-navigation primary-navigation sitenav" role="navigation">		
					<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
				</nav>
			</div><!-- navigation -->
			
		</div><!-- flex-box -->
	</div><!-- wrap -->
</header><!-- header -->