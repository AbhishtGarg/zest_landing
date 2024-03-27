<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "testing";

// Create connection
$connection = mysqli_connect($host, $user, $password, $dbname);
$leadId = uniqid();

// Sample data
$businessName = $_POST['businessName'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$city = $_POST['city'];

$insert_data= "INSERT INTO `restaurant_details`( `leadId`, `businessName`, `phoneNumber`, `email`, `city`)
                VALUES ('$leadId', '$businessName', '$phoneNumber', '$email', '$city')";

                mysqli_query($connection, $insert_data);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
echo "Connected successfully";


// Send email
       $to = "zestpos1@gmail.com"; // Replace with the actual recipient email address
       $subject = "New Lead: $businessName";
       $message = "Business Name: $businessName\nPhone Number: $phoneNumber\nEmail: $email\nCity: $city";

         mail($to, $subject, $message, $headers);

// Printing data
echo "Business Name: " . $businessName . "<br>";
echo "Phone Number: " . $phoneNumber . "<br>";
echo "Email: " . $email   . "<br>";
echo "City: " . $city
?>
