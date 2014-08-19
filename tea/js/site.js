jQuery(function($){
    //////////
    $('#menu-main a').each(function(i){
        a = $(this);
        a.siblings('span').children('i').text(a.attr('title'));
        
    });
    
    $('#menu-main span').click(function(){
        url = $(this).siblings('a').attr('href');
        window.location.href = url;
    });    
    
    
    $('.news li .detail .close').click(function(){
	    var title = $(this).parent('.detail').siblings('.title');
	    $(this).parent('.detail').slideUp(
	        'fast', function(){ title.show(); }
	    );
	    
	    return false;
    });
    $('.news li a.title').click(function(){
	    $(this).hide();
	    $(this).siblings('.detail').toggle();
	    
    });
    
    
  
    //////////
});