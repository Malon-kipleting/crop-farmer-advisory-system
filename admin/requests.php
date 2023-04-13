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
                                            <th>Farmer Phone</th>
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
              $farmer_phone= $row['farmer_phone'];
              $date_submitted = $row['date_added'];
              $status= $row['request_status'];
              $desc= $row['short_description'];
              $farm_id= $row['farm_id'];
              $farm_name= $row['farm_name'];
              $farm_size= $row['farm_size'];
              $crop_id= $row['crop_id'];
              $crop_name= $row['crop_name'];
              $activity_id= $row['activity_id'];
              $activity_name= $row['activity_name'];
              $county_id= $row['farm_location'];
              $county_name= $row['county_name'];


      echo "<tr> <td>" .$req_id.  "</td>";
      echo "<td>" . $farmer_fname." ". $farmer_lname."</td>";
      echo "<td>" .$farmer_email."</td>";
      echo "<td>" .$farmer_phone."</td>";
      echo "<td>" .$date_submitted."</td>";
      echo "<td>
        
      <form method ='POST' action='connection.php'>
      <input  type='text' readonly hidden name='request_id' value='$req_id'>
      <input  type='text' readonly hidden name='fname' value='$farmer_fname'>
      <input  type='text' readonly hidden name='lname' value='$farmer_lname'>
      <input  type='text' readonly hidden name='farmer_mail' value='$farmer_email'>
      <input  type='text' readonly hidden name='farmer_phone' value='$farmer_phone'>
      <input  type='text' readonly hidden name='shrt_desc' value='$desc'>
      <input  type='text' readonly hidden name='req_status' value='$status'>
      <input  type='text' readonly hidden name='farm_id' value='$farm_id'>
      <input  type='text' readonly hidden name='farm_name' value='$farm_name'>
      <input  type='text' readonly hidden name='farm_size' value='$farm_size'>
      <input  type='text' readonly hidden name='crop_id' value='$crop_id'>
      <input  type='text' readonly hidden name='crop_name' value='$crop_name'>
      <input  type='text' readonly hidden name='activity_id' value='$activity_id'>
      <input  type='text' readonly hidden name='activity_name' value='$activity_name'>
      <input  type='text' readonly hidden name='county_id' value='$county_id'>
      <input  type='text' readonly hidden name='county_name' value='$county_name'>
      <input type='submit' data-id= '$req_id' value='View More' name='view-request-btn' class='btn btn-success viewRequestBtn'>
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
                                            <th>Farmer Phone</th>
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