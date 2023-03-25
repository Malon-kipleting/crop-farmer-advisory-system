
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/w3css.css">
        <link rel="stylesheet" href="css/home.css">
       
    </head>
     <body class="w3-mobile  w3-responsive" style="">
         
        <div id="container">
            <div class="w3-green">
                <h2><b><center>Crop Farmer's Advisory System: A case of Best Practices<center></b></h2>
                <p><b><center>Login here</center><b></p>
            </div>
           

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
 
            <div id="main" class="w3-center w3-card-2 w3-responsive w3-mobile" style="width: 50%; margin:0 auto;"> 
                <form class="w3-formfield" action="connection.php" method="POST">
                <fieldset>
                    <h4><b>Log in</b></h4>
                    <input class="w3-input" name="user_email"  style="width: 100%;" type="email" placeholder="Email" id="email" required ><br>
                    <input class="w3-input" name="user_password" required style="width: 95%;"  type="password" placeholder="Password" id="password"  ><br>
                   <input class="w3-btn w3-green" style="width: 80%"  type="submit" value="Log In" name="login_btn"><br>
                   <p>Not a member? <b><a href="signup.php">Sign up</a></b></p>
                   <p>Did you <b><a href="forgotpass.php">forgot password?</a></b></p>
                </fieldset>
                </form>
            </div>
        </div>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div id="footer" class=" w3-center w3-bottom w3-green">
            Crop Farmer's Advisory System: A case of Best Practices &copy; 2023
            </div>
        
    </body>
</html>