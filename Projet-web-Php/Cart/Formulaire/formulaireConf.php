<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
   
// Check if the form has been submitted
if (isset($_POST['submit'])) {
  
  // Check if the required fields are not empty
  if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['houseadd']) && !empty($_POST['city']) && !empty($_POST['postcode']) && !empty($_POST['phone']) && !empty($_POST['email'])) {
    
    // Get the form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $houseadd = $_POST['houseadd'];
    $apartment = $_POST['apartment'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

 include 'order_conf.php';
    
    //   // Set the recipient email address
    //   $to = 'baha.mlaouhi2@gmail.com';
    
    //   // Set the email subject
    $subject = 'New Form Submission';
      
    //   // Set the email message
      $message = "First Name: $fname\n"
               . "Last Name: $lname\n"
               . "Address: $houseadd\n"
               . "Apartment: $apartment\n"
               . "City: $city\n"
               . "Postal Code: $postcode\n"
               . "Phone: $phone\n"
               . "Email: $email\n";




               
// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orders";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to insert the form data into the database
$stmt = $conn->prepare("INSERT INTO client (nom, prenom, adresse, appartement, city, code_postal, numtel, mail) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $fname, $lname, $houseadd, $apartment, $city, $postcode, $phone, $email);

// Execute the statement
if ($stmt->execute()) {
    echo "Order placed successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the database connection
$stmt->close();
$conn->close();





$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'bahaeddine.mlaouhi@ensi-uma.tn';
$mail->Password = 'alrntudahasfztbo';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('bahaeddine.mlaouhi@ensi-uma.tn');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $message;
$mail->send();














      


  }
   else{ include'error.php';

  }
}

?>