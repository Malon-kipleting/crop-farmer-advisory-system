<?php
include 'connection.php';
$name = $_SESSION['adm_fname']. " ". $_SESSION['adm_lname'];
$officer_id = $_SESSION['officerId'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Requests | Admin</title>
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
            <div class="col-md-8 border border-info rounded p-3">
                <form method="POST" action="" class="p-4">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Request ID</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" readonly
                                value="<?php echo $_SESSION['requestID']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4"><strong>Farmer Name</strong></label>
                            <input type="text" readonly class="form-control" id="inputPassword4"
                                value="<?php echo $_SESSION['firstName']. " ".$_SESSION['lastName']?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Activity</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" readonly
                                value="<?php echo $_SESSION['activity_Name']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4"><strong>Crop</strong></label>
                            <input type="text" readonly class="form-control" id="inputPassword4"
                                value="<?php echo $_SESSION['crop_Name']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Farm Location</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" readonly
                                value="<?php echo $_SESSION['county_Name']." "."County"; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4"><strong>Crop</strong></label>
                            <input type="text" readonly class="form-control" id="inputPassword4"
                                value="<?php echo $_SESSION['crop_Name']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><strong>Request Description:</strong></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"
                            readonly><?php echo $_SESSION['request_description']; ?></textarea>
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