<?php
/**
 * The main template file.
 */

get_header(); ?>

		<div id="container">

            <div class="topslider">
                <div class="col-fl">
					<div class="cont">
	                    <p>茶乃世间第一清净之物，至善至简，饮之可清身、正情、和气、离妄、化欲、明心，达茶禅一味之境，故能载道。</p>
						<p>天人合一，道法自然，是名“自然成”。事茶可入道，却须得法，严绍云老师于深山事茶多年，精勤专定，终悟“事茶成道、法必无为”之理，遂创“自然成茶道”，设茶道共修班，广为传习。</p>
					</div>
                </div>
                <div class="col-fr">
                    <div class="index-slider">
                    <?php echo do_shortcode("[metaslider id=109]"); ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            

            
            
            <div class="index-row">
                 <div class="col-fl">
                        <div class="index-news">
                        <?php $c = get_category_by_slug('news'); ?>
                             <div class="top">
                                 <a href="<?php echo get_category_link($c->term_id); ?>"></a>
                             </div>
                             <div class="cont">
                                <?php
                                     
                                    $args = array('category_name'=>'news', 'posts_per_page'=>5);
                                    $query = new WP_Query($args);
                                 ?>
                                 <ul>
                                 <?php while($query->have_posts()): $query->the_post(); ?>
                                        <li>
                                        <a  title="<?php the_title(); ?>" href="<?php echo get_category_link($c->term_id);  ?>#<?php the_ID(); ?>">
                                        <?php Limit_Char(get_the_title(), 54); ?>
                                        </a>
                                        </li>
                                 <?php endwhile; ?>
                                 </ul>
                             </div>
                        </div>
                        <div class="index-lesson">
                                <?php
                                    $args = array('pagename'=>'share');
                                    $query = new WP_Query($args);
                                    while($query->have_posts()): $query->the_post(); 
                                    if( get_field('link') ){
                                        $url = get_field('link');
                                    }else{
                                        $url = get_permalink();
                                    }
                                ?>
                                 <div class="top">
                                     <a href="<?php echo $url; ?>"></a>
                                 </div>
                                 <div class="cont">
                                                <a href="<?php echo $url; ?>" target="_blank">
                                                    <?php $attachment_id = get_field('image'); ?>
                                                    <?php echo wp_get_attachment_image( $attachment_id, 'study' ); ?><br>
                                                    <?php //echo utf8_substr(get_field('title'), 0, 15); ?>
                                                    <?php Limit_Char(get_field('title'), 54); ?>
                                                </a>
                                 </div>
                                 <?php endwhile; ?>
                        </div>
                        
                 </div>
                 
                 <div class="col-fr">
                     <div class="clist">
                        <?php 
                           $tabs = array(); 
                           $cates = array( 'zen', 'study', 'revelation', 'experience' );
                           foreach($cates as $c){
                                $tabs[] = get_category_by_slug($c);
                           }        
                        ?>
                         <div class="tabs">
                            <ul>
                                <?php $i = 0; $j = 0; ?>
                                <?php foreach($tabs as $t): $i++; if($i==1){ $h = 'hover'; }else{ $h = ''; } ?>
                                <li class="<?php echo $h; ?>">
                                    <a href="<?php echo get_category_link($t->term_id); ?>"><?php echo $t->name; ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul> 
                         </div>
                         <div class="content">
                            <?php foreach($tabs as $t): $j++; if($j==1){ $d=''; }else{ $d = 'style="display:none;"';};?>
                                <div class="list list-<?php echo $t->slug; ?>" <?php echo $d; ?> >
                                  <?php $i = 0; 
                                        $args = array('category_name'=>$t->slug, 'posts_per_page'=>9); 
                                         $query = new WP_Query($args);
                                         while($query->have_posts()): $query->the_post(); 
                                            $i++;
                                            $url = get_permalink();
                                            $txt = get_the_title();
                                            if( $t->slug == 'revelation' || $t->slug == 'experience' ){
                                                $url = get_category_link($t->term_id).'#'.get_the_ID();
                                                $txt = get_the_content();
                                            }
                                            if($i == 1){ 
                                                echo '<div class="photo">';
                                                echo '<a href="'.$url.'">';
                                                if( has_post_thumbnail() ){
                                                    the_post_thumbnail('indextabs');
                                                }else{
                                                    echo '<img src="'. get_bloginfo('template_url')  .'/images/indextabs.png"  />';
                                                }
                                                echo '</a></div>';
                                                echo '<div class="tlist">';
                                            }                                            
                                            echo '<li><a href="'.$url.'"><b>•</b><span>';
                                            Limit_Char($txt, 90);
                                            echo '</span></a></li>';
                                        endwhile;
                                        echo '</div>';
                                        echo '<a class="bottom-link" href="'. get_category_link($t->term_id) .'" title="'.$t->name.'"></a>'
                                        ?>
                                </div>
                            <?php endforeach; ?>
                         </div>
                          <script type="text/javascript">
                            jQuery(function($){
                                $('.tabs li a').hover(function(){
                                    a = $(this);
                                    $('.tabs li').removeClass('hover');
                                    a.parent().addClass('hover');
                                    i = $('.tabs li').index(a.parent());
                                    $('.tabs').css({'background-position': i*100+ 'px 3px'});
                                    $('.content > div').hide();
                                    $('.content > div').eq(i).show();
                                }); 
                            });
                         </script>
                     </div>
                 </div>
                 
                 <div class="clearfix"></div>
            </div>
            
            
             

            
            
            
            
            
            
            
            <div class="index-row index-experience">
                 <div class="col-fl">
                    <?php $c = get_category_by_slug('experience'); ?>
                     <div class="top">
                         <a href="<?php echo get_category_link($c->term_id); ?>"></a>
                     </div>
                     <div class="cont">
                         <?php
                            $c = get_category_by_slug('experience'); 
                            $args = array('category_name'=>'experience', 'posts_per_page'=>1);
                            $query = new WP_Query($args);
                         ?>
                         <?php while($query->have_posts()): $query->the_post(); ?>
                               <div class="word"><?php Limit_Char('', 500); ?></div>
                               <div class="person">—— <?php the_title(); ?></div>
                         <?php endwhile; ?>
                         
                     </div>
                 </div>
                 <div class="col-fr">
                     <div class="index-contact">
                         <div class="inner">
                         <?php 
                            $args = array('pagename'=>'contact');
                            $query = new WP_Query($args);
                            while( $query->have_posts() ): $query->the_post();
                            ?>
                            <div class="photo"><?php the_post_thumbnail('contact'); ?></div>
                            <div class="cnt">
                                <?php the_content();  ?>
                                <?php
                                $page_id = get_the_ID();   
                                //$pages = get_pages(  array('child_of'=>$page_id, 'sort_column'=>'menu_order', 'sort_order'=>'ASC')  );
                                $_args = array('child_of'=>$page_id, 'title_li'=>''  );
                                echo '<ul class="nav">';
                                    wp_list_pages($_args);
                                echo '</ul>';
                                ?>
                            </div>
                            <div class="clearfix"></div>
                            <?php 
                            endwhile;
                          ?>
                         </div>
                     </div>
                 </div>
                 <div class="clearfix"></div>
            </div>

            <a href="" class="weima"></a>
            <script type="text/javascript">
                /*
                jQuery(function($){
                    $(window).scroll(function(){
                        t = $(window).scrollTop();
                        if(t < 300 ){
                            $('.weima').animate({'top': 0},100);
                        }else{
                            $('.weima').animate({'top': t-300 }, 100);
                        }
                                                
                    });
                    $(window).resize(function(){
                        w = $(window).width();
                        $('.weima').css({'right': (w-1000)/2-130 });
                    })
                
                });
                */
                
                jQuery(window).load(function(){
                    w = jQuery(window).width();
                    //jQuery('.weima').css({'position':'absolute', 'right': (w-1000)/2-130 });
                    //jQuery('.weima').css({'position':'absolute', 'top': 0  });
                    //jQuery('.weima').css({'position':'fixed', 'right': (w-1000)/2-130 });
                    jQuery('.weima').css({'position':'fixed', 'top': 0  });
                });
                
            </script>
            
		</div><!-- #container -->



<?php get_footer(); ?>
