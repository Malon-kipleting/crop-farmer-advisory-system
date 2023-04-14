<?php
include 'connection.php';
$name =  $_SESSION['farmerFname'] . " ". $_SESSION['farmerLname'];
$farmer_id = $_SESSION['farmerId'];

if (isset($_POST['printReportBtn'])) {
    
    $farmerID = $_POST['farmer_Id'];
    $requestID = $_POST['request_Id'];
    
    // Set the content type as a downloadable PDF file
    header('Content-Type: application/pdf');
    // Set the file name
    header('Content-Disposition: attachment; filename="farmer_report_details.pdf"');

    // Include the necessary files for creating a PDF
    require('fpdf/fpdf.php');

    // Create a new PDF document
    $pdf = new FPDF();
    $pdf->AddPage();

    // Set the font and font size for the document
    $pdf->SetFont('Arial', 'B', 14);

    // Add the logo to the document
    $pdf->Image('images/logo.png', $pdf->GetPageWidth()/2 - 25, 10, 50, 0, 'PNG');

    // Write the title of the document
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 50, '', 0, 1, 'C');
    $pdf->Cell(0, 10, 'National Agricultural Advisory Services', 0, 1, 'C');
    $pdf->Cell(0, 10, 'Farmer Report Details', 0, 1, 'C');

    // Set the font and font size for the table headers
    $pdf->SetFont('Arial', 'B', 12);

    // Write the headers of the table
    $pdf->Cell(40, 10, 'Request ID', 1);
    $pdf->Cell(60, 10, 'Farm Name', 1);
    $pdf->Cell(50, 10, 'Farm Location', 1);
    $pdf->Cell(40, 10, 'Status', 1);
    $pdf->Ln();


    // Query to get the school details
    $sql = "SELECT * FROM farmer_request_advice_details 
    INNER JOIN request_response_details ON farmer_request_advice_details.request_id = request_response_details.request_id
    INNER JOIN farm_details ON farm_details.farm_id = farmer_request_advice_details.farm_id
    INNER JOIN farmer_details ON farmer_details.farmer_id = farmer_request_advice_details.farmer_id
    INNER JOIN county_details ON county_details.county_id = farm_details.farm_location
    INNER JOIN extension_officer ON extension_officer.officer_id = request_response_details.officer_id
    WHERE request_response_details.request_id = '$requestID' AND farmer_request_advice_details.farmer_id ='$farmerID'";
    $result = mysqli_query($db, $sql);

    // Set the font and font size for the table rows
    $pdf->SetFont('Arial', '', 10);

  // Loop through the results and write them to the table
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Write the data to the table
        $pdf->Cell(40, 10, $row['request_id'], 1);
        $pdf->Cell(60, 10, $row['farm_name'], 1);
        $pdf->Cell(50, 10, $row['county_name']." "."County", 1);
        $pdf->Cell(40, 10, $row['request_status'], 1);

        //2 new lines
        $pdf->Ln();
        $pdf->Ln();
        // Write the request description to the text area
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Request Description:', 0, 1, 'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(0, 10, $row['short_description'], 1);

        //new line
        $pdf->Ln();

        // Write the response
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Advice:', 0, 1, 'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(0, 10, $row['response'], 1);

        //new line
        $pdf->Ln();
        $pdf->Cell(0, 10, 'Served By:', 0, 1, 'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 10, $row['first_name']." ".$row['last_name']." on ".$row['date_added'], 0, 1);
    }
}

  // Close the database connection and output the PDF
  mysqli_close($db);
  $pdf->Output('D', 'farmer_report_details.pdf');
}


?>
<!DOCTYPE html>
<html>

<head>

    <title>Reports | Farmer</title>
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
                        <h5 class="card-title">List of Responses</h5>
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>Request ID</th>
                                    <th>Farm Name</th>
                                    <th>Farm Location</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
if ($farmer_id) {
    $data_fetch_query = "SELECT * FROM `farmer_request_advice_details`
        INNER JOIN request_response_details ON request_response_details.request_id = farmer_request_advice_details.request_id
        INNER JOIN farm_details ON farm_details.farm_id = farmer_request_advice_details.farm_id
        INNER JOIN county_details ON county_details.county_id = farm_details.farm_location
        WHERE farmer_request_advice_details.farmer_id = '$farmer_id'";
    $data_result = mysqli_query($db, $data_fetch_query);
    if ($data_result->num_rows > 0) {
        while ($row = $data_result->fetch_assoc()) {
            $request_id = $row['request_id'];
            $farmer_id = $row['farmer_id'];
            $farm_id = $row['farm_id'];
            $farm_name = $row['farm_name'];
            $crop_id = $row['crop_id'];
            $activity_id = $row['activity_id'];
            $county_name = $row['county_name'];
            $description = $row['short_description'];
            $status = $row['request_status'];
            $officer_id = $row['officer_id'];

            $print_button = '';
            if (!empty($officer_id)) {
                $print_button = "<input type='submit' name='printReportBtn' value='Print Report' class='btn btn-info printReportBtn'>";
            }else{
                $print_button = "<input type='button'  value='No Report'disabled class='btn btn-warning printReportBtn'>"; 
            }

            echo "<tr>";
            echo "<td>" . $request_id . "</td>";
            echo "<td>" . $farm_name . "</td>";
            echo "<td>" . $county_name . "</td>";
            echo "<td>" . $status . "</td>";
            echo "<td>";
            echo "<form method ='POST' action=''>";
            echo "<input type='text' hidden readonly name='farmer_Id' value='$farmer_id'>";
            echo "<input type='text' hidden readonly name='request_Id' value='$request_id'>";
            echo $print_button;
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<td>" . "No Data Found" . "</td>";
    }
} else {
    echo "<td>" . "No farms available" . "</td>";
}

?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Request ID</th>
                                    <th>Farm Name</th>
                                    <th>Farm Location</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>


        </div>
        <?php
include './components/footer.php';
            ?>
    </div>
    <script>
    </script>
    <?php
include './components/scripts.php';
?>
</body>

</html>