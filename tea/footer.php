<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main -->

	<div id="footer" role="contentinfo">
		<div id="colophon">
            <div id="site-info">
				<a class="footer-logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</div><!-- #site-info -->
			
			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with four columns of widgets.
				 */
				get_sidebar( 'footer' );
			?>

			

			

		</div><!-- #colophon -->
		<div id="site-copyright">
				Copyright © 2013 自然成茶道. All rights reserved. 		<a href="http://www.miibeian.gov.cn/"> 滇ICP备12004204号</a>
			</div><!-- #site-generator -->
		
		
		
		
	</div><!-- #footer -->

</div><!-- #wrapper -->




</div><!--#wrapper-bg -->

<?php

	wp_footer();
?>
</body>
</html>