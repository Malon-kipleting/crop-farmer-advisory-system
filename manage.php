<?php
include 'connection.php';
$name =  $_SESSION['farmerFname'] . " ". $_SESSION['farmerLname'];
?>

<!DOCTYPE html>
<html>
<head>
     
     <title>Manage farm</title>
     <?php
include './components/header.php';
?>
     
 </head>
    <body class="w3-responsive w3-mobile">
  
<?php
include './components/navbar.php';
?>

              
                <div class="w3-accordion">
  <button onclick="myFunction('Demo1')" class="w3-btn-block w3-left-align">Add Farm</button>
  <div id="Demo1" class="w3-accordion-content w3-container">
    <div class="w3-container" id="add">
                   <div style="width: 40%">
    <h4>Add farm</h4>
    <form method="post" action="addfarm">
        <fieldset id="middle" class="w3-card-2">
            Farm Name:<br>
            <input type="text" autocomplete="false" name="farm_name" placeholder="Farm Name" required=""><br>
            Farm location:<br>
            <input type="text" autocomplete="false" name="county" placeholder="Farm location" required=""><br>
            Farm size:<br>
            <input type="number" autocomplete="false" name="farm_size" placeholder="Farm size in hacters" required=""><br>
            Type of crop planted:<br>
            <input type="text" autocomplete="false" name="crop_name" placeholder="Type of crop planted" required=""><br>
            date planted:<br>
            <input type="date" autocomplete="false" name="date_planted" required=""><br>
            
            <p> <input type="submit" value="Submit" >
                <input type="Reset" value="Reset">
            </p>
           
        </fieldset>
    </form>

    <p></p>
  </div> 
            </div>
  </div>

  <button onclick="myFunction('Demo3')" class="w3-btn-block w3-left-align">Get Advice</button>
  <div id="Demo3" class="w3-accordion-content w3-content">
    <h4>Advice</h4>
    
    <div class="w3-content">
<form onsubmit="return fromSubmited()" name="form1">
	<div>
			What do you want to do?:
<input type="radio" id="showform" value="1" name="showform" onchange="showhideForm(this.value);"/>Plant
<input type="radio" id="showform" value="2" name="showform" onchange="showhideForm(this.value);"/>Spray
<input type="radio" id="showform" value="3" name="showform" onchange="showhideForm(this.value);"/>Harvest


</div>
	
<div id="div1" style="display: none;">
	<!-- plant -->
Where is the farm located?:
	<select name="county">
        <option value="Baringo">Baringo
            <option value="Bomet">Bomet
            <option value="Bungoma">Bungoma
            <option value="Busia">Busia 
            <option value="Elgeyo Marakwet County">Elgeyo Marakwet County 
             <option value="Embu County">Embu County
            <option value="Garissa County">Garissa County
            <option value="Homa Bay County">Homa Bay County
            <option value="Isiolo County">Isiolo County
            <option value="Kajiado County">Kajiado County
            <option value="Kakamega County">Kakamega County
            <option value="Kericho County">Kericho County   
            <option value="Kiambu County">Kiambu County
            <option value="Kilifi County">Kilifi County
            <option value="Kirinyaga County">Kirinyaga County
            <option value="Kisii County">Kisii County
            <option value="Kisumu County">Kisumu County
            <option value="Kitui County">Kitui County
            <option value="Kwale County">Kwale County
            <option value="Laikipia County">Laikipia County
            <option value="Lamu County">Lamu County
            <option value="Machakos County">Machakos County
            <option value="Makueni County">Makueni County
            <option value="Mandera County">Mandera County
            <option value="Meru County">Meru County
            <option value="Migori County">Migori County
            <option value="Marsabit County">Marsabit County
            <option value="Mombasa County">Mombasa County
            <option value="Muranga County">Muranga County
            <option value="Nairobi County">Nairobi County
            <option value="Nakuru County">Nakuru County
            <option value="Nandi County">Nandi County
            <option value="Narok County">Narok County
            <option value="Nyamira County">Nyamira County
            <option value="Nyandarua County">Nyandarua County
            <option value="Nyeri County">Nyeri County
            <option value="Samburu County">Samburu County
            <option value="Siaya County">Siaya County
            <option value="Taita Taveta County">Taita Taveta County
            <option value="Tana River County">Tana River County
            <option value="Tharaka Nithi County">Tharaka Nithi County
            <option value="Trans Nzoia County">Trans Nzoia County
            <option value="Turkana County">Turkana County
            <option value="Uasin Gishu County">Uasin Gishu County
            <option value="Vihiga County">Vihiga County
            <option value="Wajir County">Wajir County
            <option value="West Pokot County">West Pokot County
	</select>
	<div>
		Farm Size:<br>
		<input type="number" required="" name="farmsize"><br>
	</div>

</div>
<div id="div2" style="display: none;">
	<!-- spray -->
	<div>
		Farm Size:<br>
		<input type="number" required="" name="farmsize2"><br>
		Date planted:<br>
		<input type="date" required="" name="date_planted"><br>
	</div>
</div>

<div id="div3" style="display: none;">
	<!-- harvest -->
	<div>
		
		Date planted:<br>
		<input type="date" name="date_planted"><br>
	</div>
</div>
<div id="div4" style="display: none;">
	farm size:
<p id="demo123">Result will be shown here</p>
	county:
<p id="demo124">Result will be shown here</p>
	Type of crop to be planted:
<p id="demo201">Result will be shown here</p>
	fertilizer to be used:
	<div id="div10" style="display: none;">
<ul>
<li> Apply <strong id="demo125">Result will be shown here</strong> Kgs Diammonium phosphate (DAP-18% N and 46%
P2O5)  in the rows at planting.</li>
<li> On acidic soils  apply same Amount as in above, of Monoammonium Phosphate (MAP11%N and 50% P2O5) can be used</li>
</ul>
</div>
<button type="button" onclick="myFunction()">Get Advice</button>
</div>
<div id="div5" style="display: none;">
	What to do:
<p id="demo126">Result will be shown here</p>
	farm size:
<p id="demo127">Result will be shown here</p>
	Spray to be used:
<p id="demo128">Result will be shown here</p>
	Amount of spray to be used:
<p id="demo129">Result will be shown here</p>
<button type="button" onclick="myFunction()">Get advice</button>
</div>
<div id="div6" style="display: none;">
	Date of Harvest:
<p id="demo131">Result will be shown here</p>
<button type="button" onclick="myFunction()">Get advice</button>
</div>

	<!-- <input type="submit" value="submit"> -->
</form>
        <br>
</div>
    
</div>
  <br>
 

            <div id="main">
              
            <div id="footer" class="w3-footer w3-center w3-green">
                Crop Farmer's Advisory System: A case of Best Practices &copy; 2023
            </div>
        </div>
            <script>
function myFunction(id) {
    document.getElementById(id).classList.toggle("w3-show");
}
</script>
    </body>
</html>
