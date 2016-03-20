<?php 
$amount = 0;
$shipping = 100;
$shipping2 = 200;
$handling = 300;
$item_number = 0;
$image;
$imageIndex=0;
$motoEngineID=0;
$motoChassisID=0;
$motoDimensionsID=0;
$motoCapacityID=0;

if (isset($_GET['q']))
{
    $item_number = $_GET['q'];
    
    $sql = "SELECT m.name AS 'name', m.price AS 'price', m.engine_ID AS 'engine_ID', \n"
        ."m.chassis_ID AS 'chassis_ID', m.dimensions_ID AS 'dimensions_ID', m.capacity_ID AS 'capacity_ID',\n"
            ."p.photo AS 'photo' FROM motos m INNER JOIN product_images p ON p.moto_ID=m.moto_ID\n"
                ."WHERE m.product_number=$item_number";
    
    $result = connectToDataBase($sql);
                                            
    foreach($result as $row)
    {
        if($imageIndex==0)
        {
            $item_name = $row["name"];
            $amount = $row["price"];
            $motoEngineID = $row["engine_ID"];
            $motoChassisID = $row["chassis_ID"];
            $motoDimensionsID = $row["dimensions_ID"];
            $motoCapacityID = $row["capacity_ID"];
        }
        $image[$imageIndex] = $row["photo"];
        $imageIndex++;
        
        if($imageIndex==5)
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
            echo "\t\t<h1>$item_name</h1>";
?>

                <div class="thumbs">
                <?php 
                for($i = 0; $i < sizeof($image);$i++)
                {
                    $selected="";
                    
                    if($i==0)
                        $selected="class=\"selected\"";
                        
                    echo "\t".'<div class="preview"> <a href="#" '. $selected .' data-full="' . $image[$i] . '" data-title="' . $item_name . '"photo 2"> <img src="' . $image[$i] . '"/> </a> </div>';
                    echo "\n\t\t";
                }
                ?>

                </div>
                <a href="<?=$image[0]?>" class="full" title="<?=$item_name?> photo 1"> 
                    <!-- first image is viewable to start --> 
                	<img src="<?=$image[0]?>"> 
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
        						
        						<?php 
        						
        						$sql = "SELECT c.color FROM colors c,moto_color mc,motos m WHERE c.color_ID = mc.color_ID \n"
                                            . "AND mc.moto_ID = m.moto_ID AND m.product_number=$item_number";
        						
        						            $result = connectToDataBase($sql);
        						              
        						            echo "\n";
        						            
        						            foreach($result as $row)
        						            {
                                                $motoColor = $row["color"];
                                                echo "\t\t\t\t\t\t\t".'<option value="' .$row["color"]. '">'.$row["color"]."</option>\n";
        						            }
        						
        						?>
        						
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
        		
        				        	<?php 
        						
        						            $sql = "SELECT * FROM engine WHERE engine_ID = $motoEngineID;";
        						
        						            $result = connectToDataBase($sql);
        						              
        						            print "\n";
        						            print "<table>\n<tbody>\n";
        						            
        						            foreach($result as $row)
        						            {
                                                foreach ($row as $name => $value)
                                                {
                                                    if($name!="engine_ID")
                                                        print "<tr>\n".'<td class="titleProduct"><p>' . $name 
                                                            . "</p></td>\n".'<td class="detailProduct"><p>' .  $value . "</p></td>\n</tr>\n";
                                                } // end field loop
                                                print "\n";
        						            }
        						            

        						            print "</tbody>\n</table>\n";
        						
        						     ?>
        		

    		</div>
	       <!-- End of engine -->
    
    		<div id="chassis" class="productTab">
        		<div class="divide-tables">
        			<h2>Chassis</h2>
        		</div>
        		
        		        			<?php 
        						
        						            $sql = "SELECT * FROM chassis WHERE chassis_ID = $motoChassisID;";
        						
        						            $result = connectToDataBase($sql);
        						              
        						            print "\n";
        						            print "<table>\n<tbody>\n";
        						            
        						            foreach($result as $row)
        						            {
                                                foreach ($row as $name => $value)
                                                {
                                                    if($name!="chassis_ID")
                                                        print "<tr>\n".'<td class="titleProduct"><p>' . $name 
                                                            . "</p></td>\n".'<td class="detailProduct"><p>' .  $value . "</p></td>\n</tr>\n";
                                                } // end field loop
                                                print "\n";
        						            }
        						            

        						            print "</tbody>\n</table>\n";
        						
        						     ?>

    		</div>
	       <!-- End of chassis -->
    
  			<div id="dimensions" class="productTab">  
        		<div class="divide-tables">
        			<h2>Dimensions</h2>
        		</div>
        		
        		        			<?php 
        						
        						            $sql = "SELECT * FROM dimensions WHERE dimension_ID = $motoDimensionsID;";
        						
        						            $result = connectToDataBase($sql);
        						              
        						            print "\n";
        						            print "<table>\n<tbody>\n";
        						            
        						            foreach($result as $row)
        						            {
                                                foreach ($row as $name => $value)
                                                {
                                                    if($name!="dimension_ID")
                                                        print "<tr>\n".'<td class="titleProduct"><p>' . $name 
                                                            . "</p></td>\n".'<td class="detailProduct"><p>' .  $value . "</p></td>\n</tr>\n";
                                                } // end field loop
                                                print "\n";
        						            }
        						            

        						            print "</tbody>\n</table>\n";
        						
        						     ?>
        						     
    		</div>
	       <!-- End of dimensions -->
    		
    		<div id="capacities" class="productTab">	
        		<div class="divide-tables">
        			<h2>Capacities</h2>
        		</div>
        		
        		        			<?php 
        						
        						            $sql = "SELECT * FROM capacities WHERE capacity_ID = $motoCapacityID;";
        						
        						            $result = connectToDataBase($sql);
        						              
        						            print "\n";
        						            print "<table>\n<tbody>\n";
        						            
        						            foreach($result as $row)
        						            {
                                                foreach ($row as $name => $value)
                                                {
                                                    if($name!="capacity_ID")
                                                        print "<tr>\n".'<td class="titleProduct"><p>' . $name 
                                                            . "</p></td>\n".'<td class="detailProduct"><p>' .  $value . "</p></td>\n</tr>\n";
                                                } // end field loop
                                                print "\n";
        						            }
        						            

        						            print "</tbody>\n</table>\n";
        						
        						     ?>
        						     
    		</div>
	       <!-- End of capacities -->
    		
    		
		</div>
		
	</div>
	<!-- End of containerProductDiv -->
</div>

<?php
function connectToDataBase($query)
{
    $con= new PDO('mysql:host=localhost;dbname=miltiadi_ite_db', "miltiadi_user", "user");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $con->query($query);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    
    return $result;
}
?>