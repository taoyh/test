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
			    $news = get_category_by_slug('revelation');
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
