/* the ability to use "toggle/toggleClick" after version 1.9 of jquery */
$.fn.toggleClick=function(){
	var functions=arguments, iteration=0
	return this.click(function(){
		functions[iteration].apply(this,arguments)
		iteration= (iteration+1) %functions.length
	})
}


$(document).ready(function(){				
    
    $('.mob_nav').css({
    	width 			:	mob_menu_width
    });

    switch (mob_menu_pos)
	{
		
		case "left":
			$('.mob_nav').css({
		    	'left'				: 	'-'+mob_menu_width
		    });
		break;

		case "right":
			$('.mob_nav').css({
		    	'right'				: 	'-'+mob_menu_width
		    });
		break;

		case "top":
			$('.mob_nav').css({
		    	'bottom'			: 	'auto',
		    	'margin-bottom' 	: 	'0',
		    	'margin-left'	 	: 	'auto',
		    	'margin-right'	 	: 	'auto',
		    	'position'			: 	'relative',
		    	'display'			: 	'none',
		    	'height' 			: 	'auto'
		    	
		    });
		break;

		case "bottom":
			$('.mob_nav').css({
		    	'top'				: 	'auto',
		    	'bottom'			: 	'0px',
		    	'margin-top' 		: 	'0',
		    	'margin-left'	 	: 	'auto',
		    	'margin-right'	 	: 	'auto',
		    	'position'			: 	'relative',
		    	'display'			: 	'none',
		    	'height' 			: 	'auto'
		    	
		    });
		break;
	};

	$('.mob_trigger').toggleClick(function(event){
						
		if ( $(this).hasClass('mob_trigger_active') == false )
		{
			switch (mob_menu_pos)
			{
				case "left":
					$('.mob_nav').animate({
						left: '0%'
				  		}, 100, function() {
				  	});

				  	$('.wrapper').animate({
						left: '+='+mob_menu_width+''
				  		}, 100, function() {
				  	});
				break;
				case "right":
					$('.mob_nav').animate({
						right: '0%'
				  		}, 100, function() {
				  	});

				  	$('.wrapper').animate({
						right: '+='+mob_menu_width+''
				  		}, 100, function() {
				  	});
				break;
				case "top":					
					$('.mob_nav').slideDown(100)
				break;
				case "bottom":
					$('.mob_nav').slideDown(100)
					$('body').animate({ scrollTop: $('.wrapper').height()}, 1000);
				break;

			}
					

		  	setTimeout(function() {
		  		$('body').one( "click", ".wrapper:not('.mob_trigger')" , function(event) {
					event.stopPropagation();
					if ($(event.target).attr("class") == undefined || (!$(event.target).attr("class") == "mob_trigger" && !$(event.target).attr("class") == "mob_nav"))
					{
						$('.mob_trigger').click();
					}
					});
		  	},100);

	  		$(this).addClass("mob_trigger_active");
	  	}
						  	
	},function() {
						
		if ( $(this).hasClass('mob_trigger_active') == true )	
		{
			$('body').off("click", ".wrapper:not('.mob_trigger')", function () {} ); 

			switch (mob_menu_pos)
			{
				case "left":
					$('.mob_nav').animate({
						left: '-='+mob_menu_width+''
				  		}, 100, function() {
				  	});

				  	$('.wrapper').animate({
						left: '-='+mob_menu_width+''
				  		}, 100, function() {
				  	});
				break;
				case "right":
					$('.mob_nav').animate({
						right: '-='+mob_menu_width+''
				  		}, 100, function() {
				  	});

				  	$('.wrapper').animate({
						right: '-='+mob_menu_width+''
				  		}, 100, function() {
				  	});
				break;
				case "top":
					$('.mob_nav').slideUp(100)
				break;
				case "bottom":
					$('.mob_nav').slideUp(100)
					$('body').animate({ scrollTop: '0px' }, 1000);
				break;

			}

		  	$(this).removeClass("mob_trigger_active");
		}
						 	
	});


	/* check submenu and add span with mob_submenu_icon class */
	$( 'li' , 'ul.mob_menu' ).each( function() {
		if ($(this).has('ul.mob_submenu').length > 0)
		{
			var main_li = $(this);
			$( "a:first" , main_li ).append("<span class=\"mob_submenu_icon\">&#10133;</span>");
			$( main_li ).addClass("mob_has_submenu");
			$( ".mob_submenu_icon", main_li ).toggleClick(function(){ 
				$( "ul.mob_submenu:first" , main_li ).show();
				event.preventDefault();
			}, function() {
				$( "ul.mob_submenu:first" , main_li ).hide();
				event.preventDefault();
			});
		}
	});

						/* check submenu and add span with desk_has_submenu class */
	$( 'li' , 'ul.desk_menu' ).each( function() {
		if ($(this).has('ul.desk_submenu').length > 0)
		{
			var main_li = $(this);
			
			$( "a:first" , main_li ).append("<span class=\"desk_submenu_icon\">&#9662;</span>");


			$( main_li ).addClass("desk_has_submenu");

			$( ".desk_submenu_icon", main_li ).toggleClick(function(event){ 
				event.preventDefault();
				$( "ul.desk_submenu:first" , main_li ).slideDown(500);
			}, function() {
				$( "ul.desk_submenu:first" , main_li ).slideUp(500);
				event.preventDefault();
			});
		}
	});

	
	$('.desk_has_submenu').hover( function() {
		$('.desk_submenu:first' , $(this) ).stop(true, true).slideDown(250);
		if ($('.desk_submenu:first' , $(this) ).hasClass('desk_subsubmenu'))
		{
			var submenuWidth = $(this).width();
			$('.desk_submenu:first' , $(this) ).css("left",submenuWidth+"px");
		}

	},function() {
		$('.desk_submenu:first' , $(this) ).stop(true, true).slideUp(250);
	});


	checkWidth();
    $(window).resize(checkWidth);
			    
    function checkWidth() {
		if ($(window).width() > 640 && $('.mob_trigger').is(':visible') == false)
		{
			if ($('.mob_trigger').hasClass('mob_trigger_active') == true)
			{
				$('.mob_trigger').click();
			};
		};
	};
				
});