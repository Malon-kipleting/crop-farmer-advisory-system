<?php
include 'connection.php';
$name = $_SESSION['adm_fname']. " ". $_SESSION['adm_lname'];
$officer_id = $_SESSION['officerId'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Users | Admin</title>
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

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h5 class="card-title">List of Users</h5>
                                <input type='button' value='Add a User' name='open-user-btn'
                                    class='btn btn-primary float-end open-user-modal-btn m-2' />
                                <div class="table-responsive">
                                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Gender</th>
                                                <th>Date Added</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
   if($officer_id ){
      $data_fetch_query = "SELECT * FROM `extension_officer` ";
      $data_result = mysqli_query($db, $data_fetch_query);
      if ($data_result->num_rows > 0){
          while($row = $data_result->fetch_assoc()) {
              $user_id = $row['officer_id'];
              $fname = $row['first_name'];
              $lname = $row['last_name'];
              $email = $row['officer_email'];
              $phone = $row['officer_phone'];
              $gender = $row['Gender'];
              $date_created = $row['date_created'];
      

      echo "<tr> <td>" .$user_id.  "</td>";
      echo "<td>" .$fname." ".$lname."</td>";
      echo "<td>" .$email."</td>";
      echo "<td>" .$phone."</td>";
      echo "<td>" .$gender."</td>";
      echo "<td>" .$date_created."</td>";
      echo "<td>
        
      <form method ='POST' action=''>
      <input  type='text' hidden name='lecturer_id' value='$user_id'>
      <input type='submit' data-id='$user_id' data-fname='$fname' data-lname='$lname' data-mail='$email' data-phone='$phone'  value='Edit Details' name='edit-lecturer-btn' class='btn btn-success edit-lecturer-modal-btn m-2'>
      <input type='submit' data-id= '$user_id' value='Delete Lecturer'  class='btn btn-danger deleteLecturerBtn'>
      </form>
      </td> </tr>";
      }
      
      }else{
      echo "<td>"."No Requests Found"."</td>";
      }
      
      } else{
          echo "<td>"."No Data Found"."</td>";
      }

      ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Gender</th>
                                                <th>Date Added</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->

    <script>
    $(document).ready(function() {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });


    //Toggle Show/Hide Password
    const togglePassword = document.querySelector("#togglePasswordCheckBox");

    const password = document.querySelector("#user_password");
    const passwordConfirm = document.querySelector("#user_confirm_password");

    togglePassword.addEventListener("click", () => {
        // Toggle the type attribute using
        const type =
            password.getAttribute("type") === "password" ? "text" : "password";

        const confirm_type =
            passwordConfirm.getAttribute("type") === "password" ? "text" : "password";

        password.setAttribute("type", type);
        passwordConfirm.setAttribute("type", type);
    });

    //VALIDATE PASSWORD
    // Get the password input elements and the messages elements
    let passwordInput = document.getElementById("user_password");
    let passwordConfirmInput = document.getElementById("user_confirm_password");
    let submitBtn = document.getElementById("addLecBtnId")

    //pass divs
    var messageLength = document.getElementById("message-length");
    var messageUppercase = document.getElementById("message-uppercase");
    var messageLowercase = document.getElementById("message-lowercase");
    var messageNumber = document.getElementById("message-number");
    var messageSpecialChar = document.getElementById("message-special-char");

    //confirm pass divs
    var msgLength = document.getElementById("msg-length");
    var msgUppercase = document.getElementById("msg-uppercase");
    var msgLowercase = document.getElementById("msg-lowercase");
    var msgNumber = document.getElementById("msg-number");
    var msgSpecialChar = document.getElementById("msg-special-char");

    var checkEqual = document.getElementById("check-equal");

    // Add an input event listener to the password input element
    passwordInput.addEventListener("input", function() {
        // Get the current password value from the input field
        let password = passwordInput.value;

        // Validate the password and show validation messages for each requirement
        if (password.length < 8) {
            messageLength.textContent = "Password must be at least 8 characters long.";
            messageLength.style.color = "red";
        } else {
            messageLength.textContent = "";
        }

        if (!/[A-Z]/.test(password)) {
            messageUppercase.textContent = "Password must include an uppercase letter.";
            messageUppercase.style.color = "red";
        } else {
            messageUppercase.textContent = "";
        }

        if (!/[a-z]/.test(password)) {
            messageLowercase.textContent = "Password must include a lowercase letter.";
            messageLowercase.style.color = "red";
        } else {
            messageLowercase.textContent = "";
        }

        if (!/\d/.test(password)) {
            messageNumber.textContent = "Password must include a number.";
            messageNumber.style.color = "red";
        } else {
            messageNumber.textContent = "";
        }

        if (!/[\W_]/.test(password)) {
            messageSpecialChar.textContent =
                "Password must include a special character.";
            messageSpecialChar.style.color = "red";
        } else {
            messageSpecialChar.textContent = "";
        }

        //disable submit button untill confirm password field is filled with a value
        submitBtn.classList.add('disabled');
    });

    // Add an input event listener to the confirm password input element
    passwordConfirmInput.addEventListener("input", function() {
        // Get the current password value from the input field
        let confirmPassword = passwordConfirmInput.value;

        // Validate the password and show validation messages for each requirement
        if (confirmPassword.length < 8) {
            msgLength.textContent = "Password must be at least 8 characters long.";
            msgLength.style.color = "red";
        } else {
            msgLength.textContent = "";
        }

        if (!/[A-Z]/.test(confirmPassword)) {
            msgUppercase.textContent = "Password must include an uppercase letter.";
            msgUppercase.style.color = "red";
        } else {
            msgUppercase.textContent = "";
        }

        if (!/[a-z]/.test(confirmPassword)) {
            msgLowercase.textContent = "Password must include a lowercase letter.";
            msgLowercase.style.color = "red";
        } else {
            msgLowercase.textContent = "";
        }

        if (!/\d/.test(confirmPassword)) {
            msgNumber.textContent = "Password must include a number.";
            msgNumber.style.color = "red";
        } else {
            msgNumber.textContent = "";
        }

        if (!/[\W_]/.test(confirmPassword)) {
            msgSpecialChar.textContent =
                "Password must include a special character.";
            msgSpecialChar.style.color = "red";
        } else {
            msgSpecialChar.textContent = "";
        }

        //function to compare passwords
        comparePasswords();
    });


    //Function to Campare Passwords
    function comparePasswords() {
        const password = document.getElementById("user_password").value;
        const confirmPassword = document.getElementById("user_confirm_password").value;
        if (password !== confirmPassword) {
            checkEqual.textContent = "Passwords do not match!!";
            checkEqual.style.color = "red";
            submitBtn.classList.add('disabled');
        } else {
            checkEqual.textContent = "";
            submitBtn.classList.remove('disabled');
        }
        return true;
    }
    </script>


    <?php
include './components/footer.php';
  ?>
    <?php
include './components/scripts.php';
  ?>
    </div>
</body>

</html>