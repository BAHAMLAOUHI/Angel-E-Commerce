<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="Shop.css">
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


    <form action="Shop.php" method="POST">
    <div class="segmentation">
        <h4>Choose any product :</h4>
        <select name="categories" class="category-select">
            <option value="capuche" selected>Sweet-shirts</option>
            <option value="Sweet-shirts">T-shirts</option>
            <option value="stickers">stickers</option>
            <option value="Mugs">Mugs</option>
            <option value="Tote bags">Tote bags</option>
        </select>
    </div>
</form>




 <div class="product-container">

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
            
// Assuming you have the necessary database connection code before this section

// Retrieve the category value from the query parameter
$category = isset($_GET['category']) ? $_GET['category'] : 'capuche';

// Prepare the SQL statement with a WHERE clause to filter products based on the category
$sql = "SELECT * FROM capuche WHERE categorie = '$category'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Display the products based on the category
        echo '
        <div class="product">
            <img src="' . $row["img"] . '" alt="">
            <div class="product-description">
                <h5>' . $row["nom"] . '</h5>
                <div class="star">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                </div>
                <h4>' . $row["prix"] . 'Dt</h4>
                <a href="item/item.php?id=' . $row["id"] . '"><i class="bi bi-cart4"></i></a>
            </div>
        </div>
        ';
    }
} else {
    echo "No products found for the selected category.";
}

// Close the database connection
$conn->close();
?>
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
</html>