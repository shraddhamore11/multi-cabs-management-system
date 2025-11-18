<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_budgetdb";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete functionality
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteQuery = "DELETE FROM equipment_tbl WHERE id = $id";
    $conn->query($deleteQuery);
    header("Location: display_Equipment.php");
    exit();
}

// Change functionality
if (isset($_POST['change'])) {
    $id = $_POST['id'];
    $newQuantity = $_POST['new_quantity'];
    $newPrice = $_POST['new_price'];

    // Use prepared statements to prevent SQL injection
    $updateQuery = $conn->prepare("UPDATE equipment_tbl SET quantity = ?, price = ? WHERE id = ?");
    $updateQuery->bind_param("iii", $newQuantity, $newPrice, $id);
    $updateQuery->execute();

    header("Location: display_Equipment.php");
    exit();
}

// Display data in table
$query = "SELECT * FROM equipment_tbl";
$result = $conn->query($query);
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
    
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">K K WAGH POLYTECHNIC,NASHIK</a></small>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">List of Equipments</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                         <div class="navbar-nav mx-auto">
						<a href="AdminMain.php" class="nav-item nav-link" style="color:blue;">Back</a>
                            <a href="index.php" class="nav-item nav-link active" style="color:blue;">Home</a>
                           
                           
                            <div class="nav-item dropdown">
                            </div>
                            <a href="contact.php" class="nav-item nav-link" style="color:blue;">Contact</a>
							
                        </div>
                       
                        </div>
                    </div>
                </nav>
            </div>
        </div>
      
      <div class="col-lg-15">
						
                            <div class="position-relative mx-auto">
							<h1 class="text-primary mb-0">User Registration</h1>
                               
								<br>
								<br>
								</div>


<body>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd; /* Add border to the entire table */
        color: black; /* Set text color to black */
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
 
    <body>

    <h2>Equipment List</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Status</th>
            <th>Version</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td><img src= '" . $row['image_path'] . "' width='300px' height='250px'></td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td>{$row['version']}</td>";
            echo "<td>{$row['quantity']}</td>";
            echo "<td>{$row['price']}</td>";
            echo "<td>
                    <a href='display_Equipment.php?delete={$row['id']}'>Delete</a>
                    <br>
                    <br>
                    <a href='#' onclick='showChangeForm({$row['id']}, {$row['quantity']}, {$row['price']})'>Edit</a>
                  </td>";
            echo "</tr>";
        }
        ?>

    </table>

    <script>
        function showChangeForm(id, quantity, price) {
            var newQuantity = prompt("Enter new quantity:", quantity);
            var newPrice = prompt("Enter new price:", price);

            if (newQuantity !== null && newPrice !== null) {
                var form = document.createElement('form');
                form.method = 'post';
                form.action = 'display_Equipment.php';

                var idInput = document.createElement('input');
                idInput.type = 'hidden';
                idInput.name = 'id';
                idInput.value = id;

                var quantityInput = document.createElement('input');
                quantityInput.type = 'hidden';
                quantityInput.name = 'new_quantity';
                quantityInput.value = newQuantity;

                var priceInput = document.createElement('input');
                priceInput.type = 'hidden';
                priceInput.name = 'new_price';
                priceInput.value = newPrice;

                var changeInput = document.createElement('input');
                changeInput.type = 'hidden';
                changeInput.name = 'change';
                changeInput.value = 'true';

                form.appendChild(idInput);
                form.appendChild(quantityInput);
                form.appendChild(priceInput);
                form.appendChild(changeInput);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>

</body>

</html>

<?php
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
