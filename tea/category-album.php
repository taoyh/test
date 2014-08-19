<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container" style="padding-top:10px;">
			<div id="sider">
			<?php
			    $news = get_category_by_slug('album');
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
			<div id="content" class="albums">
				<?php $i = 0; ?>
				<div class="row">
				<?php query_posts('nopaging=1&cat='.$cat); ?>
				<?php while ( have_posts() ) : the_post(); $i++; ?>
				    <?php if( $i%3==0 ){ $third = "third"; }else{ $third=""; }  ?>
					<div data-id="<?php the_ID(); ?>" class="cell <?php echo $third; ?>">
						    <a href="#" class="cover">
    						    <div class="title"><?php the_title(); ?></div>
        						<?php the_post_thumbnail('albumthumb'); ?>
    						</a>
    						<div class="cnt"><?php the_content(); ?></div>
					</div>
					<?php if( $i%3==0 ){ echo '</div><div class="row">'; }  ?>
				<?php endwhile; ?>
				</div>
				<div class="clearfix"></div>
			</div><!-- #content -->
			<div class="clearfix"></div>
		</div><!-- #container -->


<script type="text/javascript">
    jQuery(function($){
        ///////////////
        //get_slider_images(99, '最好的茶叶');
        $('.row a.cover').click(function(){
            wraper = $(this).parent();
            id = wraper.data('id');
            $('.slider-wraper').hide();
            offset = wraper.offset();
            if( $('#bx-slider-'+id).length > 0 ){
                $("html,body").animate({scrollTop: offset.top-15}, 1000);
                wraper.parent().after( $('#bx-slider-'+id) );
                $('#bx-slider-'+id).show();
            }else{
                title = wraper.find('.title').text();
                content = wraper.find('.cnt').html();
                where =  wraper.parent();
                position = wraper.position();
                left = position.left + wraper.width()/2 - 13;
                get_slider_images(id, title, content, where, left, offset);
                console.log(left);
                
            }
            return false;
            
        });
        
        $('.slider-wraper .close').live('click', function(){
	        $(this).parent().hide();
	        return false;
        });
        
        
        ///////////////
    });
    
    function  get_slider_images(id, title, content, where, pleft, offset){
                            url = '/wp-admin/admin-ajax.php';
                            data = { 
                                         postid: id ,
                                         action:'ajax_get_json_images' 
                                    };
                            jQuery.ajax({
                                type:'get',
                                url: url,
                                data: data,
                                dataType: "json",
                                success: function(d){
                                    var compiled_slider = _.template( jQuery('#bxslidertemplate').html() );  
                                    slider = compiled_slider({id:id, title:title, list:d, cnt:content});                 
                                    where.after( jQuery(slider) );
                                    jQuery('#bx-slider-'+ id +' .pointer').css({'left':pleft});
                                    jQuery('#bx-slider-'+ id +' .bx').flexslider({ });
                                    jQuery("html,body").animate({scrollTop: offset.top-15}, 1000);
                                }
                            });   
                    }
                    
    
</script>


<script type="text/template" id="bxslidertemplate">
    <div class="slider-wraper" id="bx-slider-<%= id %>">
        <div class="pointer"></div>
        <h3><%= title %></h3>
        <div class="bx">
	        <ul class="slider slides">
	            <% _.each(list, function(l){  %> 
	                <li class="photo">
	                    <img src="<%= l.src %>" >
	                    <span><%= l.title %></span>
	                    <div class="photocnt"><%= l.content %></div>
	                </li>
	            <% }) %>
	        </ul>
        </div>
        <div class="cnt"><%= content %></div>
        <a class="close"></a>
    </div>
</script>


<script type="text/template" id="slidertemplate">
    <div class="slider-wraper" id="coin-slider-<%= id %>">
        <h3><%= title %></h3>
        <div class="test">
        <div class="slider" id="slider-<%= id %>">
            <% _.each(list, function(l){  %> 
                <a class="photo">
                    <img src="<%= l.src %>">
                    <span><%= l.title %></span>
                </a>
            <% }) %>
        </div>
        </div>
        <div class="cnt"></div>
        <a class="close"></a>
    </div>
</script>



<?php get_footer(); ?>
