<?php
include 'connection.php';
$name =  $_SESSION['farmerFname'] . " ". $_SESSION['farmerLname'];
$farmer_id = $_SESSION['farmerId'];

  // Delete farm Details
  if (isset($_POST['delete-farm-btn'])) {

	$farmID = $_POST['farm_id'];
	
	if (empty($farmID)) {
	  array_push($errors, "Farm ID is required");
	}
	if (count($errors) == 0) {
		$farm_data_delete_query = "DELETE FROM `farm_details` WHERE `farm_id`='$farmID' ";
		$results = mysqli_query($db, $farm_data_delete_query);
  
		  header('location: farms.php');
		}else{
		  array_push($errors, "Unable to delete farm");
		  header('location: farms.php');
		}
	}
  


//Update farm details
if (isset($_POST['update-farm-details-btn'])) {
	$farmid = $_POST['farm_id'];
	$farmname = $_POST['farm_name'];
	$farmlocation = $_POST['cnty_id'];
	$farmsize = $_POST['frm_size'];

	if (empty($farmid)) {
	  array_push($errors, "Farm ID is required");
	}
	if (empty($farmname)) {
	  array_push($errors, "Farm name is required");
	}
	if (empty($farmlocation)) {
	  array_push($errors, "Enter farm location");
	}
	if (empty($farmsize)) {
	  array_push($errors, "Input farm size");
	}
	if (count($errors) == 0) {
	 
	  $add_farm_query = "UPDATE `farm_details` SET `farm_name`='$farmname',`farm_location`='$farmlocation',`farm_size`='$farmsize' WHERE `farm_id`='$farmid'";
	  $results = mysqli_query($db, $add_farm_query);

	  header('location: farms.php');
	}else{
		array_push($errors, "unable to update details");
		header('location: farms.php');
	  }
	}
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
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                            width="100%">
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
	INNER JOIN county_details ON county_details.county_id = farm_details.farm_location WHERE farmer_owner_details.owner_id = '$farmer_id'";
      $data_result = mysqli_query($db, $data_fetch_query);
      if ($data_result->num_rows > 0){
          while($row = $data_result->fetch_assoc()) {
              $farm_id = $row['farm_id'];
              $farm_name = $row['farm_name'];
              $farm_size = $row['farm_size'];
              $farm_loc = $row['county_id'];
              $farm_location = $row['county_name'];
              $date_created = $row['date_added'];



      echo "<tr> <td>" .$farm_name.  "</td>";
      echo "<td>" .$farm_size." "."Acres"."</td>";
      echo "<td>" .$farm_location."</td>";
      echo "<td>" .$date_created."</td>";
      echo "<td>
        
      <form method ='POST' action=''>
      <input  type='text' hidden name='Farm_id' value='$farm_id'>
      <input type='submit' data-farm_id='$farm_id'  data-farm_name='$farm_name' data-farm_size='$farm_size' data-farm_location='$farm_loc' value='Edit Details' name='edit-farm-btn' class='btn btn-success edit-farm-modal-btn m-2'>
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


            <!--delete farm-->
            <div class="modal" id='deleteFarmModal' tabindex="-1" role="dialog" style="color:black;font-weight:normal;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color:red">⚠ Warning!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="modal-body">
                                <p>Are you sure you want to delete this Farm?</p>
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <input type="text" hidden class="form-control" id="farmID" required readonly
                                            name='farm_id'>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No,
                                            Cancel</button>
                                        <button type="submit" name='delete-farm-btn'
                                            class="btn btn-danger">Yes,Delete!</button>
                                    </div>
                                </form>
                            </div>

                        </div>

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
                            <form method="POST" action="">
                                <div class="form-group">
                                    <input type="text" readonly hidden name="farm_id" class="form-control" id="farm_id"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" readonly class="col-form-label">Farm Name:</label>
                                    <input type="text" name="farm_name" class="form-control" id="farm_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" readonly class="col-form-label">Farm Size:</label>
                                    <input type="number" name="frm_size" class="form-control" id="farm_size" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" readonly class="col-form-label">Farm Location:</label>
                                    <label for="uni_semester_id">Select County:</label>
                                    <select class="form-control" id="county_id" name="cnty_id" required>
                                        <option value="">Select County..</option>
                                        <?php 
							// Retrieve the semesters from the database
							$sql=mysqli_query($db,"select * from county_details");
							while ($rw=mysqli_fetch_array($sql)) {
							?>
                                        <option value="<?php echo htmlentities($rw['county_id']);?>">
                                            <?php echo htmlentities($rw['county_name']);?> County</option>
                                        <?php
							}
							?>
                                    </select>

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
            </div>
            <!--end of modal-->

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

            let farmid = editButton.dataset.farm_id;
            let farm_name = editButton.dataset.farm_name;
            let farm_size = editButton.dataset.farm_size;
            let farm_location = editButton.dataset.farm_location;

            document.getElementById("farm_id").value = farmid;
            document.getElementById("farm_name").value = farm_name;
            document.getElementById("farm_size").value = farm_size;
            document.getElementById("county_id").value = farm_location;
            // pre-select the option in the dropdown menu
            const county_select = document.querySelector('#county_id');
            county_select.value = farm_location;

            editFarmModal();
        });
    });



    // delete farm modal query
    function deleteFarmModal() {
        $("#deleteFarmModal").modal("show");
    }
    let deleteBtns = document.querySelectorAll(".deleteFarmBtn");
    deleteBtns.forEach(function(deleteBtn) {
        deleteBtn.addEventListener("click", function(e) {
            e.preventDefault();

            let farm_id = deleteBtn.dataset.id;

            document.getElementById("farmID").value = farm_id;

            deleteFarmModal();
        });
    });
    </script>
    <?php
include './components/scripts.php';
?>
</body>

</html>