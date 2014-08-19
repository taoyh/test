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
			    $news = get_category_by_slug('experience');
			    $args = array(
			                'hide_empty'=>0, 
			                'child_of'=>$news->term_id,
			                'title_li'           => __( '' ),
			                'show_option_none'   => __('')
			            );
			    echo '<ul class="sider-nav">';
			        wp_list_categories($args);
			    echo '</ul>';
			?>
			<?php if( $news->term_id == $cat ): ?>
				<script type="text/javascript">
					 window.location.href = jQuery('#sider ul li a').first().attr('href');
				</script>
				<?php endif; ?>
			</div>
			<div id="content" class="experience">
				<ul>
				<?php query_posts('nopaging=1&cat='.$cat); ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<li data-id="<?php the_ID(); ?>">
						<div class="cnt"><?php the_content(); ?></div>
						<div class="title">——<?php the_title(); ?></div>
					</li>
				<?php endwhile; ?>
				</ul>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
