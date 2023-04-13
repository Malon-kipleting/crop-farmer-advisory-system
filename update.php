<?php
include 'connection.php';
$name =  $_SESSION['farmerFname'] . " ". $_SESSION['farmerLname'];

if (isset($_POST['update_farmer_details_btn'])) {

    //get user data
    $farmer_id = $_POST['user_ID'];
    $farmer_email = $_POST['user_email'];
    $farmer_fname = $_POST['farmer_fname'];
    $farmer_lname = $_POST['farmer_lname'];
    $farmer_phone = $_POST['farmer_phone'];
    
    //validating input
    if (empty($farmer_email)) {
    array_push($errors, "Farmer email is required");
    }

    if (empty($farmer_fname)) {
    array_push($errors, "Farmer fname is required");
    }

    if (empty($farmer_lname)) {
    array_push($errors, "Farmer lname is required");
    }
    if (empty($farmer_phone)) {
    array_push($errors, "Farmer phone is required");
    }

    if (count($errors) == 0) {
        $update_farmer_details_query = "UPDATE `farmer_details` SET `farmer_fname`='$farmer_fname',`farmer_lname`='$farmer_lname',`farmer_email`='$farmer_email',`farmer_phone`='$farmer_phone' WHERE `farmer_id`='$farmer_id'";
        $farmer_details_results = mysqli_query($db, $update_farmer_details_query);

        $_SESSION['farmerFname']=$farmer_fname;
        $_SESSION['farmerLname']=$farmer_lname;
        $_SESSION['farmer_mail']=$farmer_email;
        $_SESSION['farmer_tel']=$farmer_phone;  
        
        header('location: update.php');
    }else{
        array_push($errors, "unable to update farmer details");
        header('location: update.php');
    }

}
?>


<!DOCTYPE html>
<html>

<head>

    <title>Profile | Farmer</title>
    <?php
include './components/header.php';
?>
    <style>
    #more {
        display: none;
    }
    </style>

<body class="w3-mobile">
    <div id="container">
        <?php
include './components/navbar.php';
?>
        <div class="w3-content">
            <form method="POST" action="">
                <table class="w3-table w3-striped w3-bordered w3-card-4">
                    <tr class="w3-blue">
                        <th>Change farmer Details</th>
                        <th>&nbsp;</th>
                        <td><input type="text" readonly name="user_ID" hidden
                                value="<?php echo $_SESSION['farmerId'];?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="user_email" value="<?php echo $_SESSION['farmer_mail'];?>"></td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="farmer_fname" value="<?php echo $_SESSION['farmerFname']; ?>"></td>

                    </tr>
                    <tr>
                        <td>Surname</td>
                        <td><input type="text" name="farmer_lname" value="<?php echo $_SESSION['farmerLname']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><input type="text" name="farmer_phone" value="<?php echo $_SESSION['farmer_tel']; ?>"></td>
                    </tr>

                </table>
                <p>
                <div class="w3-btn-group w3-right">
                    <input type="submit" class="btn btn-primary btn-block m-2" name="update_farmer_details_btn"
                        value="Update Farmer Details">
                </div>
                </p>
            </form>

        </div>

    </div>



    </div>

    <?php
include './components/footer.php';
            ?>
    </div>


</body>

</html>