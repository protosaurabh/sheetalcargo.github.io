<?php
/**
 *
 * @package Transportation
 */

get_header(); 


/*****************************
  ** Get Sider
*****************************/
if (!is_home() && is_front_page()) {

  $massage_hide_slider = get_theme_mod( 'transport_hide_slider', '1' );
  if( $massage_hide_slider == '' ){
    $massage_lite_pages = array();

    for( $sld=1; $sld<4; $sld++ ) {
      $getsld = absint( get_theme_mod( 'slide'.$sld ) );
      if ( 'page-none-selected' != $getsld ) {
        $massage_lite_pages[] = $getsld;
      }
    }

    if( !empty( $massage_lite_pages ) ) :

      $args = array(
        'posts_per_page' => 3,
        'post_type' => 'page',
        'post__in' => $massage_lite_pages,
        'orderby' => 'post__in'
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) : 
      $sld = 7;
?>
<div id="theme-slider" class="massage-slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
      <?php
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
          $i++;
          $massage_lite_slideno[] = $i;
          $massage_lite_slidetitle[] = get_the_title();
          $massage_lite_slidedesc[] = get_the_excerpt();
          $massage_lite_slidelink[] = esc_url(get_permalink());
          $image_id = get_post_thumbnail_id();
          $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
          ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo $image_alt; ?>"/>
          <?php
          $getsld++;
        endwhile;
      ?>
    </div><!-- slider wraper -->
    <?php
      $k = 0;
      foreach( $massage_lite_slideno as $massage_lite_sln ){ ?>
      <div id="slidecaption<?php echo esc_attr( $massage_lite_sln ); ?>" class="nivo-html-caption">
        <div class="inner-caption">
		  <h4><?php echo esc_html(get_theme_mod('slide_sbttl'));?></h4>
          <h2><a href="<?php echo esc_url($massage_lite_slidelink[$k] ); ?>"><?php echo esc_html($massage_lite_slidetitle[$k] ); ?></a></h2>
          <p><?php echo esc_html($massage_lite_slidedesc[$k] ); ?></p>
          <?php if( !empty( get_theme_mod('slide_more',true) ) ){ ?>
          <a class="sliderbtn" href="<?php echo esc_url($massage_lite_slidelink[$k] ); ?>">
            <?php echo esc_html(get_theme_mod('slide_more',__('Read More','transportation')));?>
          </a>
          <?php } ?>
        </div><!-- inner caption -->
      </div>
      <?php $k++;
      wp_reset_postdata();
      }
    ?>
  </div><!-- slider -->
</div><!-- orphan slider -->
<?php endif;
    endif;
  }
}

/*****************************
  ** Service Section
*****************************/
$hidefeat = get_theme_mod( 'transport_hide_fsec','1' );

if( $hidefeat == '' ){
    echo '<section class="featured-section"><div class="container">';

        $featmore = get_theme_mod('fsec_more');
		$fsecttl = get_theme_mod('fsecttl');
		
		if( !empty( $fsecttl ) ){
			echo '<h2 class="section_title">'.$fsecttl.'</h2>';
		}

        echo '<div class="flex-box">';
            for( $feat = 1; $feat<4; $feat++ ){
                if( get_theme_mod( 'fsec'.$feat,true ) !='' ){
                    $abtsecquery = new WP_Query( array( 'page_id' => get_theme_mod( 'fsec'.$feat ) ) );
                    while( $abtsecquery->have_posts() ) : $abtsecquery->the_post();
                        $shwthumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium');
                        $image_id = get_post_thumbnail_id();
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                        echo '<div class="col"><div class="feat-box"><div class="inner-feat-box">';
                            if( has_post_thumbnail() ) {
                              echo '<div class="feat-box-thumb"><img src="'.$shwthumb[0].'" alt="'.$image_alt.'"/></div><!-- feat box thumb -->';
                            }
                            echo '<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3><p>'.get_the_excerpt().'</p>'.($featmore != '' ? '<a href="'.get_the_permalink().'" class="feat-more">'.$featmore.'</a>' : '').'';
                        echo '</div></div></div>';
                    endwhile; wp_reset_postdata();
                }
            }
    echo '</div></div></section>';
}

/*****************************
  ** About Section
*****************************/
$massage_abt_hide = get_theme_mod('transport_hide_intro', '1');

if($massage_abt_hide  == '') {

	$massage_abt_more = get_theme_mod('intro_more');
	
	echo '<section class="introduction"><div class="container"><div class="flex-box">';
	if(get_theme_mod('transport_intro') != '') {
		$intro_query = new WP_Query(array('page_id' => get_theme_mod('transport_intro')));

		while( $intro_query->have_posts() ) : $intro_query->the_post();
			if( has_post_thumbnail() ) {
				$src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
				$url = $src[0];
				$image_id = get_post_thumbnail_id();
				$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
			  echo '<div class="thumb"><img src="'.$url.'" alt="'.$image_alt.'"></div><!-- thumb -->';
			}
			echo '<div class="intro-content"><div class="section_head"><h2 class="section_title">'.get_the_title().'</h2></div><p>'.get_the_excerpt().'</p>'.($massage_abt_more != '' ? '<a href="'.get_the_permalink().'" class="read-more">'.$massage_abt_more.'</a>' : '').'</div>';
		endwhile;
	}
	echo '</div></div></section>';
}

?>

<div class="main-container">                                     
  <div class="content-area">
    <div class="middle-align content_sidebar">
        <div class="site-main" id="sitemain">
          <?php
            if ( have_posts() ) :
                // Start the Loop.
                while ( have_posts() ) : the_post();
                    /*
                     * Include the post format-specific template for the content. If you want to
                     * use this in a child theme, then include a file called called content-___.php
                     * (where ___ is the post format) and that will be used instead.
                     */
                    get_template_part( 'content-page', get_post_format() );

                endwhile;
                // Previous/next post navigation.
                the_posts_pagination();
    	           wp_reset_postdata();
            else :
                // If no content, include the "No posts found" template.
                 get_template_part( 'no-results' );
            endif;
          ?>
        </div>
        <?php get_sidebar();?>
        <div class="clear"></div>
    </div>
  </div>
<?php get_footer(); ?>