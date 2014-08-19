<?php get_header(); ?>

<?php 
    
    $zen = get_category_by_slug('zen');
    $news = get_category_by_slug('news');
    $study = get_category_by_slug('study');
    $gain = get_category_by_slug('gain');
    $revelation = get_category_by_slug('revelation');
    $experience = get_category_by_slug('experience');
    
    while( have_posts() ) {
        the_post();
        $categries = get_the_category();
        
        $post_cat_ids = array();
        foreach( $categries as $c ){ 
            $post_cat_ids[] = $c->term_id; 
            $parents = get_ancestors( $c->term_id, 'category' );
            foreach($parents as $cc){
                $post_cat_ids[] = $cc; 
            }
        }
        $post_cat_ids = array_unique($post_cat_ids);
		/*  print_r($post_cat_ids); */
        if( in_array($zen->term_id, $post_cat_ids) ){
            get_template_part('single', 'zen');
        }else if(  in_array($study->term_id, $post_cat_ids) ){
             get_template_part('single', 'study');
        }else if(  in_array($revelation->term_id, $post_cat_ids) ){
             get_template_part('single', 'revelation');
        }else if(  in_array($news->term_id, $post_cat_ids) ){
             get_template_part('single', 'news');
        }else if(  in_array($experience->term_id, $post_cat_ids) ){
             get_template_part('single', 'experience');
        }else if ( in_array($gain->term_id, $post_cat_ids) ){
            get_template_part('single', 'gain');
        }
        
    }
    
?>


<?php get_footer(); ?>