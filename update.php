
<?php
include 'connection.php';
$name =  $_SESSION['farmerFname'] . " ". $_SESSION['farmerLname'];
?>


<!DOCTYPE html>
<html>
<head>
     
     <title>Update farmer details</title>
     <?php
include './components/header.php';
?>
    <style>
#more {display: none;}
</style>
    <body class="w3-mobile">
        <div id="container"> 
        <?php
include './components/navbar.php';
?>
            <div class="w3-content">
              <form>
 <table class="w3-table w3-striped w3-bordered w3-card-4">
 <tr class="w3-blue">
  <th>Change farmer Details</th>
  <th>&nbsp;</th>
  
</tr>
<tr>
  <td>Email</td>
  <td><input type="email" name="email" value="<?php echo $_SESSION['farmer_mail'];?>"></td>
  
</tr>
<tr>
  <td>First Name</td>
  <td><input type="text" name="farmer_name" value="<?php echo $_SESSION['farmerFname']; ?>"></td>
  
</tr>
<tr>
  <td>Surname</td>
  <td><input type="text" name="sname" value="<?php echo $_SESSION['farmerLname']; ?>"></td>
  
</tr>
<tr>
  <td> Enter Current Password</td>
  <td><input type="password" name="password" value=""></td>
  
</tr>
<tr>
  <td> New Password</td>
  <td><input type="password" name="password" value=""></td>
  
</tr>
<tr>
  <td>Confirm new Password</td>
  <td><input type="password" name="email" value=""></td>
  
</tr>
</table>
<p>
<div class="w3-btn-group w3-right">
<input type="submit" class="w3-btn  w3-green" name="submit" value="update">

<input type="reset" class="w3-btn w3-blue-green" name="submit" value="clear">
</div>
</p>
              </form>

            </div>

        </div>
       
        <div id="footer" class="w3-footer w3-center w3-bottom w3-green">
          Crop Farmer's Advisory System: A case of Best Practices &copy; 2023
        </div>

        </div>
       
        <div id="footer" class="w3-footer w3-center w3-bottom w3-green">
          Crop Farmer's Advisory System: A case of Best Practices &copy; 2023
        </div>
    </div>


</body>
</html>
