/**
 * 
 */

$(function()
{
	
	var History = window.History;
	
	if (History.enabled)
	{
		State = History.getState();
		
		// set initial state to first page that was loaded
		History.pushState({urlPath : window.location.pathname+"div/homeDiv.html"}, 
				$("title").text(), State.urlPath);
	}
	else
	{
		return false;
	}
	
	var updateContent = function(State)
	{
		var selector = '?q=' + State.data.urlPath.substring(1);
		console.log('in updateContent, url =', State.url);
		
		/*
		if ($(selector).length)
		{ // content is already in #hidden_content
			$('#content').children().appendTo('#hidden_content');
			$(selector).appendTo('#content');
		}
		else
		{
		*/
			//$('#content').children().clone().appendTo('#hidden_content');
		
			$('#container').load(State.url + selector, function() {
				  alert( "Load was performed." );

					$('.divLinks').on('click', 'a', function(e)
					{
						e.preventDefault();// prevents default click action of <a ...>
						
						var urlPath = $(this).attr('href');
						var title = $(this).text();
						History.pushState(
						{
							urlPath : urlPath
						}, title, urlPath);
						
					});
			});
		//}
	};
	
	// Content update and back/forward button handler
	History.Adapter.bind(window, 'statechange', function()
	{
		updateContent(History.getState());
	});
	
	// navigation link handler
	$('.divLinks').on('click', 'a', function(e)
	{
		e.preventDefault();// prevents default click action of <a ...>
		
		var urlPath = $(this).attr('href');
		var title = $(this).text();
		History.pushState(
		{
			urlPath : urlPath
		}, title, urlPath);
		
	});
	
});

