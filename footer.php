<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 */
?>
<?php
	$copyright_text =  (function_exists('ot_get_option'))? ot_get_option( 'copyright_text', 'Powered with Bootstrap and Development by jThemes' ) : 'Powered with Bootstrap and Development by jThemes';
?>
<?php 
$footer_widget_area = (function_exists('ot_get_option'))? ot_get_option( 'footer_widget_area', 'on' ) : 'on';
if($footer_widget_area == 'on'):
	if(is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' )):
	get_template_part('footer/footer-widget-area', '');
	endif;
endif; ?>
<!-- Footer -->
		<div class="copyrights">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="copyright-text">
                            <p><?php
							echo do_shortcode(wp_kses_post($copyright_text)); 
						?> </p>
                        </div><!-- end copyright-text -->
                    </div><!-- end widget -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end copyrights -->
    <!-- Footer -->
    <div class="to-top theme-clr-bg transition"> <i class="fa fa-angle-up"></i> </div>
</div>
<!-- Wrapper Ends -->
  <?php wp_footer(); ?>
</body>
</html>