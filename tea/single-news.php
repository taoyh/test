<div id="container">



<div id="sider">
     <?php
	    $news = get_category_by_slug('news');
	    $args = array(
	                'hide_empty'=>0, 
	                'child_of'=>$news->term_id,
	                'title_li'           => __( '' ),
	                'show_option_none'   => __('')
	            );
	    echo '<ul class="sider-nav">';
	        wp_list_categories($args);
	    echo '</ul>';
	    $cat_ids = array();
	    $pid = get_the_ID(); 
        $categories = get_the_category();
        foreach($categories as $c) {
             $cat_ids = $c->term_id; 
        }

	?>
	<script type="text/javascript">
		jQuery(function($){
			id = '<?php echo $cat_ids; ?>';
			//ids = cat_ids.split(',');
			//alert( typeof(ids) );
			//for (var i=0,len=ids.length; i<len; i++)
				$('.sider-nav .cat-item-'+id).addClass('current-cat');
			//}
		});
	</script>
    
</div>





<div id="content" role="main">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2 class="entry-title"><?php the_title(); ?></h2>
				<div class="entry-content">
					<?php the_content(); ?>
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











</div>
