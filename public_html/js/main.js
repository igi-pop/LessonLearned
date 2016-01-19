
/**
 * Make an element's height equal to its width and sets an event handler to keep doing it
 * @param {string} element - Selector of the element to make square
 * @param {float} [ratio=1] - What ratio to keep between the width and height
 * @param {integer} [minLimit=0] - Only square the element when the viewport width is above this limit
 */
function squareThis (element, ratio, minLimit)
{
    // First of all, let's square the element
    square(ratio, minLimit);

    // Now we'll add an event listener so it happens automatically
    window.addEventListener('resize', function(event) {
        square(ratio, minLimit);
    });
    
    // This is just an inner function to help us keep DRY
    function square(ratio, minLimit)
    {
        if(typeof(ratio) === "undefined")
        {
            ratio = 1;
        }
        if(typeof(minLimit) === "undefined")
        {
            minLimit = 0;
        }
        var viewportWidth = window.innerWidth;
        
        if(viewportWidth >= minLimit)
        {
            var newElementHeight = $(element).width()/5 * ratio;
            $(element).width(newElementHeight);
            $(element).height(newElementHeight);
            
        }
        else
        {
            $(element).height('auto');
        }
    }
}



$(function () {
  $('[data-toggle="popover"]').popover()
})


/*
*   Code: Test phase name-logo-animation without scroll positioning in place
*   Description:    1st Hides the mid section before the screen loads
*                   2ed Animated the top and bottom part to split in two
*                   3ed Has delay between the next set of animation
*                   4th Animates the easing in of the mid section
*/                  

function slowEasyIn()
{
    $('#name-logo-animate #mid-position').animate({
            transition: '.6s ease all',
            opacity:'0.8'
            }, 1800
       );
   
}
function slowSpread()
{
    $('#name-logo-animate #bottom-position').animate({
            top:'20', 
            opacity:'1'
            }, 800
       );
        $('#name-logo-animate #top-position').animate({
            top:'-20', 
            opacity:'1',
            transition: '.6s ease all'
            }, 800
       );
   
}


function modal_toggle(toggle)
{
    var enable='';
    var disble='';
    if( toggle == 'login'){
        enable = 'signup';
        disable= 'login';
    }
    else{
        disable = 'signup';
        enable= 'login'; 
    }
    $( "#"+disable).removeClass( "active" );
    $( "#"+enable).addClass( "active" );    
    alert("#"+disable+" and the #"+enable);
}

$(document).ready(function(){
	squareThis('.square-grid');
  // ADD SLIDEDOWN ANIMATION TO DROPDOWN //
  $('.dropdown').on('show.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
  });

  // ADD SLIDEUP ANIMATION TO DROPDOWN //
  $('.dropdown').on('hide.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
  });

  
});

    

	$('#name-logo-animate #mid-position').animate({
        height:'0', 
        opacity:'0.0',
        },0.00000000001
   );
	$('#name-logo-animate #bottom-position').animate({
        top:'22', 
        opacity:'1',
        },0.00000000001
   );
    $('#name-logo-animate #top-position').animate({
        top:'22', 
        opacity:'1',
        transition: '.6s ease all'
        },0.00000000001
   );

$(window).on('scroll', function() {
    var y_scroll_pos = window.pageYOffset;
   
    var scroll_pos_test = 1500;             // set to whatever you want it to be

    if($("#name-logo-animate").isOnScreen(0.9, 0.9)) {
   		window.setTimeout(slowSpread, 1200);
    	window.setTimeout(slowEasyIn, 1500);
    }
});

$.fn.isOnScreen = function(x, y){
    
    if(x == null || typeof x == 'undefined') x = 1;
    if(y == null || typeof y == 'undefined') y = 1;
    
    var win = $(window);
    
    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();
    
    var height = this.outerHeight();
    var width = this.outerWidth();
 
    if(!width || !height){
        return false;
    }
    
    var bounds = this.offset();
    bounds.right = bounds.left + width;
    bounds.bottom = bounds.top + height;
    
    var visible = (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
    
    if(!visible){
        return false;   
    }
    
    var deltas = {
        top : Math.min( 1, ( bounds.bottom - viewport.top ) / height),
        bottom : Math.min(1, ( viewport.bottom - bounds.top ) / height),
        left : Math.min(1, ( bounds.right - viewport.left ) / width),
        right : Math.min(1, ( viewport.right - bounds.left ) / width)
    };
    
    return (deltas.left * deltas.right) >= x && (deltas.top * deltas.bottom) >= y;
    
};


// On document ready:


     
    $(document).ready(function(){
          $('.datepicker').datepicker()
            $('#date').datepicker({
            format: 'yyyy-mm-dd',
         });
        });
        $(":file").filestyle({buttonBefore: true});