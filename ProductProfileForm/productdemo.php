<?php
$servername = "localhost:3307";
$username = "root";
$password = "root";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$Product_Name = $_POST['Product_Name'];
$Product_ID = $_POST['Product_id'];
$Product_Image = $_POST['Product_Image'];
$Category = $_POST['Category'];
$Price = $_POST['Price'];
$Description = $_POST['Description'];
$Quantity = $_POST['Quantity'];
$Manufacturer = $_POST['Manufacturer'];
$Release_Date = $_POST['Release_Date'];

$sql = "INSERT INTO product (Product_Name, Product_ID, Product_Image, Category, Price, Description, Quantity, Manufacturer, Release_Date) 
    VALUES ('$Product_Name', $Product_ID, '$Product_Image', '$Category', '$Price', '$Description', $Quantity, '$Manufacturer', '$Release_Date')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

echo "<br><br>Product data are:<br>";
echo "<pre>";
print_r($_POST);
echo "</pre";
?>