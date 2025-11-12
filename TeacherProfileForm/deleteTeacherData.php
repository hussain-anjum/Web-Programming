<?php
include 'conn.php';

$sql = "DELETE FROM teacherdata WHERE ID=$_GET[ID]";

if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

$newURL = "./showTeacherData.php";
header('Location: '.$newURL);
die();

mysqli_close($conn);
?>