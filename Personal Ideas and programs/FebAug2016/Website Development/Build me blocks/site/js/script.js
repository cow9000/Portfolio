$(function(){if($('.slider').length) {	
			$('.slider')._TMS({
				prevBu:'',
				nextBu:'',
				duration:800,
				easing:'easeInOutQuart',
				preset:'lines',
				pagination:'.pagination',//'.pagination',true,'<ul></ul>'
				pagNums:false,
				slideshow:6000,
				numStatus:false,
				banners:false,// fromLeft, fromRight, fromTop, fromBottom
				waitBannerAnimation:false,
				progressBar:false
				})
				   } })