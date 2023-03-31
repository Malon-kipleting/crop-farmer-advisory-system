<?php
include 'connection.php';
$name =  $_SESSION['farmerFname'] . " ". $_SESSION['farmerLname'];
$farmer_id = $_SESSION['farmerId'];


?>
<!DOCTYPE html>
<html>
<head>
     
     <title>My Farms</title>
     <?php
include './components/header.php';
?>
     
 </head>
<body>
	<?php
include './components/navbar.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List of Farms</h5>
                            <table id="dtBasicExample" class="table table-striped table-bordered table-sm"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Farm Name</th>
                                        <th>Farm Size (Acres)</th>
                                        <th>Farm Location</th>
                                        <th>Date Added</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
  if($farmer_id){
      $data_fetch_query = "SELECT * FROM `farm_details`
	INNER JOIN farmer_owner_details ON farmer_owner_details.farm_id = farm_details.farm_id
	INNER JOIN county_details ON county_details.county_id = farm_details.farm_location
	";
      $data_result = mysqli_query($db, $data_fetch_query);
      if ($data_result->num_rows > 0){
          while($row = $data_result->fetch_assoc()) {
              $farm_id = $row['farm_id'];
              $farm_name = $row['farm_name'];
              $farm_size = $row['farm_size'];
              $farm_location = $row['county_name'];
              $date_created = $row['date_added'];



      echo "<tr> <td>" .$farm_name.  "</td>";
      echo "<td>" .$farm_size." "."Acres"."</td>";
      echo "<td>" .$farm_location."</td>";
      echo "<td>" .$date_created."</td>";
      echo "<td>
        
      <form method ='POST' action=''>
      <input  type='text' hidden name='Farm_id' value='$farm_id'>
      <input type='submit' data-farm_id='$farm_id'  data-farm_name='$farm_name' data-farm_size='$farm_size' data-farm_location='$farm_location' value='Edit Details' name='edit-farm-btn' class='btn btn-success edit-farm-modal-btn m-2'>
      <input type='submit' data-id= '$farm_id' value='Delete Farm'  class='btn btn-danger deleteFarmBtn'>
      </form>
      </td> </tr>";
      }
      
      }else{
      echo "<td>"."No Data Found"."</td>";
      }
      
      } else{
          echo "<td>"."No farms available"."</td>";
      }

?>
                                </tbody>
                                <tfoot>
                                    <tr>
									<th>Farm Name</th>
									<th>Farm Size (Acres)</th>
                                        <th>Farm Location</th>
										<th>Date Added</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
		</div>

 <!--edit farm details-->
 <div class="modal" id="editFarmModal" tabindex="-1" role="dialog" aria-labelledby="editFarmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFarmModalLabel">Edit Farm Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" >
                        <div class="form-group">
                            <input type="text" readonly  name="farm_id" class="form-control" id="farm_id" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" readonly class="col-form-label">Farm Name:</label>
                            <input type="text" name="farm_name" class="form-control" id="farm_name" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" readonly class="col-form-label">Farm Size:</label>
                            <input type="text" name="farm_size" class="form-control" id="farm_size" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" readonly class="col-form-label">Farm Location:</label>
                            <input type="text" name="farm_loc" class="form-control" id="farm_loc" required>
                        </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info" name="update-farm-details-btn">Update
                                Farm Details</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!--end of modal-->

	</div>
</div>
	<script>

	    //edit farm details modal code
	function editFarmModal() {
		$("#editFarmModal").modal("show");
	}
    let editButtons = document.querySelectorAll(".edit-farm-modal-btn");
    editButtons.forEach(function(editButton) {
        editButton.addEventListener("click", function(e) {
            e.preventDefault();

            // let schoolid = editButton.dataset.farm_id;
            // let sch_name = editButton.dataset.schname;
            // let sch_short_name = editButton.dataset.schshort;


            // document.getElementById("sch_id").value = schoolid;
            // document.getElementById("sch_name").value = sch_name;
            // document.getElementById("sch_short_form").value = sch_short_name;

            editFarmModal();
        });
    });
	</script>
<?php
include './components/scripts.php';
?>
</body>
</html>
