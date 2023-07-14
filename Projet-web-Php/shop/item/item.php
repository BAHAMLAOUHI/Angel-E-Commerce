<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link rel="stylesheet" href="item.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>
<body>
    <header>
        <a href="#"><img src="/projet-web/assets/image/logo2.png" alt="logo"></a>
        <div>
            <ul class="navbar">
                <li><a href="/projet-web/Home/Home.html">Home</a></li>
                <li><a href="/projet-web/shop/Shop.php">Shop</a></li>
                <li><a href="/projet-web/Contact/Contact.html">Contact</a></li>
                <li><a href="/projet-web/Cart/Cart.php"><img src="/projet-web/assets/image/ShoppingCart-removebg-preview.png" alt="ShoppingCart"></a>
                </li>
            </ul>
        </div>
    </header>
    
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

// Get the item ID from the query parameter
$itemId = $_GET['id'];

// Fetch the item details from the database
$sql = "SELECT * FROM capuche WHERE id = '$itemId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the item details
    $row = $result->fetch_assoc();
    $itemName = $row["nom"];
    $itemImage = $row["img"];
    $itemPrice = $row["prix"];
    $desc = $row["description"];
    // ...
} else {
    echo "Item not found.";
}

// Close the database connection
$conn->close();
?>

<!-- Update the HTML elements with the item details -->
<div class="item">
    <div class="image-item">
        <img src="<?php echo $itemImage; ?>" alt="product">
    </div>
    <div class="description-item">
        <h4><?php echo $itemName; ?></h4>
        <h2><?php echo $itemPrice; ?>Dt</h2>
        <form action="addtodb.php" method="get">
            <select name="size" id="size">
                <option selected>Select size</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>
            <input type="number" name="quantity" value="1">
            <input type="hidden" name="itemId" value="<?php echo $itemId; ?>">
            <button type="submit" id="addToCartBtn" >Add To Cart</button>
        </form>
        <h4>Product Details</h4>
        <span> <?php echo $desc; ?> </span>
    </div>
</div>





<div class="footer">
        <div class="brand">
            <div class="logoFooter">
                <img src="/projet-web/assets/image/logo2.png" alt="">
            </div>
            <div class="social">
                <a href="https://www.facebook.com/angelstore.tn"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/angel.store.tn/"><i class="bi bi-instagram"></i></a>
                <a href="https://linkedin.com/"><i class="bi bi-linkedin"></i></a>
                <a href="https://twitter.com/"><i class="bi bi-twitter"></i></a>
            </div>


        </div>

        <div class="info">
            <div class="a1">
                <h6><a href="https://mail.google.com/mail"><i class="bi bi-envelope"></i></a>Email : Angelstoretn@gmail.com </h6>
            </div>

            <div class="a1">
                <h6>
                    <i class="bi bi-telephone"></i>
                    Phone : 53 821 022
                </h6>
            </div>


            <div class="a1">
                <h6><i class="bi bi-geo-alt"></i>Adress : Monastir, Tunisia </h6>
            </div>
            <p class="copyright"> Angel store © 2023</p>

        </div>
    </div>
</body>
<script src="item.js"></script>
</html>