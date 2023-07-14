<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orders";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the pack checkboxes are selected
    if (isset($_POST["pack"])) {
        $packs = implode(", ", $_POST["pack"]);
    } else {
        $packs = "";
    }

    // Sanitize the description input
    $description = isset($_POST["description"]) ? $_POST["description"] : "";

    // Prepare the SQL statement to insert the form data into the database
    $stmt = $conn->prepare("INSERT INTO packs (pack_choice, description) VALUES (?, ?)");

    // Bind the parameters and execute the statement
    $stmt->bind_param("ss", $packs, $description);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Form data saved successfully.";
    } else {
        echo "Error saving form data.";
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>
