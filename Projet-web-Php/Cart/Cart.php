<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="./Cart.css">
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
            <li><a href="/projet-web/Cart/Cart.php"><img src="/projet-web/assets/image/ShoppingCart-removebg-preview.png" alt="ShoppingCart"></a></li>
        </ul>
    </div>
</header>

<div class="cart">
    <table>
        <thead>
            <tr>
                <th>Remove</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
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

            // Fetch products from the database
            $sql = "SELECT * FROM cart";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <tr>
                        <th>
                            <i class="bi bi-x-circle" data-id="' . $row["id"] . '"></i>
                        </th>
                        <th>
                            <img src="' . $row["img"] . '" alt="product">
                        </th>
                        <th>' . $row["nom"] . '</th>
                        <th class="price">' . $row["prix"] . '</th>
                        <th>
                            <input type="number" value="1" class="quantity" min="1">
                        </th>
                        <th class="subtotal">' . $row["prix"] . '</th>
                    </tr>';
                }
            } else {
                echo "<tr><th colspan='6'>No products found.</th></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
        <tr>
            <th colspan="5"></th>
            <th>Total: <span id="totalAmount"></span></th>
        </tr>
    </table>
    <button class="order" onclick="window.location.href='./Formulaire/Formulaire.html'"> Order now </button>
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
            <h6><i class="bi bi-telephone"></i>Phone : 53 821 022</h6>
        </div>
        <div class="a1">
            <h6><i class="bi bi-geo-alt"></i>Address: Monastir, Tunisia</h6>
        </div>
        <p class="copyright"> Angel store © 2023</p>
    </div>
</div>

<script>
    calculateTotal();
    const removeIcons = document.querySelectorAll('.bi-x-circle');
    removeIcons.forEach(icon => {
        icon.addEventListener('click', removeRow);
    });

    function removeRow(event) {
        const row = event.target.closest('tr');
        const productId = event.target.dataset.id; // Get the product ID from the data attribute
        console.log(productId);
        row.remove();
        calculateTotal();
        deleteFromDatabase(productId); // Call a function to delete the row from the database
        

    }

    function deleteFromDatabase(productId) {
        // Send an AJAX request to delete the row from the database
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log('Row deleted successfully from the database.');
            } else {
                console.log('Error deleting row from the database.');
            }
        };
        xhr.send('id=' + productId); // Send the product ID as a parameter
    }

    function calculateTotal() {
        const subtotals = document.querySelectorAll('.subtotal');
        const totalAmount = document.getElementById('totalAmount');
        let total = 0;

        subtotals.forEach(subtotal => {
            const subtotalValue = parseFloat(subtotal.textContent);
            total += subtotalValue;
        });

        totalAmount.textContent = `${total}Dt`;
    }
</script>
</body>
</html>
