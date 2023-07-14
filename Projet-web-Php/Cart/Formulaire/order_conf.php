<?php echo '
<!DOCTYPE html>
<html>
<head>
  <title>Order Confirmation</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin-top:20px;
    }
    
    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
      color: #333;
      margin-bottom: 20px;
    }
    
    p {
      color: #666;
      margin-bottom: 10px;
    }
    
    strong {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Order Confirmation</h1>
    <p><strong>First Name:</strong> ' . $fname . '</p>
    <p><strong>Last Name:</strong> ' . $lname . '</p>
    <p><strong>Address:</strong> ' . $houseadd . '</p>
    <p><strong>Apartment:</strong> ' . $apartment . '</p>
    <p><strong>City:</strong> ' . $city . '</p>
    <p><strong>Postal Code:</strong> ' . $postcode . '</p>
    <p><strong>Phone:</strong> ' . $phone . '</p>
    <p><strong>Email:</strong> ' . $email . '</p>
  </div>
</body>
</html>';
?>