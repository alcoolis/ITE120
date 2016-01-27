/**
 * 
 */

$(function()
{
	init_ui();
	
	var active="favorites";
	
	
	//change menu items background color
	$(".liMenu a").on("click", function()
	{
		if(this.id!==active)
		{
			$(this).parent().addClass('active');
			$('#'+active).parent().removeClass('active');
			active=this.id;
		}
	});
	
	//open search form
	$("#search_link").on("click", function()
	{
		if ($("#search_form").is(':visible'))
		{
			$("#search_form").fadeOut(200);
		}
		else
		{
			$("#search_form").fadeIn(700);
		}
	});
	
	// Hover content animation
	$(document).on(
	{
		mouseenter : function()
		{
			$('img', this).fadeTo(200, 1);// 200=ms
			$('.categoryText1', this).animate(
			{
				"left" : "+=15px"
			}, 300);
			$('.categoryText2', this).animate(
			{
				"left" : "-=10px"
			}, 300);
		},
		
		mouseleave : function()
		{
			$('img', this).fadeTo(200, 0.4);// 200=ms
			$('.categoryText1', this).animate(
			{
				"left" : "-=15px"
			}, 300);
			$('.categoryText2', this).animate(
			{
				"left" : "+=10px"
			}, 300);
		}
	}, '.category');
	
	// smoothScroll
	$('a[href*="#"]:not([href="#"])').click(function()
	{
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname)
		{
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length)
			{
				$('html,body').animate(
				{
					scrollTop : target.offset().top - 82
				}, 1000);
				return false;
			}
		}
	});
	
});

function init_ui()
{
	
	$("#search_form").html("<input id='search_term' type='text' value='' placeholder='text...' /><input id='search_button' type='submit' value='search' />").hide();
	
	//categoriesScrollIn();
}
/*
function categoriesScrollIn()
{

	categoriesScrollIn2(450, '#favorites2', '0px', '-700px');
	categoriesScrollIn2(450, '#favorites1', '0px', '+700px');
}

function categoriesScrollIn2(scrollNumber, classText, toPxl, fromPxl)
{
	jQuery(window).scroll(function()
	{
		if (jQuery(this).scrollTop() > scrollNumber)
		{
			if (jQuery(classText).hasClass('visible') == false)
			{
				jQuery(classText).stop().animate(
				{
					right : toPxl
				}, function()
				{
					jQuery(classText).addClass('visible')
				});
			}
		}
		else
		{
			if (jQuery(classText).hasClass('visible') == true)
			{
				jQuery(classText).stop().animate(
				{
					right : fromPxl
				}, function()
				{
					jQuery(classText).removeClass('visible')
				});
			}
		}
	});
}
*/