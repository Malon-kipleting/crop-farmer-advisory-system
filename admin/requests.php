<?php
include 'connection.php';
$name = $_SESSION['adm_fname']. " ". $_SESSION['adm_lname'];
$officer_id = $_SESSION['officerId'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Requests | Admin</title>
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
                                <h5 class="card-title">List of Requests</h5>
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Request ID</th>
                                            <th>Farmer Name</th>
                                            <th>Farmer Email</th>
                                            <th>Request Status</th>
                                            <th>Date Submitted</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
  if($officer_id){
      $data_fetch_query = "SELECT * FROM `farmer_request_advice_details`
      INNER JOIN request_response_details ON request_response_details.request_id = farmer_request_advice_details.request_id
      INNER JOIN farm_details ON farm_details.farm_id = farmer_request_advice_details.farm_id
      INNER JOIN crop_details ON crop_details.crop_id = farmer_request_advice_details.crop_id
      INNER JOIN county_details ON county_details.county_id = farm_details.farm_location
      INNER JOIN activity_details ON activity_details.activity_id = farmer_request_advice_details.activity_id
      INNER JOIN farmer_details ON farmer_details.farmer_id = farmer_request_advice_details.farmer_id
      WHERE request_response_details.request_status = 'Pending'
      ";
      $data_result = mysqli_query($db, $data_fetch_query);
      if ($data_result->num_rows > 0){
          while($row = $data_result->fetch_assoc()) {
              $req_id = $row['request_id'];
              $farmer_id = $row['farmer_id'];
              $farmer_fname = $row['farmer_fname'];
              $farmer_lname = $row['farmer_lname'];
              $farmer_email = $row['farmer_email'];
              $date_submitted = $row['date_added'];
              $status= $row['request_status'];

      echo "<tr> <td>" .$req_id.  "</td>";
      echo "<td>" . $farmer_fname." ". $farmer_lname."</td>";
      echo "<td>" .$farmer_email."</td>";
      echo "<td>" .$status."</td>";
      echo "<td>" .$date_submitted."</td>";
      echo "<td>
        
      <form method ='POST' action=''>
      <input  type='text' hidden readonly name='request_id' value='$req_id'>
      <input type='submit' data-id= '$req_id' value='View More'  class='btn btn-success viewRequestBtn'>
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
                                            <th>Request ID</th>
                                            <th>Farmer Name</th>
                                            <th>Farmer Email</th>
                                            <th>Request Status</th>
                                            <th>Date Submitted</th>
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
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
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