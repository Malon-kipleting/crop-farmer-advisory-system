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
                <p><b><center>Sign up here<center><b></p>
            </div >
            <div id="main" class="w3-center w3-card-2 w3-responsive w3-mobile" style="width: 50%; margin:0 auto;">
            <div id="main" class="w3-center w3-card-2 w3-responsive w3-content"> 
                <form name="myForm" class="w3-formfield" action="signup" method="post" onsubmit="return validateForm()" style="width: 60%;">
                <fieldset>
                    <input class="w3-input" style="width: 95%;" type="text" placeholder="First Name" name="fname" autocomplete="false"><br>
                    <input class="w3-input" style="width: 95%;" type="text" placeholder="Surname Name" name="sname" autocomplete="false"><br>
                    <input class="w3-input" style="width: 95%;" type="text" placeholder="Other Names" name="oname" autocomplete="false"><br>
                    <input class="w3-input" style="width: 95%;" type="email" placeholder="Email" name="email" autocomplete="false"><br>
                    <input class="w3-input" style="width: 95%;" type="tel" placeholder="Phone number" name="contact_no" autocomplete="false"><br>
                   
                    <select class="w3-input" style="width: 95%;" name="county" placeholder="County">
                        <option value=""> Select County
                        <option value="Baringo">Baringo
                        <option value="Bomet">Bomet
                        <option value="Bungoma">Bungoma
                        <option value="Busia">Busia 
                        <option value="Elgeyo Marakwet County">Elgeyo Marakwet County 
                         <option value="Embu County">Embu County
                        <option value="Garissa County">Garissa County
                        <option value="Homa Bay County">Homa Bay County
                        <option value="Isiolo County">Isiolo County
                        <option value="Kajiado County">Kajiado County
                        <option value="Kakamega County">Kakamega County
                        <option value="Kericho County">Kericho County   
                        <option value="Kiambu County">Kiambu County
                        <option value="Kilifi County">Kilifi County
                        <option value="Kirinyaga County">Kirinyaga County
                        <option value="Kisii County">Kisii County
                        <option value="Kisumu County">Kisumu County
                        <option value="Kitui County">Kitui County
                        <option value="Kwale County">Kwale County
                        <option value="Laikipia County">Laikipia County
                        <option value="Lamu County">Lamu County
                        <option value="Machakos County">Machakos County
                        <option value="Makueni County">Makueni County
                        <option value="Mandera County">Mandera County
                        <option value="Meru County">Meru County
                        <option value="Migori County">Migori County
                        <option value="Marsabit County">Marsabit County
                        <option value="Mombasa County">Mombasa County
                        <option value="Muranga County">Muranga County
                        <option value="Nairobi County">Nairobi County
                        <option value="Nakuru County">Nakuru County
                        <option value="Nandi County">Nandi County
                        <option value="Narok County">Narok County
                        <option value="Nyamira County">Nyamira County
                        <option value="Nyandarua County">Nyandarua County
                        <option value="Nyeri County">Nyeri County
                        <option value="Samburu County">Samburu County
                        <option value="Siaya County">Siaya County
                        <option value="Taita Taveta County">Taita Taveta County
                        <option value="Tana River County">Tana River County
                        <option value="Tharaka Nithi County">Tharaka Nithi County
                        <option value="Trans Nzoia County">Trans Nzoia County
                        <option value="Turkana County">Turkana County
                        <option value="Uasin Gishu County">Uasin Gishu County
                        <option value="Vihiga County">Vihiga County
                        <option value="Wajir County">Wajir County
                        <option value="West Pokot County">West Pokot County
                    </select><br>
                    <select class="w3-input" style="width: 95%;" name="gender" placeholder="gender">
                        <option value="">Gender</option>
                        <option value="male"> Male
                        <option value="female">Female    
                    </select><br>
                    <input class="w3-input" style="width: 95%;" type="password" placeholder="Password" name="password1" autocomplete="false"><br>
                    <input class="w3-input" style="width: 95%;" type="password" placeholder="Confirm Password" name="password" autocomplete="false"><br>
                    <input class="w3-btn w3-green" style="width: 80%"  type="submit" value="Submit" name="submit"><br>
                    <p>already have an account? <b><a href="index.html">Login</a></b></p>
                </fieldset>
                </form>
            </div>
        </div>
        
        <div id="footer" class="w3-footer w3-center w3-green">
            Crop Farmer's Advisory System: A case of Best Practices &copy; 2023
            </div>
    </body>
</html>
<script type="text/javascript">
function validateForm() {
    var x = document.forms["myForm"]["password1"].value;
    var y = document.forms["myForm"]["password"].value;
    if (x !== y ) {
        alert("password must be the same");
        return true;
    }
}
</script>