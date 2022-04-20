// Slide Show
var slideIndex = 0;
showSlides();
// Slick Carousel
function showSlides() {
 		var i;
  	var slides = document.getElementsByClassName("mySlides");
  	for (i = 0; i < slides.length; i++) {
    	slides[i].style.display = "none";  
  	}
  	slideIndex++;
  	if (slideIndex > slides.length) {slideIndex = 1}    
  	slides[slideIndex-1].style.display = "block";  
  	setTimeout(showSlides, 5000); // Change image every 3 seconds
}
$('.post-wrapper').slick({
  	slidesToShow: 4,
  	slidesToScroll: 1,
  	autoplay: false,
  	nextArrow: $('.next'),
  	prevArrow: $('.prev'),
    responsive: [
      {
        breakpoint: 1024,
        settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      }
    },
      {
        breakpoint: 600,
        settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      }
    },
    	{
        breakpoint: 480,
        settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
  	]
	});
// Show Video Youtube
$(document).ready(function(){
    $('.show-video').on('click', function(){
		var id = this.id;
      $.showYtVideo({
          videoId: id
        });
    });
});