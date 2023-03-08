<?php
include 'connection.php';
$name =  $_SESSION['farmerFname'] . " ". $_SESSION['farmerLname'];
?>

<!DOCTYPE html>
<html>
    <head>
  <title>Home</title>
  <?php
  include './components/header.php';
  ?>
    </head>
<body class="w3-mobile w3-responsive">

<!--navbar--> 
<?php
include './components/navbar.php';
?>

    <div class="headert_text_resize"> <img src="Images/images (2).jpg" alt="" width="970" height="338" /> </div>
    
  </div>
  <div class="w3-content " >
    <div class="w3-container" >
      <div class="left">
        <h2>Crop farming adapting technology<br />
          <span> Jan, 2023 </span> </h2>
        <img src="Images/images (1).jpg" alt="" width="585" height="236" />
        <div class="clr"></div>
        
        <p>Smart potato farming advisory system is simple a system that makes use of available information
to give the farmer what he should do when faced with different situations during his farming </p>
        <!--<p> <a href="#">Read more</a><br />-->
        </p>
        <h2>Why Crop Framers Advisory System <br /></h2>
        <img src="Images/download (1).jpg" alt="" width="585" height="236" />
        <div class="clr"></div>
        <p>Many farmers suffer from loses in their farms which could be easily be avoided. For instance,
during rainy season most farmers don’t know what type of pesticide of medicine to spray their
crops. Without any advice, the farmer’s produce go down since the potatoes’ fertilizers is washed
away by the rain water.
Potato is one of the foods that most Kenyan families eat, hence its security is vital to the nation,
and so in order to make this not to big a big issue, its important to use the system since it will
help improve the food security by advising the farmers so that we could have an increased level
of production of potatoes.</p>
        <!--<p><a href="#">Read more</a></p>-->
      </div>
      <div class="right">
        <h2>Sidebar Menu</h2>
        <ul>
          <li><a href="home.html">Home</a></li>
          <li><a href="manage.html">manage farm</a></li>
          <li><a href="news.html"> News</a></li>
          <li><a href="forum.html">Forum</a></li>
        </ul>
        <h2>quick links</h2>
        <ul class="sponsors">
          <li class="sponsors"><a href="manage.html">Advice</a><br />
             get advice about your farm</li>
          <li class="sponsors"><a href="manage.html">manage farm</a><br />
            add details abot your farm</li>
          <li class="sponsors"><a href="manage.html">add farm</a><br />
            Add your farm</li>
          <li class="sponsors"><a href="forum.html">Forum</a><br />
            Premium CSS Templates</li>
<!--          <li class="sponsors"><a href="http://www.evrsoft.com">Evrsoft</a><br />
            Website Builder Software &amp; Tools</li>
          <li class="sponsors"><a href="http://www.myvectorstore.com">MyVectorStore</a><br />
            Royalty Free Stock Icons</li>-->
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="FBG">
    <div class="FBG_resize">
      <div class="blok">
        <h2><span>Image</span> Gallery</h2>
        <img src="Images/download (2).jpg" alt="" width="68" height="68" />
        <img src="Images/download.jpg" alt="" width="68" height="68" />
        <img src="Images/gettyimages-1248228512-612x612.jpg" alt="" width="68" height="68" />
        <img src="Images/istockphoto-1320570551-170667a.jpg" alt="" width="68" height="68" />
        <img src="Images/modern-technology-agriculture-green-seedling-icons-modern-technology-agriculture-green-seedling-icons-182231893.jpg" alt="" width="68" height="68" />
        <img src="Images/smart-farmer-concept-using-smartphone-260nw-1627018138.webp" alt="" width="68" height="68" />
        <div class="clr"></div>
        <h2>Contact Info </h2>
        <p><strong>Phone</strong>: +254713447936<br />
          <strong>Address</strong>: P.O box Private Bag, Maseno<br />
          <strong>E-mail:</strong> malonipleting790@gmail.com<br />
          <a href="#">contact page</a></p>
      </div>
      <div class="blok">
        <h2><span>System</span> objectives</h2>
        <p>
            <b>The objectives of the project include:</b><br>
• Advice farmers on what type of potato to plant based on marketability, geographical area
they are located in, cost of the seedling.<br>
• Advice the farmer on which fertilizer to use and the amount of fertilizer that has to be
used.<br>
• Advice the farmer on the best time and period to spray his farm.<br>
• Incase of changes in the weather, advice the farmer on what to do.<br>

        </p>
       
      </div>
      <div class="blok">
        <h2>Significance</h2>
        <p>This project is relevant to Sustainable Development Goal (SDG) 2, By 2030, ensuring sustainable food production systems and implement resilient agricultural practices that increase productivity and production, help maintain ecosystems, that strengthen capacity for adaptation to climate change, extreme weather, drought, flooding, and other disasters and that progressively improve land and soil quality. This project will go a long way in giving farmers the necessary advice on crop farming. Agriculture is the leading export in Kenya, earning the country foreign exchange alongside ensuring food security.</p>
        <p><br />
        </p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
                
            <?php
include './components/footer.php';
            ?>
        </div>
    </body>
</html>
