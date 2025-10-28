<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "formdb"; 

$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize POST data
    $pName = mysqli_real_escape_string($conn, $_POST['p_name']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $modelNumber = mysqli_real_escape_string($conn, $_POST['model_number']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);
    $warranty = intval($_POST['warranty']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // SQL insert query
    $sql = "INSERT INTO electronics 
            (product_name, brand, model_number, category, price, quantity, warranty_months, description) 
            VALUES ('$pName', '$brand', '$modelNumber', '$category', $price, $quantity, $warranty, '$description')";

    if (mysqli_query($conn, $sql)) {
        echo "Product added successfully!<br>";
        echo "<br>Product Info are:<br>";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);   
?>
