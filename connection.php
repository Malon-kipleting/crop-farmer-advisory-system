<?php     
//start session 
ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// connect to the database
try{
    $db = mysqli_connect('localhost', 'malon', 'malon', 'farmer_db');
    //echo 'Database Connected Successfully';
    }
    catch(Exception $e) {
      echo 'Message: ' .$e->getMessage();
      // echo 'Database Connection Failed.';
    }

    $firstname = '';
    $lastname =  '';
    $idnumber =  '';
    $email =  '';
    $phone =  '';
    $gender =  '';
$errors = array(); 


// REGISTER USER
if (isset($_POST['register_farmer_btn'])) {
  // receive all input values from the form
  $firstname =  $_POST['fname'];
  $lastname =  $_POST['lname'];
  $idnumber =  $_POST['id_number'];
  $email =  $_POST['email'];
  $phone =  $_POST['contact_no'];
  $gender =  $_POST['gender'];
  $password =  $_POST['password_1'];
  $Confirm_password =  $_POST['password_2'];
  // form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($firstname)) { array_push($errors, "Firstname is required"); }
if (empty($lastname)) { array_push($errors, "LastName is required"); }
if (empty($idnumber)) { array_push($errors, "Registration Number is required"); }
if (empty($email)) { array_push($errors, "Email Address is required"); }
if (empty($phone)) { array_push($errors, "Phone Number is required"); }
if (empty($gender)) { array_push($errors, "Input your gender"); }
if (empty($password)) { array_push($errors, "Password is required"); }
if (empty($Confirm_password)) { array_push($errors, "Please Confirm Password"); }
if ($password != $Confirm_password) {
array_push($errors, "The two passwords do not match");
}
// first check the database to make sure
// a user does not already exist with the same username and/or email
$user_check_query = "SELECT * FROM farmer_details WHERE farmer_email='$email' OR farmer_id='$idnumber' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists
  if ($user['farmer_id'] === $idnumber) {
    array_push($errors, "ID number already exists");
  }
  if ($user['farmer_email'] === $email) {
    array_push($errors, "Email already exists");
  }
}

// Finally, register user if there are no errors in the form
if (count($errors) == 0) {
  $encrypted_password = md5($Confirm_password);//encrypt the password before saving in the database

  $user_insert_query = "INSERT INTO `farmer_details`(`farmer_id`, `farmer_fname`, `farmer_lname`, `farmer_email`, `farmer_phone`, `Gender`, `farmer_password`)VALUES ('$idnumber','$firstname','$lastname','$email','$phone','$gender','$encrypted_password')";
  mysqli_query($db, $user_insert_query);

  header('location: index.php');
  }else{
    header('location: signup.php');
  }

}

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