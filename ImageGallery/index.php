<?php include "connect.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Upload Image</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Title:<br>
        <input type="text" name="title" required><br><br>
        Select Image:<br>
        <input type="file" name="image" accept="image/*" required><br><br>
        <input type="submit" value="Upload">
    </form>
    <hr>
    <h1 align='center'>Gallery</h1>

    <div class="gallery-container clearfix">
    <?php
    $sql = "SELECT * FROM images ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='image-item'>";
        echo "<img src='uploads/" . $row['image_path'] . "' alt='" . htmlspecialchars($row['title']) . "'>";
        echo "<strong>" . htmlspecialchars($row['title']) . "</strong>";
        echo "</div>";
    }
    ?>
    </div>
</body>
</html>
