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
							<?php 
								$rows = get_field('shortlist');
								if($rows)
								{
									$i = 0;
									foreach($rows as $row)
									{	
									    if($i%2==0){ $s = 'odd'; }else{ $s = 'even'; }
										echo '<div class="'.$s.'">' . $row['short'] .'</div>';
										$i++;
									}
								}
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
						
						
					</div><!-- #post-## -->
			</div><!-- #content -->
			
			<?php endwhile; endif;?>
			
			
		</div><!-- #container -->


<?php get_footer(); ?>
