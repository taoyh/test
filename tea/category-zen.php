<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="sider">
			<?php
			    $zen = get_category_by_slug('zen');
			    $args = array(
			                'hide_empty'=>0, 
			                'child_of'=>$zen->term_id,
			                'title_li'           => __( '' ),
			                'show_option_none'   => __('')
			            );
			    echo '<ul class="sider-nav">';
			        wp_list_categories($args);
			    echo '</ul>';
			
			?>
				<?php if( $zen->term_id == $cat ): ?>
				<script type="text/javascript">
					 window.location.href = jQuery('#sider ul li a').first().attr('href');
				</script>
				<?php endif; ?>
			</div>
			<div id="content" class="zen">
				<ul>
				<?php while ( have_posts() ) : the_post(); ?>
					<li data-id="<?php the_ID(); ?>">
						<a class="title" href="<?php the_permalink(); ?>">· <?php the_title(); ?></a>
					</li>
				<?php endwhile; ?>
				</ul>
				<?php wp_pagenavi( ); ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
