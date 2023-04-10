
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sign up</title>
        <link rel="stylesheet" href="css/w3css.css">
        <link rel="stylesheet" href="css/home.css">
    </head>
    <body class="w3-mobile">
        <div id="container">
            <div class="w3-green">
                <h2><center><b>Sign Up</b><center></h2>
            </div >
            <div id="main" class="w3-center w3-card-2 w3-responsive w3-mobile" style="width: 50%; margin:0 auto;">
            <div id="main" class="w3-center w3-card-2 w3-responsive w3-content"> 
                <form name="myForm" class="w3-formfield" method="POST" onsubmit="validateForm()" action="connection.php" style="width: 80%;">
                <fieldset>
                    <input class="w3-input" style="width: 95%;" type="text" placeholder="First Name" name="fname"  required><br>
                    <input class="w3-input" style="width: 95%;" type="text" placeholder="Last Name" name="lname"  required><br>
                    <input class="w3-input" style="width: 95%;" type="number" placeholder="ID Number" name="id_number" ><br>
                    <input class="w3-input" style="width: 95%;" type="email" placeholder="Email" name="email"  required><br>
                    <input class="w3-input" style="width: 95%;" type="tel" placeholder="Phone number" name="contact_no"  required><br>
                   
                    <select class="w3-input" style="width: 95%;" name="gender" placeholder="gender" required>
                        <option value="">Select gender</option>
                        <option value="male"> Male</option>
                        <option value="female">Female</option>
                    </select><br>
                    <input class="w3-input" style="width: 95%;" type="password" placeholder="Password" name="password_1"  required><br>
                    <input class="w3-input" style="width: 95%;" type="password" placeholder="Confirm Password" name="password_2" required><br>
                    <input class="w3-btn w3-green" style="width: 80%" name="register_farmer_btn"  type="submit" value="Submit"><br>
                    <p>already have an account? <b><a href="index.php">Login</a></b></p>
                </fieldset>
                </form>
            </div>
        </div>
        
        <div id="main" style="text-align:center;">
              
              <?php
  include './components/footer.php';
  ?>
    </body>
</html>
<script type="text/javascript">
function validateForm() {
    var x = document.forms["myForm"]["password_1"].value;
    var y = document.forms["myForm"]["password_2"].value;
    if (x !== y ) {
        alert("password must be the same");
        return true;
    }
}
</script>