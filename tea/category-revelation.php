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
			<?php if( $news->term_id == $cat ): ?>
				<script type="text/javascript">
					 window.location.href = jQuery('#sider ul li a').first().attr('href');
				</script>
				<?php endif; ?>
			</div>
			<div id="content" class="">
				<?php query_posts('nopaging=1&cat='.$cat); ?>
                        <h2 class="entry-title"><?php single_cat_title();  ?></h2>
                        <div class="entry-content">
					    <?php 
					        $i = 0;
					        while ( have_posts() ) : the_post();
								if($i%2==0){ $s = 'odd'; }else{ $s = 'even'; }
								echo '<div class="'.$s.'">';
								the_content();
								echo '</div>';
								$i++;
                           endwhile; 
                        ?>
						</div><!-- .entry-content -->
						<div class="share">
							<!-- Baidu Button BEGIN -->
							<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
							<span class="bds_more">分享到：</span>
							<a class="bds_qzone"></a>
							<a class="bds_tsina"></a>
							<a class="bds_tqq"></a>
							<a class="bds_renren"></a>
							<a class="bds_t163"></a>
							</div>
							<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=1866724" ></script>
							<script type="text/javascript" id="bdshell_js"></script>
							<script type="text/javascript">
							document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
							</script>
							<!-- Baidu Button END -->
						</div>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
