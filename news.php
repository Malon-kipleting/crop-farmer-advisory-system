<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>News</title>
        <link rel="stylesheet" href="css/w3css.css">
        <link rel="stylesheet" href="css/styleit.css">
    </head>
    <style>
#more {display: none;}
</style>
    <body class="w3-mobile">
        <div id="container"> 
            <fieldset class="w3-green">
                <div id="" >
            <h1>Smart potato farmer advisory system</h1>
            <div class="w3-bar w3-black">
                <a href="home.php" class="w3-bar-item w3-button">Home</a>
                <a href="manage.php" class="w3-bar-item w3-button">Manage farm</a>
                <a href="news.php" class="w3-bar-item w3-button w3-gray">News</a>
                <a href="forum.php" class="w3-bar-item w3-button">Forum</a>
                <a href="profile.php" class="w3-bar-item w3-button">Profile</a>
                <div class="w3-bar-item w3-right">
<a  href='logout.php'>Log out</a>
                </div>
                <!--<a href="#">welcome <br> Farmer</a>-->
                
            </div>
        </div>
            </fieldset>
            <div id="main">
            </div>

        </div>
        <div id="content">
            <div id="main">
                <fieldset>
                    <h1>News Page</h1>
                    <h2>For all news on agriculture</h2>
                    <p>This is where we give you news affecting you as a farmer. It's a place where you get all the necessary information as a farmer</p>
                </fieldset>
            </div>
            <br>
            <div id="leftcolumn">
<fieldset style="width: 95%">
                    <div class="w3-container">
                        <p>Farming Techniques</p>
                        <hr>
                        <img src="images/page3_img4.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                        <p>This project is relevant to Sustainable Development Goal (SDG) 2, By 2030, ensuring sustainable food production systems and implement resilient agricultural practices that increase productivity and production, help maintain ecosystems, that strengthen capacity for adaptation to climate change, extreme weather, drought, flooding, and other disasters and that progressively improve land and soil quality. This project will go a long way in giving farmers the necessary advice on crop farming. Agriculture is the leading export in Kenya, earning the country foreign exchange alongside ensuring food security.                        <button onclick="myFunction()" id="myBtn" class="w3-btn-block w3-dark-grey "> Read more </button>
                        </span></p>
                        <button onclick="myFunction()" id="myBtn" class="w3-btn-block w3-dark-grey "> Read more </button>
                    </div>
                </fieldset><br>
                <fieldset style="width: 95%">
                    <div class="w3-container">
                        <p>Farming Techniques</p>
                        <hr>
                        <img src="images/page3_img4.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                        <p>learn how farmers in Bomet are planting there seedling in a way that will save you a lot of time.</p><br>

                        <button class="w3-btn-block w3-dark-grey ">+ Read </button>
                    </div>
                </fieldset><br>
                <fieldset style="width: 95%">
                    <div class="w3-container">
                        <p>Farming Techniques</p>
                        <hr>
                        <img src="images/page3_img4.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                        <p>learn how farmers in Bomet are planting there seedling in a way that will save you a lot of time.</p><br>

                        <button class="w3-btn-block w3-dark-grey ">+ Read </button>
                    </div>
                </fieldset><br>
            </div>
            <div id="rightcolumn">
                <fieldset style="width: 95%">
                    <div class="w3-container">
                        <p>Other Posts</p>
                        <hr>
                        
                        <p>learn how farmers in Bomet are planting there seedling in a way that will save you a lot of time.</p><br>

                        <button class="w3-btn-block w3-dark-grey ">+ Read </button>
                    </div>
                </fieldset><br>
            </div>
        </div>
        <div id="footer" class="w3-footer w3-center w3-bottom w3-green">
            Crop Farmer's Advisory System: A case of Best Practices &copy; 2023
        </div>
    </div>
    <script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>

</body>
</html>
