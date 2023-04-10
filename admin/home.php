<?php
include 'connection.php';
$name = $_SESSION['adm_fname']. " ". $_SESSION['adm_lname'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
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

        <div class="row pl-3 pr-3">
            <div class="col-md-4">
                <a href="./requests.php">
                    <div class="card card-hover">
                        <div class="box bg-primary text-center p-2">
                            <h1 class="font-light text-white">
                                <i class="fa fa-exchange-alt"></i>
                            </h1>
                            <h6 class="text-white">Requests</h6>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="./farmers.php">
                    <div class="card card-hover">
                        <div class="box bg-success text-center p-2">
                            <h1 class="font-light text-white">
                                <i class="fa fa-newspaper"></i>
                            </h1>
                            <h6 class="text-white">Reports</h6>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-md-4">
                <a href="./users.php">
                    <div class="card card-hover">
                        <div class="box bg-info text-center p-2">
                            <h1 class="font-light text-white">
                                <i class="fa fa-user"></i>
                            </h1>
                            <h6 class="text-white">Users</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4 mt-3">
            <a href="./users.php">
                <div class="card card-hover">
                    <div class="box bg-info text-center p-2">
                        <h1 class="font-light text-white">
                            <i class="fa fa-id-badge"></i>
                        </h1>
                        <h6 class="text-white">Profile</h6>
                    </div>
                </div>
            </a>
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