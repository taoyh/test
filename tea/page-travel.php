<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
			<div id="sider">
			            <?php
			            $page_id = get_the_ID();   
			            $parents = get_ancestors( $page_id, 'page' );
			            if($parents){
			                $page_id = end($parents);
			            }
			            $args = array('child_of'=>$page_id, 'title_li'=>''  );
			           echo '<ul class="sider-nav">';
			                wp_list_pages($args);
			           echo '</ul>';
					   ?>
			</div>
			
			<div id="content" role="main">
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h2 class="entry-title"><?php the_title(); ?></h2>
						<div class="entry-content">
							<?php echo do_shortcode("[contact-form-7 id='146' title='茶山行']"); ?>
						</div><!-- .entry-content -->
					</div><!-- #post-## -->
			</div><!-- #content -->
			
			<?php endwhile; endif;?>
			
			
		</div><!-- #container -->


<?php get_footer(); ?>
