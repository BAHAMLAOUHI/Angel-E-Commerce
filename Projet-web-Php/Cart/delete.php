<?php
// Connect to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orders";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the product ID parameter is set
if (isset($_POST['id'])) {
    $productId = $_POST['id'];

    // Prepare and execute the SQL query to delete the row
    $sql = "DELETE FROM cart WHERE id = '$productId'";
    if ($conn->query($sql) === TRUE) {
        echo "Row deleted successfully.";
    } else {
        echo "Error deleting row: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
