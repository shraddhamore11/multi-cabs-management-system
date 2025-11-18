<?php
// Database connection parameters
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

// Function to validate email
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate mobile number
function validate_mobile($mobile) {
    return preg_match('/^[0-9]{10}$/', $mobile);
}

// Function to validate password (at least 8 characters long)
function validate_password($password) {
    return strlen($password) >= 8;
}

// Get user input from the form
$uname = $conn->real_escape_string($_POST['uname']);
$depart = $conn->real_escape_string($_POST['depart']);
$labname = $conn->real_escape_string($_POST['labname']);
$uemail = $conn->real_escape_string($_POST['uemail']);
$umob = $conn->real_escape_string($_POST['umob']);
$upass = $conn->real_escape_string($_POST['upass']);

// Validation for uname
if (empty($uname)) {
    die("Error: Username is required");
}
if (empty($depart)) {
    die("Error: department is required");
}
if (empty($labname)) {
    die("Error: Lab Name is required");
}

// Validation for uemail
if (!validate_email($uemail)) {
    die("Error: Invalid email format");
}

// Validation for umob
if (!validate_mobile($umob)) {
    die("Error: Invalid mobile number format");
}

// Validation for upass
if (!validate_password($upass)) {
    die("Error: Password must be at least 8 characters long");
}

// SQL query to insert data into the table
$sql = "INSERT INTO user_tbl (uname, depart, labname, uemail, umob, upass) VALUES ('$uname', '$depart', '$labname', '$uemail', '$umob', '$upass')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    header("Location: User_Login.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
