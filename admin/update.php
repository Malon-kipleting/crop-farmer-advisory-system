<?php
include 'connection.php';
$name = $_SESSION['adm_fname']. " ". $_SESSION['adm_lname'];
$officer_id = $_SESSION['officerId'];
$mail = $_SESSION['adm_mail'];
$phone = $_SESSION['adm_tel']; 

if (isset($_POST['update_admin_details_btn'])) {

    //get user data
    $admin_id = $_POST['adm_ID'];
    $admin_email = $_POST['adm_email'];
    $admin_fname = $_POST['adm_fname'];
    $admin_lname = $_POST['adm_lname'];
    $admin_phone = $_POST['adm_phone'];
    
    //validating input
    if (empty($admin_email)) {
    array_push($errors, "admin email is required");
    }

    if (empty($admin_fname)) {
    array_push($errors, "admin fname is required");
    }

    if (empty($admin_lname)) {
    array_push($errors, "admin lname is required");
    }
    if (empty($admin_phone)) {
    array_push($errors, "admin phone is required");
    }

    if (count($errors) == 0) {
        $update_admin_details_query = "UPDATE `extension_officer` SET `first_name`='$admin_fname',`last_name`='$admin_lname',`officer_email`='$admin_email',`officer_phone`='$admin_phone' WHERE `officer_id`='$admin_id'";
        $admin_details_results = mysqli_query($db, $update_admin_details_query);

        $_SESSION['adm_fname']=$admin_fname;
        $_SESSION['adm_lname']=$admin_lname;
        $_SESSION['adm_mail']=$admin_email;
        $_SESSION['adm_tel']=$admin_phone;  
        
        header('location: update.php');
    }else{
        array_push($errors, "unable to update details");
        header('location: update.php');
    }

}
?>


<!DOCTYPE html>
<html>

<head>

    <title>Profile </title>
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
                        <th>Update User Details</th>
                        <th>&nbsp;</th>
                        <td><input type="text" readonly hidden name="adm_ID" value="<?php echo $officer_id;?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="adm_email" value="<?php echo $mail;?>"></td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="adm_fname" value="<?php echo  $_SESSION['adm_fname']; ?>"></td>

                    </tr>
                    <tr>
                        <td>Surname</td>
                        <td><input type="text" name="adm_lname" value="<?php echo $_SESSION['adm_lname']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><input type="text" name="adm_phone" value="<?php echo $phone; ?>"></td>
                    </tr>

                </table>
                <p>
                <div class="w3-btn-group w3-right">
                    <input type="submit" class="btn btn-success btn-block m-2" name="update_admin_details_btn"
                        value="Update Details">
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