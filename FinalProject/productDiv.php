<?php 
$amount = 0;
$shipping = 10;
$shipping2 = 20;
$handling = 30;
$item_number = 0;
$image="";

if (isset($_GET['q']))
{
    $item_number = $_GET['q'];

switch ($item_number)
    {
        case 564576846435:
            $item_name = "Yamaha R1";
            $amount = 19000;
            $image="3.jpg";
            break;
        case 64456546563456:
            $item_name = "Ducati Panigale R";
            $amount = 14300;
            $image="1.jpg";
            break;
        case 5645635345345:
            $item_name = "Honda CBR-R";
            $amount = 15600;
            $image="2.jpg";
            break;
        case 563566345345:
            $item_name = "RS - M01";
            $amount = 18900;
            $image="4.jpg";
            break;
        case 643453453453:
            $item_name = "Husaberg FE";
            $amount = 8400;
            $image="16.jpg";
            break;
        case 655645643543:
            $item_name = "Ducati Streetfighter 848cc";
            $amount = 14300;
            $image="5.jpg";
            break;
        case 436435346534:
            $item_name = "Kawasaki Z";
            $amount = 12500;
            $image="6.jpg";
            break;
        case 464365634534:
            $item_name = "MV Agusta Rivale";
            $amount = 11200;
            $image="7.jpg";
            break;
        case 463453453453:
            $item_name = "Ducati Streetfighter 600cc";
            $amount = 11500;
            $image="8.jpg";
            break;
        case 463463453463:
            $item_name = "BMW F 650cc";
            $amount = 11000;
            $image="9.jpg";
            break;
        case 463453453454:
            $item_name = "BMW F 800cc";
            $amount = 15200;
            $image="10.jpg";
            break;
        case 453547456566:
            $item_name = "YAMAHA XT-X";
            $amount = 9900;
            $image="11.jpg";
            break;
        case 634543546565:
            $item_name = "KTM - R";
            $amount = 10100;
            $image="12.jpg";
            break;
        case 465435655645:
            $item_name = "Honda CRF - L";
            $amount = 8000;
            $image="13.jpg";
            break;
        case 645645635334:
            $item_name = "KTM 300 EXC";
            $amount = 9200;
            $image="14.jpg";
            break;
        case 464564545645:
            $item_name = "Husqvarna TC";
            $amount = 7600;
            $image="15.jpg";
            break;
    }
            
}

?>
<div class="productDiv">


	<div class="productGallery">
	
    	<!--start-->
    	<div class="gallery clearfix">
            <div class="pics clearfix">
            
<?php
        if ($item_name == "Yamaha R1")
            echo "<h1>My Baby $item_name</h1>";
        else
            echo "<h1>$item_name</h1>";
?>

                <div class="thumbs">
                    <div class="preview"> <a href="#" class="selected" data-full="../img/bikes/1.jpg" data-title="<?=$item_name?> photo 2"> <img src="../img/bikes/1.jpg"/> </a> </div>
                    <div class="preview"> <a href="#" data-full="../img/bikes/2.jpg" data-title="<?=$item_name?> photo 3"> <img src="../img/bikes/2.jpg"/> </a> </div>
                    <div class="preview"> <a href="#" data-full="../img/bikes/3.jpg" data-title="<?=$item_name?> photo 4"> <img src="../img/bikes/3.jpg"/> </a> </div>
                    <div class="preview"> <a href="#" data-full="../img/bikes/4.jpg" data-title="<?=$item_name?> photo 5"> <img src="../img/bikes/4.jpg"/> </a> </div>
                    <div class="preview"> <a href="#" data-full="../img/bikes/5.jpg" data-title="<?=$item_name?> photo 6"> <img src="../img/bikes/5.jpg"/> </a> </div>
                </div>
                <a href="../img/bikes/<?=$image?>" class="full" title="<?=$item_name?> photo 1"> 
                    <!-- first image is viewable to start --> 
                	<img src="../img/bikes/<?=$image?>"> 
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

			<form id="productFormId" action="https://www.paypal.com/cgi-bin/webscr" method="post">
        		<fieldset>
        			<input type="hidden" name="cmd" value="_cart" />
        			<input type="hidden" name="add" value="1" />
        			<input type="hidden" name="business" value="V96EYD2M4YEV4" />
                    <input type="hidden" name="shipping" value="<?=$shipping?>">
                    <input type="hidden" name="shipping2" value="<?=$shipping2?>">
                    <input type="hidden" name="handling" value="<?=$handling?>">
        			<input type="hidden" name="item_number" value="<?=$item_number?>">
        			<input type="hidden" name="item_name" value="<?=$item_name?>" />
        			<p class="productFormLabels">
                		<label>
            				Price $<?=$amount?>
                			<input type="hidden" name="amount" value="<?=$amount?>"/>
                			<input type="hidden" name="currency_code" value="USD" />
            			</label>
        			</p>
        			<input type="hidden" name="return" value="http://localhost/index.php?q=success" />
        			<input type="hidden" name="cancel_return" value="http://localhost/index.php?q=cancel" />
        			<p class="productFormLabels">
        				<label>
        					Choose Color:
        					<input type="hidden" name="on0" value="Color" />
        					<select id="productColorSelect" name="os0">
        						<option value=""></option>
        						<option value="Black">Black</option>
        						<option value="Red">Red</option>
        						<option value="Yellow">Yellow</option>
        						<option value="Green">Green</option>
        						<option value="Blue">Blue</option>
        					</select>
        				</label>
        			</p>
        			<input class="productFormSubmit"  value="Add to cart" onclick="cartOnClick()"/>
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
