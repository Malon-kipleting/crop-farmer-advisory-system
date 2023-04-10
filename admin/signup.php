<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <?php
include './components/header.php';
?>
</head>

<body>
    <div id="container">
        <div class="w3-green p-3 mb-3">
            <h2><b>
                    <center>Crop Farmer's Advisory System: A case of Best Practices<center>
                </b></h2>
            <p><b>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form name="myForm" method="POST" onsubmit="validateForm()" action="connection.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Firstname</label>
                        <input type="text" class="form-control" name="fname" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter First Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Lastname</label>
                        <input type="text" class="form-control" name="lname" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Last Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID Number</label>
                        <input type="text" class="form-control" name="id_number" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Last Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="tel" class="form-control" name="contact_no" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter phone" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Gender</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="gender">
                            <option value="" selected>Select gender</option>
                            <option value="male"> Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password_1" id="exampleInputPassword1"
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" name="password_2" id="exampleInputPassword1"
                            placeholder="Password">
                    </div>

                    <input type="submit" class="btn btn-success btn-block" name="register_farmer_btn" value="Register">
                    <hr>
                    <p class="text-center">Already a member? <a href="index.php">Log In Here</a></p>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div id="main" style="text-align:center;">

            <div id="footer" class=" w3-center w3-bottom w3-green" style="padding:10px">
                Crop Farmer's Advisory System: Copyright &copy; 2023
            </div>
</body>

</html>
<script type="text/javascript">
function validateForm() {
    var x = document.forms["myForm"]["password_1"].value;
    var y = document.forms["myForm"]["password_2"].value;
    if (x !== y) {
        alert("password must be the same");
        return true;
    }
}
</script>