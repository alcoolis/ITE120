/**
 * ALTINTZIS Miltiadis 21/01/2016
 */

function init_ui()
{
	// create hidden search form inside search_form div (created via JQuery to avoid to see the div when tha page first loaded)
	$("#search_form").html("<input id='search_term' type='text' value='' placeholder='text...' /><input id='search_button' type='submit' value='search' />").hide();
	
}

$(function()
{
	init_ui();
	
	var active="favorites";
	
	// change menu items background color
	$(".liMenu a").on("click", function()
	{
		if(this.id!==active)
		{
			$(this).parent().addClass('active');
			$('#'+active).parent().removeClass('active');
			active=this.id;
		}
	});
	
	// open search form
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
	
	//1.make .category div elements clickables
	//2.3. Animation when hover .category div's (lettres left-right and image opacity from 0,4 to 1)
	$(document).on(
	{
		//1.
		click : function() 
		{
			  window.location = $(this).find("a").attr("href"); 
			  return false;
		},
		//2.
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
		//3.
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
	
	// make .clickable div's elements clickable
	$('.clickable').click(function()
	{
		window.location = $(this).find("a").attr("href"); 
		return false;
	});
	
	// Animation when click a menuItem smoothScroll inside page to find the apropriate category
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