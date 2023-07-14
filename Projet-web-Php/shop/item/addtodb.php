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

if (isset($_GET['itemId']) && isset($_GET['size']) && isset($_GET['quantity'])) {
    $sql = "SELECT * FROM capuche WHERE id = '" . $_GET['itemId'] . "'";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $itemId = $_GET['itemId'];
    $size = $_GET['size'];
    $quantity = $_GET['quantity'];
    $nom = $row["nom"];
    $img = $row["img"];
    $prix = $row["prix"];
} else {
    echo "Item not found.";
}


   // Check if the item already exists in the cart
$checkSql = "SELECT * FROM cart WHERE id = '$itemId' AND size = '$size'";
$checkResult = $conn->query($checkSql);

if ($checkResult && $checkResult->num_rows > 0) {
    echo "Item already exists in the cart!";
} else {
    // Item does not exist, proceed with the insertion
    // Prepare the SQL statement
    $sql = "INSERT INTO cart (id, size, quantity, nom, img, prix) VALUES ('$itemId', '$size', '$quantity', '$nom', '$img', '$prix')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo '<!DOCTYPE html>
<html>
<head>
    <title>Item added to cart</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Item added to cart successfully!</h1>
    </div>
</body>
</html>';

    } else {
        echo "Error adding item to cart: " . $conn->error;
    }
}

}

// Close the database connection
$conn->close();

?>