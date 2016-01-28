/**
 * ALTINTZIS Miltiadis 21/01/2016
 */


function init()
{
	//load home div when page is first time loaded
	ajaxCall("div/homeDiv.html", false);
	
};

$(function()
{
	init();

	//load div's when button from upperNav menu is clicked (button id=div name inside div folder)
	$('#upperNav a').click(function()
	{
		ajaxCall("div/"+this.id+".html", false);
	});
	
	//load searchDiv.html when search_button is clicked
	$('#search_button').click(function()
	{
		ajaxCall("div/searchDiv.html", true); //flag true for calling doSearch(); inside ajaxCall function
	});
});

//calling for loading div's inside the container div of index.html
function ajaxCall(urlAjax, flag)
{
	$.ajax(
	{
		url : urlAjax,
		type : "post",
		dataType : "html",
		success : function(data)
		{
			$('#container').html(data);
			
			if (flag)
			{
				doSearch();
			}
		}
	});
	
}

//google search module
function doSearch()
{
	var ss = $("#search_term").val();
	$("#search_term").val('');
	// Create a search control
	var searchControl = new google.search.SearchControl();
	
	searchControl.addSearcher(new google.search.WebSearch());
	
	searchControl.setResultSetSize(google.search.Search.LARGE_RESULTSET);
	
	searchControl.draw(document.getElementById("searchcontrol"));
	
	// execute an inital search
	searchControl.execute(ss);
	
	$("#search_form").fadeOut(200);
	$('#searchcontrol form').hide();
	$('#searchcontrol table').hide();
	$('.gsc-control').css("width", "80%");
	$('.gsc-control').css("margin", "0 auto");

}