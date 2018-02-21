$(document).ready(function(){
    var flag = false;
    var flag2 = false;
    var scroll;
    
    $(window).scroll(function(){
        scroll=$(window).scrollTop();             
        
        if(scroll > 100)
        {
            if(!flag){
            $("#logo").css({"margin-top": "10px", "width": "30px"});
                flag=true;
            }
        }
        else
        {
            if(flag){
            $("#logo").css({"margin-top": "200px", "width": "150px"});    
                flag=false;
            }
        }
        if(scroll > 650)
        {
            if(!flag2){
            $("nav").css({"background-image": "url(images/animation.gif)"});
                flag2=true;
            }
        }
        else
        {
            if(flag2){
            
                $("nav").css({"background-image": "none"});
                flag2=false;
            }
        }
    });
});



//BANNER
   
        (function($){
  $.fn.parallax = function(options){
    var $$ = $(this);
    offset = $$.offset();
    var defaults = {
      'start': 0,
      'stop': offset.top + $$.height(),
      'coeff': 0.95
    };
    var opts = $.extend(defaults, options);
    return this.each(function(){
      $(window).bind('scroll', function() {
        windowTop = $(window).scrollTop();
        if((windowTop >= opts.start) && (windowTop <= opts.stop)) {
          newCoord = windowTop * opts.coeff;
          $$.css({
              'background-position': '0 '+ newCoord + 'px'
          });
        }
      });
    });
  };
})(jQuery);

// call the plugin
$('.title').parallax({ 'coeff':-0.3 });
$('.section .inner').parallax({ 'coeff':1.15 });
    