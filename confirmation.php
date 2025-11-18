<?php

require('fpdf.php'); // Include the FPDF library

class PDF extends FPDF
{
    
    function Header()
    {
          
     
    }
    function Footer()
    {
        
    }
}
?>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_budgetdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Process form submission
    if (isset($_POST['equipment_ids']) && is_array($_POST['equipment_ids'])) {
        $_SESSION['selected_equipment'] = $_POST['equipment_ids'];
        $_SESSION['quantity'] = $_POST['quantity'];
?>


    <head>
        <meta charset="utf-8">
        <title>Lab Budget Management</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                   
                 
                </div>
            </div>
            <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
    
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">K K WAGH POLYTECHNIC,NASHIK</a></small>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">Selected Equipment Information</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="navbar-nav mx-auto">
						<a href="User_main.php" class="nav-item nav-link" style="color:blue;">Back</a>
                            <a href="index.php" class="nav-item nav-link active" style="color:blue;">Home</a>
                           
                           
                            <div class="nav-item dropdown">
                            </div>
                            <a href="contact.php" class="nav-item nav-link" style="color:blue;">Contact</a>
							
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->
        <!-- Single Page Header start -->
      <div class="col-lg-6">
						
                            <div class="position-relative mx-auto">
							<br>
							<br>
							<br>
							<h1 class="text-primary mb-0">User Registration</h1>
                               
								<br>
								<br>
								</div>
								</div>

<head>
    <!-- Your head content remains unchanged -->
</head>

<body>


           <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
color: black;			/* Add border to the entire table */
        }

        th, td {
            border: 1px solid #ddd; /* Add border to each cell */
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
     <?php
        // Display selected equipment information for confirmation
       
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Name</th>';
        echo '<th>Status</th>';
        echo '<th>Version</th>';
        echo '<th>Quantity</th>';
        echo '<th>Price</th>';
        echo '<th>Total Price</th>';
        echo '</tr>';

        foreach ($_SESSION['selected_equipment'] as $equipment_id) {
            $quantity = $_SESSION['quantity'][$equipment_id];
            $query_equipment = "SELECT id, name, status, version, quantity, price FROM equipment_tbl WHERE id = '$equipment_id'";
            $result_equipment = $conn->query($query_equipment);

            if ($result_equipment && $result_equipment->num_rows > 0) {
                $row_equipment = $result_equipment->fetch_assoc();

                // Calculate total price
                $total_price = $quantity * $row_equipment['price'];
                // Display equipment information for confirmation
                echo '<tr>';
                echo '<td>' . $row_equipment["id"] . '</td>';
                echo '<td>' . $row_equipment["name"] . '</td>';
                echo '<td>' . $row_equipment["status"] . '</td>';
                echo '<td>' . $row_equipment["version"] . '</td>';
                echo '<td>' . $quantity . '</td>';
                echo '<td>Rs' . $row_equipment["price"] . '</td>';
                echo '<td>Rs' . $total_price . '</td>';
                echo '</tr>';
            }
        }
        echo '</table>';

        // Ask for confirmation before generating PDF
        echo '<form action="confirmation.php" method="post">';
        echo '<input type="hidden" name="confirmed" value="true">';
        echo '<input type="submit" value="Confirm Purchase">';
        echo '</form>';
    } elseif (isset($_POST['confirmed']) && $_POST['confirmed'] === 'true') {
        // If confirmed, proceed to generate PDF and update quantity
        foreach ($_SESSION['selected_equipment'] as $equipment_id) {
            $quantity = $_SESSION['quantity'][$equipment_id];

            // Update quantity in equipment_tbl
            $updateQuantityQuery = "UPDATE equipment_tbl SET quantity = quantity - $quantity WHERE id = '$equipment_id'";
            $conn->query($updateQuantityQuery);
        }

        // Create PDF
        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        // Retrieve user information based on the email stored in the session
        $user_email = $_SESSION['uemail'];
        $query_user = "SELECT uname, depart, labname, uemail, umob FROM user_tbl WHERE uemail = '$user_email'";
        $result_user = $conn->query($query_user);

        // Display user information in PDF
        if ($result_user && $result_user->num_rows > 0) {
            $row_user = $result_user->fetch_assoc();
			$pdf->Image('logo.png',5,10,200,25);
			
            $pdf->SetY(40); 
			$pdf->SetFont('times', '', 12);
			$pdf->Cell(0, 10, 'Date: ' . date('d-m-y'), 0, 1,'R');
			$pdf->SetFont('times', 'B', 14);
            $pdf->Cell(0, 10, 'User Information', 0, 1, 'L');
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(0, 8, 'Name: ' . $row_user["uname"], 0, 1,'L');
            $pdf->Cell(0, 8, 'Department: ' . $row_user["depart"], 0, 1, 'L');
            $pdf->Cell(0, 8, 'Lab Name: ' . $row_user["labname"], 0, 1, 'L');
            $pdf->Cell(0, 8, 'Email: ' . $row_user["uemail"], 0, 1, 'L');
            $pdf->Cell(0, 8, 'Mobile: ' . $row_user["umob"], 0, 1, 'L');
            $pdf->Ln();
        } else {
            $pdf->Cell(0, 10, 'User not found.', 0, 1, 'L');
        }

        // Display selected equipment information in PDF
		$pdf->SetFont('times', 'B', 14);
        $pdf->Cell(0, 10, 'Selected Equipment Information', 0, 1);
		$pdf->SetFont('times', '', 12);
        $pdf->Cell(10, 10, 'ID', 1);
        $pdf->Cell(40, 10, 'Name', 1);
        $pdf->Cell(20, 10, 'Status', 1);
        $pdf->Cell(45, 10, 'Version', 1);
        $pdf->Cell(20, 10, 'Quantity', 1);
        $pdf->Cell(25, 10, 'Price', 1);
        $pdf->Cell(30, 10, 'Total Price', 1);
        $pdf->Ln();

        foreach ($_SESSION['selected_equipment'] as $equipment_id) {
            $quantity = $_SESSION['quantity'][$equipment_id];
            $query_equipment = "SELECT id, name, status, version, quantity, price FROM equipment_tbl WHERE id = '$equipment_id'";
            $result_equipment = $conn->query($query_equipment);

            if ($result_equipment && $result_equipment->num_rows > 0) {
                $row_equipment = $result_equipment->fetch_assoc();

                // Calculate total price
                $total_price = $quantity * $row_equipment['price'];

                // Display equipment information in PDF
                $pdf->Cell(10, 10, $row_equipment["id"], 1);
                $pdf->Cell(40, 10, $row_equipment["name"], 1);
                $pdf->Cell(20, 10, $row_equipment["status"], 1);
                $pdf->Cell(45, 10, $row_equipment["version"], 1);
                $pdf->Cell(20, 10, $quantity, 1);
                $pdf->Cell(25, 10, 'Rs.' . $row_equipment["price"], 1);
                $pdf->Cell(30, 10, 'Rs.' . $total_price, 1);
                $pdf->Ln();
            }
        }

        // Add the current date to the PDF
        $pdf->Ln();
        
        $pdf->SetY(-40);

        $imageFile = 'TAsign.png'; 
        $pdf->Image($imageFile, $pdf->GetX(), $pdf->GetY(), 0,10, 'PNG');  
        $pdf->Output();
        // Insert into purchaseinfo_tbl
        $uname = $row_user['uname']; // Change this based on your user_tbl structure
        $depart = $row_user['depart']; 
		$labname = $row_user['labname']; 
		$uemail = $row_user['uemail']; 
		$umob = $row_user['umob']; 
		$name = $row_equipment['name'];
		$status = $row_equipment['status'];
		$version = $row_equipment['version'];
		$quantity = $_SESSION['quantity'][$_SESSION['selected_equipment'][0]]; // Use the quantity from the session
		$price = $row_equipment['price'];
		$total_price = $row_equipment['price'] * $quantity; // Calculate total price again based on the selected quantity
		$purchase_date = date('d-m-y');
		
        $query_insert = "INSERT INTO purchaseinfo_tbl (uname, depart, labname, uemail, umob, name, status, version, quantity, price,
		total_price, purchase_date) VALUES ('$uname', '$depart', '$labname', '$uemail', '$umob', '$name', 
		'$status', '$version', '$quantity', '$price', '$total_price', '$purchase_date')";
        $result_insert = $conn->query($query_insert);

        if ($result_insert) {
            echo '<p>Purchase information inserted into purchaseinfo_tbl.</p>';
        } else {
            echo '<p>Error inserting purchase information.</p>';
        }
    } else {
        echo "No equipment selected.";
    }
} else {
    echo "Invalid request.";
}


$conn->close();
?>
  
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="js/main.js"></script>
    </body>

</html>
