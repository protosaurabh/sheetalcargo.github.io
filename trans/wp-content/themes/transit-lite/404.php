<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Transit Lite
 */

get_header(); ?>
  <div class="main-container">
<div class="content-area">
    <div class="middle-align">
        <div class="site-main" id="sitemain">
            <header class="page-header">
                <h1 class="title-404"><?php esc_html_e( '404 Not Found', 'transit-lite' ); ?></h1>
            </header><!-- .page-header -->
            <div class="page-content">
                <p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn..... Do Not worry... it happens to the best of us.', 'transit-lite' ); ?></p>
                
            </div><!-- .page-content -->
        </div>
		<?php get_sidebar(); ?>
        <div class="clear"></div>
    </div>
</div><div class="clear"></div>

<?php get_footer(); ?>