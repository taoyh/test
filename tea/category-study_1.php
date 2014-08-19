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
			    $zen = get_category_by_slug('study');
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
			<div id="content" class="news">
				<ul>
				<?php while ( have_posts() ) : the_post(); ?>
					<li data-id="<?php the_ID(); ?>" id="<?php the_ID(); ?>" >
						<a class="title">· <?php the_title(); ?></a>
						<div class="detail">
							<div class="title"><?php the_title(); ?></div>
							<div class="cnt"><?php the_content(); ?></div>
							<a class="close"></a>
						</div>
					</li>
				<?php endwhile; ?>
				</ul>
				<?php wp_pagenavi( ); ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
