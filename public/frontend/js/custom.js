jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});

$(function(){
        $('#totopscroller').totopscroller({
          toTopHtml: '<i class="fa fa-border fa-2x fa-chevron-up"></i>',
        });
      })




$(window).scroll(function() {    
                    var scroll = $(window).scrollTop();
                    if (scroll >=50) {
                         $(".nav-1").addClass("nav-1-1");
                         $(".nav-1-1").removeClass("nav-1");
                     } else {
                         $(".nav-1-1").addClass("nav-1");
                         $(".nav-1").removeClass("nav-1-1");
                     }
              });



$(window).ready(function($) {
   setTimeout(function(){ 
    $('.timeout').hide('slow');
  }, 3000);
});

			


new WOW().init();

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:2,
    pagination:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})



  lightbox.option({
    'resizeDuration': 500,
    'wrapAround': true
  })








window.lazySizesConfig = window.lazySizesConfig || {};
//only for demo in production I would use normal expand option
window.lazySizesConfig.expand = 9;

(function($){ "use strict";

    var $grid = null;

  $(document).on('lazyloaded', function(e){
    //use width of parent node instead of the image width itself
      if(!($grid == null)){
        $grid.isotope('layout');
        console.log("triggered");
      }
  });

 
             

  /*=========== Isotope  =====================*/
  if ($('.portfolio_items').length){

  

     
    $('.portfolio_items').imagesLoaded( function() {

        $grid = $(".portfolio_items").isotope({
          itemSelector: '.single_item',
          layoutMode: 'masonry',
        });
        
    });
  }



  


     

})(jQuery);
