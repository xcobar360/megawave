<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage GoCourier
 * @since GoCourier 1.0
 */

get_header(); ?>

    <div class="section white page-content">
        <div class="container">
            <div id="content" class="col-md-12 col-sm-12 col-xs-12">
                <div class="error-template">
                    <h1><?php echo esc_html__('404', 'gocourier'); ?></h1>
                    <div class="error-details">
                        <p><?php echo esc_html__('The page you are looking for is not found!', 'gocourier'); ?></p>
                        <p><?php echo esc_html__('lease use the correct link.', 'gocourier'); ?></p>
                    </div>
                    <div class="error-actions">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="not-found-button"><?php echo esc_html__('Go back to home', 'gocourier'); ?></a>
                    </div>
                </div>
            </div><!-- end content -->
        </div><!-- end container -->
    </div>     
            
<?php get_footer(); ?>