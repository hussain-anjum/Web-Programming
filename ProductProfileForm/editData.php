<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["Product_id"])) {
  $product_id = $_POST["Product_id"];
  $product_name = $_POST["Product_Name"];
  $product_image = $_POST["Product_Image"];
  $category = $_POST["Category"];
  $price = $_POST["Price"];
  $description = $_POST["Description"];
  $quantity = $_POST["Quantity"];
  $manufacturer = $_POST["Manufacturer"];
  $release_date = $_POST["Release_Date"];

  $sql = "UPDATE productdata SET 
    Product_Name = '$product_name', 
    Product_Image = '$product_image', 
    Category = '$category', 
    Price = '$price', 
    Description = '$description', 
    Quantity = '$quantity', 
    Manufacturer = '$manufacturer', 
    Release_Date = '$release_date' 
  WHERE Product_id = '$product_id'";

  if (mysqli_query($conn, $sql)) {
    echo "<p>Record updated successfully</p>";
    echo "<a href='showData.php'>Back to Product List</a>";
  } else {
    echo "<p>Error updating record: " . mysqli_error($conn) . "</p>";
  }
} elseif (isset($_GET["Product_id"])) {
  $product_id = $_GET["Product_id"];
  $sql = "SELECT * FROM productdata WHERE Product_id = '$product_id'";
  $result = mysqli_query($conn, $sql);
  if ($row = mysqli_fetch_assoc($result)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
</head>
<body>
  <h2 align="center"><u>Edit Product Info</u></h2>
  <form action="editData.php" method="post">
    <input type="hidden" name="Product_id" value="<?php echo htmlspecialchars($row['Product_id']); ?>">
    <label>Product Name:</label><br>
    <input type="text" name="Product_Name" value="<?php echo htmlspecialchars($row['Product_Name']); ?>"><br><br>

    <label>Product Image:</label>
    <input type="file" name="Product_Image" value="<?php echo htmlspecialchars($row['Product_Image']); ?>"><br><br>

    <label>Category:</label><br>
    <select name="Category">
      <option value="Electronics" <?php if($row['Category']=="Electronics") echo "selected"; ?>>Electronics</option>
      <option value="Apparel" <?php if($row['Category']=="Apparel") echo "selected"; ?>>Apparel</option>
      <option value="Home" <?php if($row['Category']=="Home") echo "selected"; ?>>Home</option>
      <option value="Books" <?php if($row['Category']=="Books") echo "selected"; ?>>Books</option>
      <option value="Other" <?php if($row['Category']=="Other") echo "selected"; ?>>Other</option>
    </select><br><br>

    <label>Price:</label><br>
    <input type="number" name="Price" step="0.01" min="0" value="<?php echo htmlspecialchars($row['Price']); ?>"><br><br>

    <label>Description:</label><br>
    <textarea name="Description" rows="3" cols="30"><?php echo htmlspecialchars($row['Description']); ?></textarea><br><br>

    <label>Quantity:</label><br>
    <input type="number" name="Quantity" min="0" value="<?php echo htmlspecialchars($row['Quantity']); ?>"><br><br>

    <label>Manufacturer:</label><br>
    <input type="text" name="Manufacturer" value="<?php echo htmlspecialchars($row['Manufacturer']); ?>"><br><br>

    <label>Release Date:</label><br>
    <input type="date" name="Release_Date" value="<?php echo htmlspecialchars($row['Release_Date']); ?>"><br><br>

    <button type="submit">Update</button>
  </form>
</body>
</html>
<?php
  } else {
    echo "<p>Product not found.</p>";
  }
} else {
  echo "<p>No Product ID specified.</p>";
}
mysqli_close($conn);
?>