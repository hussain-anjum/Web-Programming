<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
?>
    <h2><u>Student Details</u></h2>
<?php
    echo "Student's Name: " . htmlspecialchars($_POST['sName'] ?? '') . "<br>";
    echo "Father's Name: " . htmlspecialchars($_POST['fName'] ?? '') . "<br>";
    echo "Mother's Name: " . htmlspecialchars($_POST['mName'] ?? '') . "<br>";
    echo "Date of Birth: " . htmlspecialchars($_POST['dob'] ?? '') . "<br>";
    echo "Sex: " . htmlspecialchars($_POST['sex'] ?? '') . "<br>";
    echo "Phone Number: " . htmlspecialchars($_POST['phone'] ?? '') . "<br>";
    echo "Email: " . htmlspecialchars($_POST['email'] ?? '') . "<br>";
    echo "Present Address: " . htmlspecialchars($_POST['pAddress'] ?? '') . "<br>";
    echo "Permanent Address: " . htmlspecialchars($_POST['permAddress'] ?? '') . "<br>";
} ?>
