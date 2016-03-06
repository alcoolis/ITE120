<div class="homeDiv colorFont">
	<div>
		<div class="carousell">
		<?php
		
		$result=connectToDataBase("sql/carousel.sql");
		
		foreach($result as $row)
		{
		    $photo=$row["photo"];
		    $photoID=$row["carousel_ID"];
		    $title=$row["title"];
		    $mainText=$row["main_text"];
		    
		    print <<<HERE
\n		      <div>
		          <img src="$photo" alt="photo moto $photoID">
		          <h1><a class="colorFontLinkNotUnderlined" href="#">$title</a></h1>
		          <p>$mainText</p>
		      </div>
HERE;
		} // end while
		
		?>
			
		</div>
	</div>

	<div id="contentFavorites" class="content">

		<div id="favoritesTitle" class="titles">FAVORITES</div>
		<!-- END of favoritesTitle -->
		<?php 
		$index=1;
		
		$result=connectToDataBase("sql/favorite.sql");
		
		foreach($result as $row)
		{
		    $name=$row["name"];
		    $product_number=$row["product_number"];		
		    $photo=$row["photo"];
		    $engine=$row["engine"];
		    $color=$row["color"];
		    
		    print <<<HERE
\n		  	  <div id="favorites$index" class="category favorites">
        		  <div>
            		  <div class="categoryText1">
            		      <p>$name</p>
            		  </div>
            		  <div class="categoryText2">
            		      <p>
            		          Engine Size: $engine<br> Color: $color
            		      </p>
            		  </div>
            	  </div>
            	  <div>
            		  <a href="/productDiv.php?q=$product_number"></a><img src="$photo" alt="" />
        		  </div>
        	  </div>
        	  <!-- END of favorites$index -->    
HERE;
		    $index++;
		} // end while
		
		?>
	</div>
	<!-- END of contentFavorites -->

	<?php 
	$sqlFiles = array("sql/supersport.sql", "sql/naked.sql", "sql/onOff.sql", "sql/offRoad.sql");
	$outerIndex=1;
	
	$resultOuter=connectToDataBase("sql/paralax.sql");
	
	foreach($resultOuter as $rowOuter)
	{
	   $mainText=$rowOuter["main_text"];
	    
	   print <<<HERE
\n	   <section class="module parallax parallax-$outerIndex">
		    
    		<div id="divImage$outerIndex" class="imageDiv">
    			<div class="imagesContent">
    				<p>$mainText</p>
    			</div>
    		</div>
    		<!-- END of divImage$outerIndex -->
    
    	</section>
		    
	    <div id="content$outerIndex" class="content">
HERE;
print    		'<div id="category'.$outerIndex.'Title" class="titles">Supersport</div>';
print    		'<!-- END of category'.$outerIndex.'Title -->';


       $result=connectToDataBase($sqlFiles[$outerIndex-1]);
	   
	   $innerIndex=1;
    	foreach($result as $row)
    	{
    	    $name=$row["name"];
    	    $product_number=$row["product_number"];
    	    $photo=$row["photo"];
    	    $engine=$row["engine"];
    	    $color=$row["color"];
    	    

print       	    '<div id="content'.$outerIndex.'category'.$innerIndex.'" class="category category'.$outerIndex.'">';
     print <<<HERE
            	    <div>
                	    <div class="categoryText1">
                    	    <p>$name</p>
                	    </div>
                	    <div class="categoryText2">
                    	    <p>
                        	    Engine Size: $engine<br> Color: $color
                    	    </p>
                	    </div>
            	    </div>
            	    <div>
            	       <a href="/productDiv.php?q=$product_number"></a> <img src="$photo" alt="" />
            	    </div>
        	    </div>
HERE;
print         '<!-- END of content'.$outerIndex.'category'.$innerIndex.' -->';

    	}
    	    
    	print <<<HERE
    	</div>
    	<!-- END of content$outerIndex -->
HERE;
    	$outerIndex++;
	}
	
	?>

	<script type="text/javascript">
		(function()
		{
			//parallax-effect plugin
			//parallax-effect images scroll without the same speed as the text 
			var parallax = document.querySelectorAll(".parallax"), speed = 0.8; //parallax speed from 0 (image scroll with text) to 1 (image is fixes)
			window.onscroll = function()
			{
				var index = 1;
				var correction = 0;
				
				[].slice.call(parallax).forEach(function(el, i)
				{
					var windowYOffset = window.pageYOffset;
					
					var elBackgrounPos = "0 " + (windowYOffset - (index * 1400) + correction) * speed + "px";
					
					//console.log(windowYOffset+" - position"+index+"=" +elBackgrounPos);
					//console.log("correction=" + correction);
					
					el.style.backgroundPosition = elBackgrounPos;
					correction = index * 200;
					index++;
				});
			};

			//slick-master plugin
			//carousel of the home page 
			$('.carousell').slick(
			{
				arrows : true,
				dots : true,
				infinite : true,
				speed : 500,
				slidesToScroll : 1,
				cssEase : 'linear',
				autoplay : true,
				prevArrow : "<img id='leftArrow' class='a-left control-c prev slick-prev' src='../img/prev.png'>",
				nextArrow : "<img id='rightArrow' class='a-right control-c next slick-next' src='../img/next.png'>"
			});
			
			//create fade in effect when .category elements first loaded
			jQuery('.category').addClass("hidden").viewportChecker(
			{
				classToAdd : 'visible animated fadeIn',
				offset : 100
			});
		})();
		
	</script>

</div>
<!-- END of homeDiv -->
<?php 
function connectToDataBase($file)
{
    $con= new PDO('mysql:host=localhost;dbname=miltiadi_ite_db', "miltiadi_user", "user");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = file_get_contents($file);
    $result = $con->query($query);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    
    return $result;
}
?>