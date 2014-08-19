<?php
/**
 * Template Name: welcome
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

?>




<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8" />
<title>自然成茶道 | 道法自然  茶禅一味</title>

<script src="http://libs.baidu.com/jquery/1.9.0/jquery.min.js"></script>

<style>
	* {
		margin: 0;
		padding: 0;
	}
	body {
/* 		background: #ede6e0; */
			}
	.home {
		width:100%;
		height:100%;
		margin: 0 auto;
/* 		background: transparent url("<?php bloginfo("template_url"); ?>/images/home-bg.jpg") no-repeat scroll center center; */
		font-family: "楷体", KaiTi, "KaiTi_GB2312";
		font-size: 18px;
		line-height: 36px;
		position: relative;
		overflow: hidden;
	}
	.home img {
		position: absolute;
		top:0;
		left:0;
	}
	
	.inner { 
		margin: 0 auto;
		width:603px;
	 }
	 
	.home .col {
		width:600px;
	}
	
	p strong {
		font-size: 20px;
	}
	
	p.out {
		text-indent: 0;
	}
	p {
		text-indent: 2em;
		opacity: 0.01;
	}
	
	a {
		color: #c6051b;
		text-decoration: none;
		font-weight: bold;
	}
	
	.home .right p.right {
		text-align: right;
	}
	
	.home div.right {
		
	}
	.home div.left {
		
	}
	.content {
		width: 300px;
	}
	div.left .content {
		padding-bottom: 50px;
	}
	div.right .content {
		margin-left: 260px;
		width:350px;
	}
	
	
</style>




<script type="text/javascript">
	var imageWidth = 1225;
	var imageHeight = 1200;
	var ratio = imageWidth/imageHeight;
	
	var windowWidth;
	var windowHeight;
	
	jQuery(function($){
		wh = $(window).height();
		ww = $(window).width();
		$('.home').width(ww);
		$('.home').height(wh);
		
		resize();
		$(window).resize(function(){
			wh = $(window).height();
			ww = $(window).width();
			$('.home').width(ww);
			$('.home').height(wh);
			resize();
			if( $(window).height() > $('.inner').height()  ){
				$('.inner').css('padding-top',  $(window).height()/2-$('.inner').height()/2  );
			}
		});
		if( $(window).height() > $('.inner').height()  ){
			$('.inner').css('padding-top',  $(window).height()/2-$('.inner').height()/2  );
		}
	});
	
	$(window).load( function(){
			
	});
	
	function resize(){
		windowWidth = jQuery(window).width();
		windowHeight = jQuery(window).height();
		
		newHeight = windowHeight;
		newWidth = newHeight*ratio;
		
		if(newWidth < windowWidth){
			newWidth = windowWidth;
			newHeight = newWidth*(1/ratio);
		}
		var offsetLeft = (windowWidth - newWidth)/2;
		var offsetTop = (windowHeight - newHeight)/2;
		
		jQuery('.home > img').attr({height:newHeight+'px', width:newWidth+'px', top:offsetTop+'px', left:offsetLeft+'px'});
		
	}
	
	
</script>

</head>

<body>




<div class="home"> 
	<img src="<?php bloginfo("template_url"); ?>/images/home-bg.jpg" />
	<div class="inner" style="clear:both;">
	
	
	
		<div class="left col">
			<div class="content">
			<p class="out"><strong>如果您：</strong></p>
		   	<p>认为茶只是杯中之赏</p>
	        <p>只想学习一技之长</p>
	        <p>生活小富即安</p>
	        <p>无意走进自己的内心世界</p>
	        <p class="out" style="padding:10px 0 0;"><strong>可能我们不是您要找的</strong></p>
	        <p class="out end"><a href="#" > << 离开本站</a></p>
	        </div>
		</div>
		
	
		<div class="right col">
			<div class="content">
					<p class="out"><strong>如果您：</strong></p>
					<p>笃信茶能入道而不得法</p>
					<p>渴望一份利益自身、泽被他人的事业</p>
					<p>追求精神与物质的双重富足</p>
					<p>寻找通往内心世界的方便之门</p>
					<p class="out right" style="padding:10px 0 0;"><strong>这里有您的同行和指引</strong></p>
			    <?php  $query = new WP_Query( 'pagename=home' ); ?>
			    <?php while( $query->have_posts() ): $query->the_post(); ?>
				<p class="out right"><a href="<?php the_permalink(); ?>">进入本站  >></a></p>
			    <?php endwhile; ?>
			</div>
		</div>
	

	
	
	</div>

</div>


<script type="text/javascript">
	
	jQuery(function($){
		//$('.inner > .left p');
		
		//nextp( $('.inner > .left p'), 0);
		//nextp( $('.inner > .right p'), 0);
		nextp( $('.inner p'), 0);
		//alert(pp.length);
		$('.left p.out a').click(function(){
    		window.open('','_self','');
            window.close();
		});
	});
	
	function nextp(pp, n){
			if( pp.length >= n+1 ){
			    if( $(pp[n]).hasClass('end') ){
    			    $(pp[n]).animate({ opacity:0.9 }, 500, 'swing', function(){ 
    			            $(pp[n]).animate({opacity:0.99}, 1000, 'swing', function(){ nextp(pp, n+1); });
    			         });
			    }else{
    			    $(pp[n]).animate({ opacity:0.9 }, 500, 'swing', function(){ nextp(pp, n+1); } );
			    }
			}
			//alert('s'+n);
		}
	
	
	
	
</script>





</body>
</html>







