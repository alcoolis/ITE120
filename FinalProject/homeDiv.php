
<div class="homeDiv colorFont">
	<div>
		<div class="carousell">
		<?php
		
		$con= new PDO('mysql:host=localhost;dbname=miltiadi_ite_db', "miltiadi_user", "user");
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = file_get_contents("sql/carousel.sql");
		$result = $con->query($query);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		
		foreach($result as $row)
		{
		    $photo=$row["photo"];
		    $photoID=$row["carousel_photo_ID"];
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
		
		$con= new PDO('mysql:host=localhost;dbname=miltiadi_ite_db', "miltiadi_user", "user");
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = file_get_contents("sql/favorite.sql");
		$result = $con->query($query);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		
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



	<section class="module parallax parallax-1">


		<div id="divImage1" class="imageDiv">
			<div class="imagesContent">
				<p>Supersport motorcycles can refer to any class of fully-faired
					sportbikes purpose-built for the racetrack. In more specific terms
					supersport refers to a distinct sportbike motorcycle segment best
					typified by the 600cc Inline Four racebikes. The little siblings to
					the superbike class, supersports are characterized by top-end
					biased powerbands and the highest redlines on production
					motorcycles.
				</p>
			</div>
		</div>
		<!-- END of divImage1 -->

	</section>

	<div id="content1" class="content">

		<div id="category1Title" class="titles">Supersport</div>
		<!-- END of category1Title -->

		<div id="content1category1" class="category category1">
			<div>
				<div class="categoryText1">
					<p>Ducati Panigale R</p>
				</div>
				<div class="categoryText2">
					<p>
						Engine Size: 1198 cc<br> Color: Red
					</p>
				</div>
			</div>
			<div>
				<a href="/productDiv.php?q=Ducati%20Panigale%20R"></a> <img src="../../img/bikes/1.jpg" alt="" />
			</div>
		</div>
		<!-- END of content1category1 -->
		
		<div id="content1category2" class="category category1">
			<div>
				<div class="categoryText1">
					<p>Honda CBR-R</p>
				</div>
				<div class="categoryText2">
					<p>
						Engine Size: 1198 cc<br> Color: Black
					</p>
				</div>
			</div>
			<div>
				<a href="/productDiv.php?q=Honda%20CBR-R"></a> <img src="../../img/bikes/2.jpg" alt="" />
			</div>
		</div>
		<!-- END of content1category2 -->
		
		<div id="content1category3" class="category category1">
			<div>
				<div class="categoryText1">
					<p>Yamaha R1</p>
				</div>
				<div class="categoryText2">
					<p>
						Engine Size: 1000 cc<br> Color: Black
					</p>
				</div>
			</div>
			<div>
				<a href="/productDiv.php?q=Yamaha%20R1"></a> <img src="../../img/bikes/3.jpg" alt="" />
			</div>
		</div>
		<!-- END of content1category3 -->
		
		<div id="content1category4" class="category category1">
			<div>
				<div class="categoryText1">
					<p>RS - M01</p>
				</div>
				<div class="categoryText2">
					<p>
						Engine Size: 1198 cc<br> Color: Red
					</p>
				</div>
			</div>
			<div>
				<a href="/productDiv.php?q=RS%20-%20M01"></a> <img src="../../img/bikes/4.jpg" alt="" />
			</div>
		</div>
		<!-- END of content1category4 -->

	</div>
	<!-- END of content1 -->


	<section class="module parallax parallax-2">
		<div id="divImage2" class="imageDiv">
			<div class="imagesContent">
				<p>Standards, also called naked bikes or roadsters, are
					versatile, general purpose street motorcycles. They are
					recognized primarily by their upright riding position, partway
					between the reclining rider posture of the cruisers and the forward
					leaning sport bikes. Footpegs are below the rider and handlebars
					are high enough to not force the rider to reach far forward,
					placing the shoulders above the hips in a natural position.
					Because of their flexibility, lower costs and their engines of
					moderate output, standards are particularly suited to motorcycle
					beginners
				</p>
			</div>
		</div>
		<!-- END of divImage2 -->


	</section>

	<div id="content2" class="content">

		<div id="category2Title" class="titles">Naked</div>
		<!-- END of category2Title -->

		<div id="content2category1" class="category category2">
			<div>
				<div class="categoryText1">
					<p>Ducati Streetfighter 848cc</p>
				</div>
				<div class="categoryText2">
					<p>
						Engine Size: 848 cc<br> Color: Red
					</p>
				</div>
			</div>
			<div>
				<a href="/productDiv.php?q=Ducati%20Streetfighter%20848cc"></a> <img src="../img/bikes/5.jpg" alt="" />
			</div>
		</div>
		<!-- END of content2category1 -->
		
		<div id="content2category2" class="category category2">
			<div>
				<div class="categoryText1">
					<p>Kawasaki Z</p>
				</div>
				<div class="categoryText2">
					<p>
						Engine Size: 750 cc<br> Color: Black
					</p>
				</div>
			</div>
			<div>
				<a href="/productDiv.php?q=Kawasaki%20Z"></a> <img src="../img/bikes/6.jpg" alt="" />
			</div>
		</div>
		<!-- END of content2category2 -->
		
		<div id="content2category3" class="category category2">
			<div>
				<div class="categoryText1">
					<p>MV Agusta Rivale</p>
				</div>
				<div class="categoryText2">
					<p>
						Engine Size: 800 cc<br> Color: Silver
					</p>
				</div>
			</div>
			<div>
				<a href="/productDiv.php?q=MV%20Agusta%20Rivale"></a> <img src="../img/bikes/7.jpg" alt="" />
			</div>
		</div>
		<!-- END of content2category3 -->
		
		<div id="content2category4" class="category category2">
			<div>
				<div class="categoryText1">
					<p>Ducati Streetfighter 600cc</p>
				</div>
				<div class="categoryText2">
					<p>
						Engine Size: 600 cc<br> Color: Black
					</p>
				</div>
			</div>
			<div>
				<a href="/productDiv.php?q=Ducati%20Streetfighter%20600cc"></a> <img src="../img/bikes/8.jpg" alt="" />
			</div>
		</div>
		<!-- END of content2category4 -->

	</div>
	<!-- END of content2 -->



	<section class="module parallax parallax-3">

		<div id="divImage3" class="imageDiv">
			<div class="imagesContent">
				<p>Dual-sports, sometimes called dual-purpose or on/off-road
					motorcycles, are street legal machines that are also designed to
					enter off-road situations. Typically based on a dirt bike
					chassis, they have added lights, mirrors, signals, and instruments
					that allow them to be licensed for public roads. They are higher
					than other street bikes, with a high center of gravity and tall
					seat height, allowing good suspension travel for rough ground.
				</p>
			</div>
		</div>
		<!-- END of divImage3 -->

	</section>


	<div id="content3" class="content">

		<div id="category3Title" class="titles">On-Off</div>
		<!-- END of category3Title -->

		<div id="content3category1" class="category category3">
			<div>
				<div class="categoryText1">
					<p>BMW F 650cc</p>
				</div>
				<div class="categoryText2">
					<p>
						Engine Size: 650 cc<br> Color: Black - Silver
					</p>
				</div>
			</div>
			<div>
				<a href="/productDiv.php?q=BMW%20F%20650cc"></a> <img src="../img/bikes/9.jpg" alt="" />
			</div>
		</div>
		<!-- END of content3category1 -->
		
		<div id="content3category2" class="category category3">
			<div>
				<div class="categoryText1">
					<p>BMW F 800cc</p>
				</div>
				<div class="categoryText2">
					<p>
						Engine Size: 800 cc<br> Color: Black - Orange
					</p>
				</div>
			</div>
			<div>
				<a href="/productDiv.php?q=BMW%20F%20800cc"></a> <img src="../img/bikes/10.jpg" alt="" />
			</div>
		</div>
		<!-- END of content3category2 -->
		
		<div id="content3category3" class="category category3">
			<div>
				<div class="categoryText1">
					<p>YAMAHA XT-X</p>
				</div>
				<div class="categoryText2">
					<p>
						Engine Size: 600 cc<br> Color: Black
					</p>
				</div>
			</div>
			<div>
				<a href="/productDiv.php?q=YAMAHA%20XT-X"></a> <img src="../img/bikes/11.jpg" alt="" />
			</div>
		</div>
		<!-- END of content3category3 -->
		
		<div id="content3category4" class="category category3">
			<div>
				<div class="categoryText1">
					<p>KTM - R</p>
				</div>
				<div class="categoryText2">
					<p>
						Engine Size: 690 cc<br> Color: Black - Orange - White
					</p>
				</div>
			</div>
			<div>
				<a href="/productDiv.php?q=KTM%20-%20R"></a> <img src="../img/bikes/12.jpg" alt="" />
			</div>
		</div>
		<!-- END of content3category4 -->

	</div>
	<!-- END of content3 -->


	<section class="module parallax parallax-4">

		<div id="divImage4" class="imageDiv">
			<div class="imagesContent">
				<p>There are various types of off-road motorcycles, also known
					as dirt bikes, specially designed for off-road events. The term
					off-road refers to a driving surface that is not conventionally
					paved. This is a rough surface, often created naturally, such as
					sand, gravel, a river, mud or snow. This type of terrain can
					sometimes only be travelled on with vehicles designed for off-road
					driving (such as SUVs, ATVs, snowmobiles or mountain bikes) or
					vehicles that have off-road equipment.
				</p>
			</div>
		</div>
		<!-- END of divImage4 -->

	</section>

	<div id="content4" class="content">

		<div id="category4Title" class="titles">Off-Road</div>
		<!-- END of category4Title -->

		<div id="content4category1" class="category category4">
			<div>
				<div class="categoryText1">
					<p>Honda CRF - L</p>
				</div>
				<div class="categoryText2">
					<p>
						Engine Size: 250 cc<br> Color: Black - Red - White
					</p>
				</div>
			</div>
			<div>
				<a href="/productDiv.php?q=Honda%20CRF%20-%20L"></a> <img src="../img/bikes/13.jpg" alt="" />
			</div>
		</div>
		<!-- END of content4category1 -->
		
		<div id="content4category2" class="category category4">
			<div>
				<div class="categoryText1">
					<p>KTM 300 EXC</p>
				</div>
				<div class="categoryText2">
					<p>
						Engine Size: 300 cc<br> Color: Black - Orange - White
					</p>
				</div>
			</div>
			<div>
				<a href="/productDiv.php?q=KTM%20300%20EXC"></a> <img src="../img/bikes/14.jpg" alt="" />
			</div>
		</div>
		<!-- END of content4category2 -->
		
		<div id="content4category3" class="category category4">
			<div>
				<div class="categoryText1">
					<p>Husqvarna TC</p>
				</div>
				<div class="categoryText2">
					<p>
						Engine Size: 250 cc<br> Color: Blue - Yellow - White
					</p>
				</div>
			</div>
			<div>
				<a href="/productDiv.php?q=Husqvarna%20TC"></a> <img src="../img/bikes/15.jpg" alt="" />
			</div>
		</div>
		<!-- END of content4category3 -->
		
		<div id="content4category4" class="category category4">
			<div>
				<div class="categoryText1">
					<p>Husaberg FE</p>
				</div>
				<div class="categoryText2">
					<p>
						Engine Size: 350 cc<br> Color: Blue - White - Yellow
					</p>
				</div>
			</div>
			<div>
				<a href="/productDiv.php?q=Husaberg%20FE"></a> <img src="../img/bikes/16.jpg" alt="" />
			</div>
		</div>
		<!-- END of content4category4 -->

	</div>
	<!-- END of content4 -->

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


