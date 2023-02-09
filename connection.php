<?php     
//start session 
ob_start();
session_start();
// connect to the database
try{
    $db = mysqli_connect('localhost', 'malon', 'malon', 'farmer_db');
    //echo 'Database Connected Successfully';
    }
    catch(Exception $e) {
      // echo 'Message: ' .$e->getMessage();
      echo 'Database Connection Failed.';
    }

$errors = array(); 

//login user
if (isset($_POST['login_btn'])) {
  $username = $_POST['user_email'];
  $password = $_POST['user_password'];

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $encrypted_password = md5($password);
    $login_query = "SELECT * FROM farmer_details WHERE `farmer_email`='$username' AND `farmer_password`='$encrypted_password'";
    $results = mysqli_query($db, $login_query);

    if (mysqli_num_rows($results) == 1) {
      
      $row = mysqli_fetch_assoc($results);
    // end generate random alphanumeric character
      //row data
      $farmer_id=$row['farmer_id'];
      $farmer_fname=$row['farmer_fname'];
      $farmer_lname=$row['farmer_lname'];
      $email=$row['farmer_email'];
      $contact=$row['farmer_phone'];   
  
      //sessions
      $_SESSION['farmerId']=$farmer_id;
      $_SESSION['farmerFname']=$farmer_fname;
      $_SESSION['farmerLname']=$farmer_lname;
      $_SESSION['farmer_mail']=$email;
      $_SESSION['farmer_tel']=$contact;  
      $_SESSION['success'] = "You are now logged in";

      header('location: home.php');
    }else{
      array_push($errors, "Incorrect Username or Password");
      header('location: index.php');
    }
  }
}



ob_end_flush();
?>