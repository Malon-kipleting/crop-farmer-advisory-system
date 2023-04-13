<?php
include 'connection.php';
$name =  $_SESSION['farmerFname'] . " ". $_SESSION['farmerLname'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home | Farmer</title>
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

        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="./images/slide1.jpg" alt="First slide"
                                style=" max-height: 700px;">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./images/slide2.jpg" alt="Second slide"
                                style=" max-height: 700px;">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./images/slide3.jpg" alt="Third slide"
                                style=" max-height: 700px;">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./images/slide4.jpg" alt="Fourth slide"
                                style=" max-height: 700px;">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>


        <?php
include './components/footer.php';
  ?>
        <?php
include './components/scripts.php';
  ?>
    </div>
</body>

</html>