<?php
// Start session
session_start();

// Retrieve submitted details from the session
$name = $_SESSION['name'] ?? 'N/A';
$email = $_SESSION['email'] ?? 'N/A';
$phone = $_SESSION['phone'] ?? 'N/A';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Success</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Thank you for submitting the admission form!</h2>
        <p>Your details have been successfully submitted. Here are the details you provided:</p>
        <ul>
            <li><strong>Name:</strong> <?= htmlspecialchars($name) ?></li>
            <li><strong>Email:</strong> <?= htmlspecialchars($email) ?></li>
            <li><strong>Phone:</strong> <?= htmlspecialchars($phone) ?></li>
        </ul>
        <a href="form.php">Go back to the form</a>
    </div>
</body>
</html>

<?php
// Clear session after use
session_unset();
session_destroy();
?>