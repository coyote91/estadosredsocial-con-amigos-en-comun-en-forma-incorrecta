

	$(document).ready(function() {
	
	var target = null;

	$('.img_thumb').hover(function(e)
	{
      target = $(this);
      $(target[0].firstElementChild).fadeIn(200);
    }, 
	
	function(){
    $(target[0].firstElementChild).fadeOut(200);
    });
	
	
	$('.img_thumb').click( function ()
	 {
	    

	
		$('.cajasubirfoto').show();
		
	 
	});
	
	});
	
