<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $image = $_FILES["image"]["name"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $folder = "uploads/" . basename($image);

    if (move_uploaded_file($tmp_name, $folder)) {
        $sql = "INSERT INTO images (title, image_path) VALUES ('$title', '$image')";
        mysqli_query($conn, $sql);
        header("Location: index.php");
    } else {
        echo "Failed to upload image.";
    }
}
?>
