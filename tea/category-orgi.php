<?php
/**
 * The template for displaying Category Archive pages.
 *
 */

get_header(); ?>

		<div id="container">
			<div id="sider">
			</div>
			<div id="content" class="orgi">
				<ul>
				<?php while ( have_posts() ) : the_post(); ?>
					<li data-id="<?php the_ID(); ?>">
						<a class="title">· <?php the_title(); ?></a>
						<div class="detail">
							<div class="title"><?php the_title(); ?></div>
							<div class="cnt"><?php the_content(); ?></div>
							<a class="close"></a>
						</div>
					</li>
				<?php endwhile; ?>
				</ul>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
