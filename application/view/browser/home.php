

	<div class="swiper-container swiper-container-vertical">
		<div class="swiper-wrapper">
	        <div class="swiper-slide swiper-bg-1 slide-bg">
	        	<div class="slide_down_copy " data-animate-in="zoomInRight animated">向下滑动</div>
				<img src="images/dashboard/down.png" class="animated slide_down_icon" data-animate-in="zoomInLeft" data-animate-loop="fadeOutDown infinite animation_2s"/>
	        </div>
	        <div class="swiper-slide swiper-bg-2 slide-bg">
	        	<div class="yellow slide_title animated" style="top: 18%;position: relative;" data-animate-in="bounceInDown">／ 新闻资讯 ／</div>
				<div class="white slide_subtitle animated" style="line-height:40px;position: relative;top:20%;width: 810px;margin: 0 auto;margin-top: 4%;" data-animate-in="zoomIn">The gentlemen who rented the room would sometimes take their evening meal at home in the living room that was used by everyone, and so the door to this room was often kept closed in the  </div>
	        	<div class="container news_container">
					<div class="row">
						<div class="col-lg-4 col-md-4 animated" data-animate-in="zoomInRight" style="">
							<div class="news_wedgit">
								<div class="yellow news_wedgit_title">复刻经典致敬</div>
								<div class="white news_wedgit_sub">A million ways to die in the wild wild wild west</div>
								<img src="images/news/n1.jpg" class="img-responsive"/>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 animated" data-animate-in="zoomInRight" style="animation-delay: 0.5s;-webkit-animation-delay: 0.5s;">
							<div class="news_wedgit">
								<div class="yellow news_wedgit_title">复刻经典致敬</div>
								<div class="white news_wedgit_sub">A million ways to die in the wild wild wild west</div>
								<img src="images/news/n2.jpg" class="img-responsive"/>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 animated" data-animate-in="zoomInRight" style="animation-delay: 1s;-webkit-animation-delay: 1s;">
							<div class="news_wedgit">
								<div class="yellow news_wedgit_title">复刻经典致敬</div>
								<div class="white news_wedgit_sub">A million ways to die in the wild wild wild west</div>
								<img src="images/news/n3.jpg" class="img-responsive"/>
							</div>
						</div>
					</div>
				</div>
			</div>
	        <div class="swiper-slide swiper-bg-3 slide-bg">
	        	<div class="container" style="top: 50%;position: relative;margin-top: -300px;">
					<div class="row">
						<div class="col-md-7"><img src="images/dashboard/brand.jpg" class="img-responsive"/></div>
						<div class="col-md-5">
							<div class="yellow slide_title animated" style="top: 18%;position: relative;" data-animate-in="bounceInDown">／ 品牌XX ／</div>
							<div class="yellow slide_brand_content animated">Gravelly soil below the Saint-Emilion plateau. No chemical herbicides used in soil cultivation The estate is being converted to organic farming.
								<br><br><br>
								Gravelly soil below the Saint-Emilion plateau. No chemical herbicides used in soil cultivation The estate is being converted to organic farming.
							<br><br><br>
								Gravelly soil below the Saint-Emilion plateau. No chemical herbicides used in soil cultivation The estate is being converted to organic farming.
							</div>
							<div style="border-top:1px solid #fff;height:80px;">

							</div>
							<div style="border-bottom:1px solid #fff;height:80px;">

							</div>
							<div></div>
						</div>
					</div>
				</div>
	        </div>
	        <div class="swiper-slide swiper-bg-4 slide-bg">
	        	
	        </div>
	        <div class="swiper-slide swiper-bg-5 slide-bg">
	        	
	        </div>
	    </div>
	</div>

<script>
  
  	 var mySwiper = new Swiper ('.swiper-container', {
	    direction: 'vertical',
	    loop: false,
	    //width : window.innerWidth,
	    //height : window.innerHeight,
	    mousewheelControl:true,
	    preloadImages: true,
	    observeParents:true,
	 	onInit:function(swiper){
			dC.activeCssAnimation(swiper.activeIndex);
 		},
	 	onSlideChangeStart: function(swiper){
			 dC.activeCssAnimation(swiper.activeIndex);
	 	},
	 	onSlideChangeEnd: function(swiper){
			console.log(swiper);
			 dC.clearCssAnimation(swiper.activeIndex);
	 	}
	  });     

    
</script>