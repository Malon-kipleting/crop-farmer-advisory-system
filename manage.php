

<script>
function showhideForm(showform) {
    if (showform == "1") {
        document.getElementById("div1").style.display = 'block';
        document.getElementById("div2").style.display = 'none';
        document.getElementById("div3").style.display = 'none';
        document.getElementById("div4").style.display = 'block';
        document.getElementById("div5").style.display = 'none';
        document.getElementById("div6").style.display = 'none';
       
    }
    } 
    if (showform == "2") {
        document.getElementById("div2").style.display = 'block';
        document.getElementById("div1").style.display = 'none';
        document.getElementById("div3").style.display = 'none';
        document.getElementById("div5").style.display = 'block';
        document.getElementById("div6").style.display = 'none';
        document.getElementById("div4").style.display = 'none';

    } 
    if (showform == "3") {
        document.getElementById("div3").style.display = 'block';
        document.getElementById("div2").style.display = 'none';
        document.getElementById("div1").style.display = 'none';
        document.getElementById("div6").style.display = 'block';
        document.getElementById("div5").style.display = 'none';
        document.getElementById("div4").style.display = 'none';

    } 

</script>
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

<div class="container">

<div class="row">

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add Farm</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary" onclick="myFunction('Demo1')">Add Farm</a>
      </div>
      <hr>
      <div id="Demo1" class="w3-accordion-content w3-container">
      <form method="post" action="connection.php">
        <h2 class="text-center">Farm Details</h2>
        <div class="form-group">
          <label for="exampleInputEmail1">Farm Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" autocomplete="false" name="farm_name" aria-describedby="emailHelp"placeholder="Enter farm name" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Farm Location</label>
          <select class="form-control" id="County_id" name="County_id" value="" required>
                                <option value="">Select County..</option>
                                <?php 
    // Retrieve the departments from the database
    $sql=mysqli_query($db,"select * from county_details");
    while ($rw=mysqli_fetch_array($sql)) {
    ?>
                                <option value="<?php echo htmlentities($rw['county_id']);?>">County of
                                    <?php echo htmlentities($rw['county_name']);?></option>
                                <?php
    }
    ?>
                            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Farm Size (In hacteres)</label>
          <input type="number" class="form-control" id="exampleInputEmail1" autocomplete="false" name="farm_size" aria-describedby="emailHelp"placeholder="Enter farm size in Ha">
        </div>
                <input type="submit" name="Add_farm_btn" class="btn btn-success" value="Submit">
      </form>
</div>

       
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Get Advice</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary" onclick="myFunction('Demo3')">Get Advice</a>
      </div>
   <hr>
      <div id="Demo3" class="w3-accordion-content w3-content p-2">
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

</div>    
</div>  
</div>
  <br>
 

            <div id="main">
              
            <?php
include './components/footer.php';
?>
        </div>
            <script>
function myFunction(id) {
    document.getElementById(id).classList.toggle("w3-show");
}
</script>
<?php
include './components/scripts.php';
?>

    </body>
</html>
