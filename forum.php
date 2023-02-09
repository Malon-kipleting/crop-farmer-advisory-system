
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Forum</title>
        <link rel="stylesheet" href="css/w3css.css">
    </head>
    <body class="w3-responsive w3-mobile">
        <div id="container"> 
                        <fieldset class="w3-green">
                <div id="" >
            <h1>Crop Farmer's Advisory System: A Case of Best Practices.</h1>
            <div class="w3-bar w3-black">
                <a href="home.php" class="w3-bar-item w3-button">Home</a>
                <a href="manage.php" class="w3-bar-item w3-button">Manage farm</a>
                <a href="news.php" class="w3-bar-item w3-button">News</a>
                <a href="forum.php" class="w3-bar-item w3-button w3-gray">Forum</a>
                <a href="profile.php" class="w3-bar-item w3-button">Profile</a>
                <div class="w3-bar-item w3-right">
                    
<a  href='logout.php'>Log out</a>

                </div>
                <!--<a href="#">welcome <br> Farmer</a>-->
                
            </div>
        </div>
            </fieldset>
            <div class="w3-content">
    <div>
    <fieldset class="w3-responsive">
        <fieldset>
        <form method="post" action="FileUpload" enctype="multipart/form-data">
            <input type="text" name="farmer_name" value="${farmer_name}" style="display: none;">
            <input type="text" name="sname" value="${sname}" style="display: none;">
            <input style="width:500px; height: 180px" name="post" placeholder="write whats on your mind" required="">
            <input class="w3-btn w3-green " type="submit" value="Post">
            
            <br>
            <p>
                <button class="w3-btn w3-grey "><input type="file" name="photo"> Upload photo or video </button>
            </p>
            
        </form>
        </fieldset>
        <br>
        <table>
         <fieldset>
                    <div>
           
        </div>
        </fieldset>
        </table>
    </fieldset>
</div>
          
            </div>

            <div id="footer" class="w3-footer w3-center w3-green">
                Crop Farmer's Advisory System: A Case of Best Practices Copyrsight &copy; 2023
            </div>
        </div>
          
    </body>
</html>
