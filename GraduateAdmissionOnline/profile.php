<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $fullname = htmlspecialchars(trim($_POST["fullname"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $dob = htmlspecialchars(trim($_POST["dob"]));
    $gender = htmlspecialchars(trim($_POST["gender"]));
    $program = htmlspecialchars(trim($_POST["program"]));
    $statement = htmlspecialchars(trim($_POST["statement"]));
    // Validate CGPA
    $cgpa = floatval($_POST["cgpa"]);
    if ($cgpa < 0 || $cgpa > 4.0) {
        echo "<p style='color:red;'>Invalid CGPA. Must be between 0.00 and 4.00.</p>";
        echo "<a href='apply.html'>Go Back</a>";
        exit();
    }
} else {
    header("Location: apply.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Application Profile</title>
<style>
      body {
        text-align: center;
      }
    </style>
</head>
<body>
    <h1>Application Profile</h1>

    <p><strong>Full Name:</strong> <?php echo $fullname; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Phone Number:</strong> <?php echo $phone; ?></p>
    <p><strong>Date of Birth:</strong> <?php echo $dob; ?></p>
    <p><strong>Gender:</strong> <?php echo $gender; ?></p>
    <p><strong>Program Applying For:</strong> <?php echo $program; ?></p>
    <p><strong>Undergraduate CGPA:</strong> <?php echo
    number_format($cgpa, 2); ?></p>
    <p><strong>Statement of Purpose:</strong></p>
    <p><?php echo nl2br($statement); ?></p>
    <br />

    <a href="index.html">Go Back to Application Form</a>
</body>
</html>