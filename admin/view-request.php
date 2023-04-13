<?php
include 'connection.php';
$name = $_SESSION['adm_fname']. " ". $_SESSION['adm_lname'];
$officer_id = $_SESSION['officerId'];

//updated request data
if (isset($_POST['submit-advice-btn'])) {
    //get data
    $officer_id = $_POST['admin_id'];
    $request_id = $_POST['req_id'];
    $request_response = $_POST['req_response'];

    //validation  
    if (empty($officer_id)) {
    array_push($errors, "Officer ID required");
    }
    if (empty($request_response)) {
    array_push($errors, "Response is required");
    }

    if (count($errors) == 0) {

        $insert_query = "UPDATE `request_response_details` SET `officer_id`='$officer_id',`response`='$request_response',`request_status`='Responded' WHERE `request_id`='$request_id'";
        $result = mysqli_query($db, $insert_query);

        if ($result) {
            header('location: requests.php');
            exit();
        } else {
            $errors[] = "Unable to update details";
            header('location: view-request.php');
        }

    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Request | Admin</title>
    <?php
  include './components/header.php';
  ?>
</head>

<body>
    <div class="container-fluid">
        <!--navbar-->
        <?php
include './components/navbar.php';
?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 border border-info rounded p-3  mb-3">
                <form method="POST" action="" class="p-4">
                    <div class="form-group">
                        <input type="text" class="form-control" name="admin_id" required id="inputEmail4" readonly
                            value="<?php echo $officer_id; ?>">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Request ID</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" required name="req_id" readonly
                                value="<?php echo $_SESSION['requestID']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4"><strong>Farmer Name</strong></label>
                            <input type="text" readonly class="form-control" required id="inputPassword4"
                                value="<?php echo $_SESSION['firstName']. " ".$_SESSION['lastName']?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Activity</strong></label>
                            <input type="text" class="form-control" required id="inputEmail4" readonly
                                value="<?php echo $_SESSION['activity_Name']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4"><strong>Crop</strong></label>
                            <input type="text" readonly required class="form-control" id="inputPassword4"
                                value="<?php echo $_SESSION['crop_Name']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Farm Location</strong></label>
                            <input type="text" class="form-control" required id="inputEmail4" readonly
                                value="<?php echo $_SESSION['county_Name']." "."County"; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4"><strong>Farm Size (Acres)</strong></label>
                            <input type="text" readonly required class="form-control" id="inputPassword4"
                                value="<?php echo $_SESSION['farm_size']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><strong>Request Description:</strong></label>
                        <textarea class="form-control" required id="exampleFormControlTextarea1" rows="2"
                            readonly><?php echo $_SESSION['request_description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><strong>Response:</strong></label>
                        <textarea class="form-control" name="req_response" id="exampleFormControlTextarea1" rows="3"
                            required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="submit-advice-btn" value="Submit">
                    </div>

                </form>
            </div>
            <div class="col-md-2"></div>
        </div>

        <?php
    include './components/footer.php';
    ?>
        <?php
    include './components/scripts.php';
    ?>
    </div>
</body>

</html>