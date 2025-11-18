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

$sql = "SELECT * FROM equipment_tbl";
$result = $conn->query($sql);

?>
<html lang="en">

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
    
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="" class="text-white">K K WAGH POLYTECHNIC NASHIK</a></small>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">Select  Equipments  for  Your  Lab</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="navbar-nav mx-auto">
						<a href="User_Login.php" class="nav-item nav-link" style="color:blue;">Back</a>
                            <a href="index.php" class="nav-item nav-link active" style="color:blue;">Home</a>
                           
                           
                            <div class="nav-item dropdown">
                            </div>
                            <a href="contact.php" class="nav-item nav-link" style="color:blue;">Contact</a>
							
                        </div>
                    </div>
                </nav>
            </div>
        </div>
      
      <div class="col-lg-6">
						
                            <div class="position-relative mx-auto">
							<h1 class="text-primary mb-0"></h1>
                               
								<br>
								<br>
								</div>
								</div>
<body>


           <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
			color: black; 			
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
 echo "<br>";
 echo "<br>";
 echo "<br>";
 echo "<br>";
if ($result->num_rows > 0) {
    echo '<form action="confirmation.php" method="post">';
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Image</th>';
    echo '<th>Name</th>';
    echo '<th>Status</th>';
    echo '<th>Version</th>';
    echo '<th>Quantity Available</th>';
    echo '<th>Price</th>';
    echo '<th>Enter Quantity</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td><img src="' . $row["image_path"] . '" alt="' . $row["name"] . '" width="150" height="100"></td>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td>' . $row["status"] . '</td>';
        echo '<td>' . $row["version"] . '</td>';
        echo '<td>' . $row["quantity"] . '</td>';
        echo '<td>Rs. ' . $row["price"] . '</td>';
        echo '<td><input type="checkbox" name="equipment_ids[]" value="' . $row["id"] . '"> ';
        echo '<input type="number" name="quantity[' . $row["id"] . ']" value="1" min="1" max="' . $row["quantity"] . '"></td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '<br>';
    echo '<input type="submit" "custom-button-color" value="Next">';
    echo '</form>';
} else {
    echo "No equipment found";
}


$conn->close();
?>
  <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>
