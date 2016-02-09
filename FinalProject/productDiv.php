<?php 
$productPrice = 19000;
$clientMail = "your_mail@domain.com";


?>
<div class="productDiv">


	<div class="productGallery">
	
    	<!--start-->
    	<div class="gallery clearfix">
            <div class="pics clearfix">
            
<?php

if (isset($_GET['q']))
{
    $request = $_GET['q'];
    
    if ($request == "Yamaha_R1")
        echo "<h1>My Baby $request</h1>";
    else
        echo "<h1>$request</h1>";
}
?>
                <div class="thumbs">
                    <div class="preview"> <a href="#" class="selected" data-full="../img/bikes/1.jpg" data-title="Spring 2013 | Luna + Hill"> <img src="../img/bikes/1.jpg"/> </a> </div>
                    <div class="preview"> <a href="#" data-full="../img/bikes/2.jpg" data-title="Spring 2013 | Luna + Hill"> <img src="../img/bikes/2.jpg"/> </a> </div>
                    <div class="preview"> <a href="#" data-full="../img/bikes/3.jpg" data-title="Spring 2013 | Luna + Hill"> <img src="../img/bikes/3.jpg"/> </a> </div>
                    <div class="preview"> <a href="#" data-full="../img/bikes/4.jpg" data-title="Spring 2013 | Luna + Hill"> <img src="../img/bikes/4.jpg"/> </a> </div>
                    <div class="preview"> <a href="#" data-full="../img/bikes/5.jpg" data-title="Spring 2013 | Luna + Hill"> <img src="../img/bikes/5.jpg"/> </a> </div>
                </div>
                <a href="../img/bikes/1.jpg" class="full" title="Spring 2013 | Luna + Hill"> 
                    <!-- first image is viewable to start --> 
                	<img src="../img/bikes/3.jpg"> 
                </a> 
            </div>
    	</div>
    	<!--end-->
		<div class="menuBarProductDiv">
			<ul class="tab-links">
				<li class="one productActive"><a href="#engine">Engine</a></li>
				<li class="two"><a href="#chassis">Chassis</a></li>
				<li class="three"><a href="#dimensions">Dimensions</a></li>
				<li class="four"><a href="#capacities">Capacities</a></li>
				<hr />
			</ul>
		</div>

	</div>
	
	<div id="containerProductDiv">

			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        		<fieldset>
        			<input type="hidden" name="cmd" value="_cart" />
        			<input type="hidden" name="add" value="1" />
        			<input type="hidden" name="business" value="V96EYD2M4YEV4" />
        			<input type="hidden" name="item_name" value="malakia" />
        			<p class="productFormLabels">
                		<label>
            				Price $120
                			<input type="hidden" name="amount" value="120" />
                			<input type="hidden" name="currency_code" value="USD" />
            			</label>
        			</p>
        			<input type="hidden" name="return" value="http://localhost/minicartjs.com/?success" />
        			<input type="hidden" name="cancel_return" value="http://localhost/minicartjs.com/?cancel" />
        			<p class="productFormLabels">
        				<label>
        					Choose Color:
        					<input type="hidden" name="on0" value="Color" />
        					<select name="cartProductColor">
        						<option value="Bi">Bi</option>
        						<option value="Black">Black</option>
        						<option value="Red">Red</option>
        						<option value="Yellow">Yellow</option>
        						<option value="Green">Green</option>
        						<option value="Blue">Blue</option>
        					</select>
        				</label>
        			</p>
        			<input class="productFormSubmit" type="submit" value="Add to cart" />
        		</fieldset>
        	</form>
	
		<div class="specifictionsTables">
	
	
			<div id="engine" class="productTab productActive">
        		<div class="divide-tables">
        			<h2>Engine</h2>
        		</div>
        		
        		<table>
        			<tbody>
        				<tr>
        					<td class="titleProduct"><p>Engine type</p></td>
        					<td class="detailProduct"><p>liquid-cooled, 4-stroke, DOHC, forward-inclined parallel 4-cylinder, 4-valves</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Displacement</p></td>
        					<td class="detailProduct"><p>998cc</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Bore x stroke</p></td>
        					<td class="detailProduct"><p>79.0 mm x 50.9 mm</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Compression ratio</p></td>
        					<td class="detailProduct"><p>13.0 : 1</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Maximum power</p></td>
        					<td class="detailProduct"><p>147.1 kW (200.0PS) @ 13,500 rpm</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Maximum Torque</p></td>
        					<td class="detailProduct"><p>112.4 Nm (11.5 kg-m) @ 11,500 rpm</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Lubrication system</p></td>
        					<td class="detailProduct"><p>Wet sump</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Clutch Type</p></td>
        					<td class="detailProduct"><p>Wet, Multiple Disc</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Carburettor</p></td>
        					<td class="detailProduct"><p>Fuel Injection</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Ignition system</p></td>
        					<td class="detailProduct"><p>TCI (digital)</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Starter system</p></td>
        					<td class="detailProduct"><p>Electric</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Transmission system</p></td>
        					<td class="detailProduct"><p>Constant Mesh, 6-speed</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Final transmission</p></td>
        					<td class="detailProduct"><p>Chain</p></td>
        				</tr>
        			</tbody>
        		</table>
    		</div>
	       <!-- End of engine -->
    
    		<div id="chassis" class="productTab">
        		<div class="divide-tables">
        			<h2>Chassis</h2>
        		</div>
        		
        		<table>
        			<tbody>
        				<tr>
        					<td class="titleProduct"><p>Frame</p></td>
        					<td class="detailProduct"><p>Aluminium Deltabox</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Front suspension system</p></td>
        					<td class="detailProduct"><p>Telescopic forks, 43 mm</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Front travel</p></td>
        					<td class="detailProduct"><p>120 mm</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Caster Angle</p></td>
        					<td class="detailProduct"><p>24</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Trail</p></td>
        					<td class="detailProduct"><p>102 mm</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Rear suspension system</p></td>
        					<td class="detailProduct"><p>Swingarm, (link suspension)</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Rear Travel</p></td>
        					<td class="detailProduct"><p>120 mm</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Front brake</p></td>
        					<td class="detailProduct"><p>Hydraulic dual disc, 320 mm</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Rear brake</p></td>
        					<td class="detailProduct"><p>Hydraulic single disc, 220 mm</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Front tyre</p></td>
        					<td class="detailProduct"><p>120/70 ZR17M/C (58W)</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Rear tyre</p></td>
        					<td class="detailProduct"><p>190/55 ZR17M/C (75W)</p></td>
        				</tr>
        			</tbody>
        		</table>
    		</div>
	       <!-- End of chassis -->
    
  			<div id="dimensions" class="productTab">  
        		<div class="divide-tables">
        			<h2>Dimensions</h2>
        		</div>
        		<table>
        			<tbody>
        				<tr>
        					<td class="titleProduct"><p>Overall length</p></td>
        					<td class="detailProduct"><p>2,055 mm</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Overall width</p></td>
        					<td class="detailProduct"><p>690 mm</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Overall height</p></td>
        					<td class="detailProduct"><p>1,150 mm</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Seat height</p></td>
        					<td class="detailProduct"><p>855 mm</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Wheel base</p></td>
        					<td class="detailProduct"><p>1,405 mm</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Minimum ground clearance</p></td>
        					<td class="detailProduct"><p>130 mm</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Wet weight (including full oil and fuel tank)</p></td>
        					<td class="detailProduct"><p>199 kg</p></td>
        				</tr>
        			</tbody>
        		</table>
    		</div>
	       <!-- End of dimensions -->
    		
    		<div id="capacities" class="productTab">	
        		<div class="divide-tables">
        			<h2>Capacities</h2>
        		</div>
        		<table>
        			<tbody>
        				<tr>
        					<td class="titleProduct"><p>Fuel tank capacity</p></td>
        					<td class="detailProduct"><p>17 litres</p></td>
        				</tr>
        				<tr>
        					<td class="titleProduct"><p>Oil tank capacity</p></td>
        					<td class="detailProduct"><p>3.9 litres</p></td>
        				</tr>
        			</tbody>
        		</table>
    		</div>
	       <!-- End of capacities -->
    		
    		
		</div>
		
	</div>
	<!-- End of containerProductDiv -->
</div>
