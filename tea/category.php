<?php 
    
    
    $parents = get_ancestors( $cat, 'category' );
    
    $zen = get_category_by_slug('zen');
    $news = get_category_by_slug('news');
    $study = get_category_by_slug('study');
    $experience = get_category_by_slug('experience');
    $album = get_category_by_slug('album');
    $revelation = get_category_by_slug('revelation');
    
    if( in_array($zen->term_id, $parents) ){
        get_template_part('category', 'zen');
    }else if ( in_array($news->term_id, $parents) ){
        get_template_part('category', 'news');
    }else if ( in_array($study->term_id, $parents) ){
        get_template_part('category', 'study');
    }else if ( in_array($experience->term_id, $parents) ){
        get_template_part('category', 'experience');
    }else if ( in_array($album->term_id, $parents) ){
        get_template_part('category', 'album');
    }else if ( in_array($revelation->term_id, $parents) ){
        get_template_part('category', 'revelation');
    }
    else{
        get_template_part('category', 'orgi');
    }
    
    
    
    
    
    
?>