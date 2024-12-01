<?php
// Start session
session_start();

// Retrieve submitted details from the session
$name = $_SESSION['name'] ?? 'N/A';
$email = $_SESSION['email'] ?? 'N/A';
$phone = $_SESSION['phone'] ?? 'N/A';

// Set a cookie for the name (expires in 30 days)
if (!empty($name)) {
    setcookie("user_name", $name, time() + (30 * 24 * 60 * 60), "/"); // 30 days
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Success</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #4A90E2; /* Blue color for the heading */
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
            font-size: 16px;
        }

        ul {
            list-style-type: none; /* Remove bullet points */
            padding: 0;
            margin: 0;
        }

        li {
            margin: 10px 0;
            font-size: 18px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        strong {
            color: #333; /* Darker color for labels */
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4A90E2; /* Blue background for the link */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            h2 {
                font-size: 24px;
            }

            li {
                font-size: 16px;
            }

            a {
                width: 100%; /* Full width button on mobile */
                text-align: center;
            }
        }
    </style>
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
