<?
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE productdata SET 
    Product_Name = '$_POST[Product_Name]', 
    Product_Image = '$_POST[Product_Image]', 
    Category = '$_POST[Category]', 
    Price = '$_POST[Price]', 
    Description = '$_POST[Description]', 
    Quantity = '$_POST[Quantity]', 
    Manufacturer = '$_POST[Manufacturer]', 
    Release_Date = '$_POST[Release_Date]' 
WHERE Product_id = $_POST[Product_id]";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>