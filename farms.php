<?php
include 'connection.php';
$name =  $_SESSION['farmerFname'] . " ". $_SESSION['farmerLname'];
$farmer_id = $_SESSION['farmerId'];


?>
<!DOCTYPE html>
<html>
<head>
	<title>My Farms</title>
</head>
<body>
	<h1>My Farms</h1>
	
	<table>
		<tr>
			<th>Farm Name</th>
			<th>Farmer Name</th>
			<th>Location</th>
			<th>Size (ha)</th>
		</tr>

		<?php
	
			// Get farms data from database
			$sql = "SELECT * FROM farm_details";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				// Output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>" . $row["farm_name"] . "</td>";
					echo "<td>" . $row["farmer_name"] . "</td>";
					echo "<td>" . $row["location"] . "</td>";
					echo "<td>" . $row["size"] . "</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan='4'>No farms added yet.</td></tr>";
			}

			// Close database connection
			mysqli_close($conn);
		?>
	</table>
</body>
</html>
