/**
 * 
 */

$(function()
{
	init();
	
	$('#upperNav a').click(function()
	{
		var link=this.id;
		ajaxCall("div/"+link+".html", false);
	});
	
	$('#search_button').click(function()
	{
		ajaxCall("div/searchDiv.html", true);
	});
});

function ajaxCall(urlAjax, flag)
{
	$.ajax(
	{
		url : urlAjax,
		type : "post",
		dataType : "html",
		success : function(data)
		{
			$('#ajaxDiv').html(data);
			
			if (flag)
			{
				doSearch();
			}
		}
	});
	
}

function init()
{
	ajaxCall("div/homeDiv.html", false);
	
};

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