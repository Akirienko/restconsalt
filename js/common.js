$(function() {
	var screenWidth = screen.width;
	if( screenWidth < 650){
		$(".slider-team").slick({
			prevArrow: '<i class="fas fa-angle-left"></i>',
			nextArrow: '<i class="fas fa-angle-right"></i>',
			autoplay: true,
			autoplaySpeed: 4000,
			infinite: true
		});
		$(".customers").slick({
			prevArrow: '<i class="fas fa-angle-left"></i>',
			nextArrow: '<i class="fas fa-angle-right"></i>',
			autoplay: true,
			autoplaySpeed: 4000,
			infinite: true
		});
	}
	

});
