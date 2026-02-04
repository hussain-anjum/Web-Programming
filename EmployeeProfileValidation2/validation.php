<?php
$name = trim($_POST['full_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$marital = trim($_POST['marital_status'] ?? '');
$position = trim($_POST['position'] ?? '');
$company = trim($_POST['company'] ?? '');
$experience = trim($_POST['experience'] ?? '0');
$skills = $_POST['skills'] ?? [];
if (is_array($skills)) {
    foreach ($skills as $key => $value) {
        $skills[$key] = trim($value);
    }
} else {
    $skills = [];
}
$errors = [];
if (empty($name)) {
    $errors[] = "Full Name is required."; 
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "A valid Email is required."; 
}
if (empty($phone) || !preg_match('/^\+?[0-9]{7,15}$/', $phone)) {
    $errors[] = "A valid Phone number is required."; 
}
if (empty($marital)) {
    $errors[] = "Marital Status is required."; 
}
if (empty($position)) {
    $errors[] = "Job Position is required."; 
}
if (empty($company)) {
    $errors[] = "Company Name is required."; 
}
if (!is_numeric($experience) || $experience < 0) {
    $errors[] = "Experience must be a non-negative number."; 
}
if (count($errors) > 0) {
    echo "<h2>Validation Errors:</h2><ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul><a href='./index.html'>Go Back to Form</a>";
    exit;
}
echo "<h2>Employee Profile Submitted</h2>";
echo "Full Name: $name<br>";
echo "Email: $email<br>";
echo "Phone: $phone<br>";
echo "Marital Status: $marital<br>";
echo "Job Position: $position<br>";
echo "Company Name: $company<br>";
echo "Experience: $experience years<br>";
echo "Skills: " . (count($skills) > 0 ? implode(", ", $skills) : "None") . "<br>";
echo "<a href='./index.html'>Go Back to Form</a>";
?>