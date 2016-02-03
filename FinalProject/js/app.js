var loginFlag=-1;

function init()
{
	//load home div when page is first time loaded
	ajaxCall("div/homeDiv.html", 1);

};

$(function()
{
	init();

	//load div's when button from upperNav menu is clicked (button id=div name inside div folder)
	$('.divLinks a').click(function()
	{
		doClick(this.id);
	});
	
	//load searchDiv.html when search_button is clicked
	$('#search_button').click(function()
	{
		ajaxCall("div/searchDiv.html", 2); //flag true for calling doSearch(); inside ajaxCall function
		$('#menu').removeClass('visible');
	});
});

function doClick(div, flag)
{ 
	var extention='';
	
	if (div === 'loginDiv' || div === 'cartDiv')
		extension='.php';
	else
		extension='.html';
	
	ajaxCall("div/" + div + extension, flag);
	
	if (div === "homeDiv")
	{
		$('#menu').addClass('visible');
	}
	else
	{
		$('#menu').removeClass('visible');
		
	}
}

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
		}
	}).done(function()
	{
		
		if (flag==2)
		{
			// it runs after searchDiv is loaded
			doSearch();
		}
		else if(flag==3)
		{
			$('.logTooltip').text('Click To Register');
			// hide-show the button resetPass
			$('.resetPass').show('slow');
			$('.logForm-module .logForm').css('display', 'none');
			$('.logForm-module .logForm:nth-child(2)').css('display', 'block');
			
			if(loginFlag==1 || loginFlag<0)
			{
				$('.logForm-module .logForm').css('display', 'block');
				$('.logForm-module .logForm:nth-child(2)').css('display', 'none');
				
				toggleloginRegister(this);

				loginFlag=2;
			}
			
		}
		else if(flag==4)
		{	
			$('.logTooltip').text('Click To Login');
			// hide-show the button resetPass
			$('.resetPass').hide();
			$('.logForm-module .logForm').css('display', 'block');
			$('.logForm-module .logForm:nth-child(2)').css('display', 'none');

			if(loginFlag==2 || loginFlag<0)
			{
				$('.logForm-module .logForm').css('display', 'none');
				$('.logForm-module .logForm:nth-child(2)').css('display', 'block');
				
				toggleloginRegister(this);
				
				loginFlag=1;
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

function toggleloginRegister(element)
{
	
	// switch the icon
	$(element).children('i').toggleClass('fa-pencil');
	
	// switch the formes
	$('.logForm').animate(
	{
		height : "toggle",
		'padding-top' : 'toggle',
		'padding-bottom' : 'toggle',
		opacity : "toggle"
	}, "slow");
}