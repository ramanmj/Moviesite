$(document).ready(function(){
    $('.slider').slick({
	 		 infinite: true,
	  		speed: 300,
	 		 slidesToShow: 1,
	  		adaptiveHeight: true,
	  		autoplay:true,
	  		arrows:true,
	  		prevArrow:'<button type="button" class="slick-prev text-3xl"><i class="fas fa-arrow-left"></i></button>',
	  		nextArrow:'<button type="button" class="slick-next text-3xl"><i class="fas fa-arrow-right"></i></button>'
    });
		 $('.trending').slick({
			  slidesToShow: 7,
			  slidesToScroll: 1,
			  autoplay: false,
			  autoplaySpeed: 2000,
			  prevArrow:'<button type="button" class="slick-prev text-3xl"><i class="fas fa-arrow-left"></i></button>',
	  		nextArrow:'<button type="button" class="slick-next text-3xl"><i class="fas fa-arrow-right"></i></button>'	
		});


		  $('.popular').slick({
			  slidesToShow: 7,
			  slidesToScroll: 1,
			  autoplay: false,
			  autoplaySpeed: 2000,
			  prevArrow:'<button type="button" class="slick-prev text-3xl"><i class="fas fa-arrow-left"></i></button>',
	  		nextArrow:'<button type="button" class="slick-next text-3xl"><i class="fas fa-arrow-right"></i></button>'	
		});
});