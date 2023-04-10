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

$farmer_id = $_SESSION['farmerId'];

function generateRequestId() {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $length = 7;
  $requestId = '';
  for ($i = 0; $i < $length; $i++) {
    $requestId .= $characters[rand(0, strlen($characters) - 1)];
  }
  return $requestId;
}

if (isset($_POST['get_advice_btn'])) {
  $requestId = generateRequestId();

  $farmer = $_POST['farmr_id'];
  $farm_id = $_POST['farm_id'];
  $activity_id = $_POST['activity_id'];
  $crop_id = $_POST['crop_id'];
  $date = $_POST['date_id'];
  $request_message = $_POST['request_message'];


  if (empty($farm_id)) {
    array_push($errors, "Farm_id required");
  }
  if (empty($activity_id)) {
    array_push($errors, "Choose your activity");
  }
  if (empty($crop_id)) {
    array_push($errors, "Choose the type of crop");
  }
  if (empty($date)) {
    array_push($errors, "Select the date of activity");
  }
  if (empty($request_message)) {
    array_push($errors, "Please input your request");
  }

  if (count($errors) == 0) {
   
    $request_query = "INSERT INTO `farmer_request_advice_details`(`request_id`, `farmer_id`, `farm_id`, `crop_id`, `activity_id`, `short_description`)
     VALUES ('$requestId','$farmer','$farm_id','$crop_id','$activity_id','$request_message')";
    $request_results = mysqli_query($db, $request_query);

    $advice_query = "INSERT INTO `request_response_details`(`request_id`, `request_status`) VALUES ('$requestId','Pending')";
    $advice_result = mysqli_query($db, $advice_query);
    
    header('location: response.php');
  }else{
    array_push($errors, "unable to push requests");
    header('location: advice.php');
  }
  
     
    }

?>

<!DOCTYPE html>
<html>

<head>

    <title>Get Advice</title>
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
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Get Advice</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary" onclick="myFunction('Demo3')">Get Advice</a>
                    </div>
                    <hr>
                    <div id="Demo3" class="w3-accordion-content w3-content p-2">
                        <h4 class="text-center">Get Advice</h4>

                        <div class="w3-content">

                            <form name="form1" method="POST" action="">
                                <input type="text" required readonly hidden name="farmr_id" class="form-control"
                                    value="<?php echo $farmer_id; ?>" id="exampleFormControlInput1">

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Farm</label>
                                    <select class="form-control" id="farm_id" name="farm_id" required>
                                        <option value="">Select Farm..</option>
                                        <?php 
    // Retrieve the Activity from the database
    $sql=mysqli_query($db,"select * from farm_details INNER JOIN farmer_owner_details ON farmer_owner_details.farm_id =farm_details.farm_id WHERE farmer_owner_details.owner_id='$farmer_id'  ");
    while ($rw=mysqli_fetch_array($sql)) {
    ?>
                                        <option value="<?php echo htmlentities($rw['farm_id']);?>">
                                            <?php echo htmlentities($rw['farm_name']);?></option>
                                        <?php
    }
    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Activity</label>
                                    <select class="form-control" id="activity_id" name="activity_id" required>
                                        <option value="">Select Activity..</option>
                                        <?php 
    // Retrieve the Crop from the database
    $sql=mysqli_query($db,"select * from activity_details");
    while ($rw=mysqli_fetch_array($sql)) {
    ?>
                                        <option value="<?php echo htmlentities($rw['activity_id']);?>">
                                            <?php echo htmlentities($rw['activity_name']);?></option>
                                        <?php
    }
    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Crop</label>
                                    <select class="form-control" id="crop_id" name="crop_id" required>
                                        <option value="">Select Crop..</option>
                                        <?php 
    // Retrieve the Crop from the database
    $sql=mysqli_query($db,"select * from crop_details");
    while ($rw=mysqli_fetch_array($sql)) {
    ?>
                                        <option value="<?php echo htmlentities($rw['crop_id']);?>">
                                            <?php echo htmlentities($rw['crop_name']);?></option>
                                        <?php
    }
    ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Date of Activity</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1" name="date_id"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" required>Describe your request in
                                        Detail:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        name="request_message" required></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="get_advice_btn"
                                        class="btn btn-success btn-block">Submit</button>
                                </div>
                            </form>

                            <br>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-2"></div>


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