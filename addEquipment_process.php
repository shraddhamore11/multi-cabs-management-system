<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_budgetdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    // Retrieve form data
	
	$filename = $_FILES["image_path"]["name"];
	$tempname = $_FILES["image_path"]["tmp_name"];
	$folder = "images/".$filename;
	move_uploaded_file($tempname, $folder);
    $name = $_POST["name"];
    $status = $_POST["status"];
    $version = $_POST["version"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];

    $sql = "INSERT INTO equipment_tbl (image_path, name, status, version, quantity, price) VALUES ('$folder', '$name', '$status', '$version', '$quantity', '$price')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
      header("Location: display_Equipment.php");
    exit();
    } else
		{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

// Close the database connection
$conn->close();
?>
