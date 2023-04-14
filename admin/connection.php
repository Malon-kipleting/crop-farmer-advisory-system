<?php     
//start session 
ob_start();
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

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
if (isset($_POST['admin_login_btn'])) {
  $username = $_POST['admin_email'];
  $password = $_POST['admin_password'];

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $encrypted_password = md5($password);
    $login_query = "SELECT * FROM extension_officer WHERE `officer_email`='$username' AND `officer_password`='$encrypted_password'";
    $results = mysqli_query($db, $login_query);

    if (mysqli_num_rows($results) == 1) {
      
      $row = mysqli_fetch_assoc($results);
    // end generate random alphanumeric character
      //row data
      $officer_id=$row['officer_id'];
      $firstname=$row['first_name'];
      $lastname=$row['last_name'];
      $email=$row['officer_email'];
      $contact=$row['officer_phone'];   
      $gender=$row['Gender'];   
  
      //sessions
      $_SESSION['officerId']=$officer_id;
      $_SESSION['adm_fname']=$firstname;
      $_SESSION['adm_lname']= $lastname;
      $_SESSION['adm_mail']=$email;
      $_SESSION['adm_tel']=$contact;  
      $_SESSION['success'] = "You are now logged in";

      header('location: home.php');
    }else{
      array_push($errors, "Incorrect Username or Password");
      header('location: index.php');
    }
  }
}

//view request
if (isset($_POST['view-request-btn'])) {
  $req_id = $_POST['request_id'];
  $fname= $_POST['fname'];
  $lname= $_POST['lname'];
  $email= $_POST['farmer_mail'];
  $phone= $_POST['farmer_phone'];
  $description = $_POST['shrt_desc'];
  $status = $_POST['req_status'];
  $farm_id = $_POST['farm_id'];
  $farm_name = $_POST['farm_name'];
  $farm_size = $_POST['farm_size'];
  $crop_id = $_POST['crop_id'];
  $crop_name = $_POST['crop_name'];
  $activity_id = $_POST['activity_id'];
  $activity_name = $_POST['activity_name'];
  $county_id = $_POST['county_id'];
  $county_name = $_POST['county_name'];

  if (empty($req_id)) {
    array_push($errors, "request id is required");
  }
  if (empty($fname)) {
    array_push($errors, "firstname is required");
  }
  if (empty($lname)) {
    array_push($errors, "lastname is required");
  }
  if (empty($email)) {
    array_push($errors, "email is required");
  }
  if (empty($phone)) {
    array_push($errors, "phone number is required");
  }
  if (empty($description)) {
    array_push($errors, "Description is required");
  }
  if (empty($status)) {
    array_push($errors, "status is required");
  }
  if (empty($farm_id)) {
    array_push($errors, "farm id is required");
  }
  if (empty($farm_name)) {
    array_push($errors, "farm name is required");
  }
  if (empty($farm_size)) {
    array_push($errors, "farm name is required");
  }
  if (empty($crop_id)) {
    array_push($errors, "crop id is required");
  }
  if (empty($crop_name)) {
    array_push($errors, "crop name is required");
  }
  if (empty($activity_id)) {
    array_push($errors, "activity id is required");
  }
  if (empty($activity_name)) {
    array_push($errors, "activity name is required");
  }
  if (empty($county_id)) {
    array_push($errors, "county id is required");
  }
  if (empty($county_name)) {
    array_push($errors, "county name is required");
  }

  if (count($errors) == 0) {
    $_SESSION['requestID'] = $req_id;
    $_SESSION['firstName'] = $fname;
    $_SESSION['lastName'] = $lname;
    $_SESSION['farmer_mail'] = $email;
    $_SESSION['farmer_phone'] = $phone;
    $_SESSION['request_description'] = $description;
    $_SESSION['request_status'] = $status;
    $_SESSION['farm_ID'] = $farm_id;
    $_SESSION['farm_Name'] = $farm_name;
    $_SESSION['farm_size'] = $farm_size;
    $_SESSION['crop_ID'] = $crop_id;
    $_SESSION['crop_Name'] =$crop_name;
    $_SESSION['activity_ID'] = $activity_id;
    $_SESSION['activity_Name'] = $activity_name;
    $_SESSION['county_ID'] = $county_id;
    $_SESSION['county_Name'] = $county_name;
    
    header('location: view-request.php');
  }else{
    array_push($errors, "unable to process your request");
    header('location: requests.php');
  }
}


ob_end_flush();
?>