<?php
// Start session
session_start();

// Include the database connection file
include('./includes/db_connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data and sanitize it
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $father_name = trim($_POST['father_name']);
    $mother_name = trim($_POST['mother_name']);
    $dmc_10th = trim($_POST['dmc_10th']);
    $dmc_12th = trim($_POST['dmc_12th']);
    $branch = trim($_POST['branch']);
    $semester = trim($_POST['semester']);
    $remarks = trim($_POST['remarks']);

    // Store data in session
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;

    // Set a cookie for the name (expires in 30 days)
    setcookie("user_name", $name, time() + (30 * 24 * 60 * 60), "/"); // 30 days

    // Prepare the SQL query
    $stmt = $conn->prepare("INSERT INTO students (name, email, phone, father_name, mother_name, dmc_10th, dmc_12th, branch, semester, remarks) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $name, $email, $phone, $father_name, $mother_name, $dmc_10th, $dmc_12th, $branch, $semester, $remarks);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to success page
        header("Location: get.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }

        /* Form Container */
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #4A90E2; /* Blue color for the heading */
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Include padding and border in element's total width and height */
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        select:focus,
        textarea:focus {
            border-color: #4A90E2; /* Change border color on focus */
            outline: none; /* Remove default outline */
        }

        input[type="submit"] {
            background-color: #4A90E2; /* Blue background for the button */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%; /* Full width button */
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            form {
                padding: 15px;
            }

            h2 {
                font-size: 24px;
            }
        }
    </style>
    <script>
        function validateForm() {
            const requiredFields = ['name', 'email', 'phone', 'father_name', 'mother_name', 'dmc_10th', 'dmc_12th', 'branch', 'semester'];
            for (let field of requiredFields) {
                const value = document.getElementById(field).value.trim();
                if (!value) {
                    alert(field.replace('_', ' ') + " is required.");
                    return false;
                }
            }
            return true;
        }
    </script>
</head>
<body>
    <form action="form.php" method="POST" onsubmit="return validateForm()">
        <h2>Admission Form</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="father_name">Father Name:</label>
        <input type="text" id="father_name" name="father_name" required>

        <label for="mother_name">Mother Name:</label>
        <input type="text" id="mother_name" name="mother_name" required>

        <label for="dmc_10th">DMC for 10th:</label>
        <input type="text" id="dmc_10th" name="dmc_10th" required>

        <label for="dmc_12th">DMC for 12th:</label>
        <input type="text" id="dmc_12th" name="dmc_12th" required>

        <label for="branch">Branch:</label>
        <select id="branch" name="branch" required>
            <option value="">Select a Branch</option>
            <option value="Computer Science">Computer Science</option>
            <option value="Civil">Civil</option>
            <option value="I&C">I&C</option>
            <option value="Mechanical">Mechanical</option>
        </select>

        <label for="semester">Semester:</label>
        <select id="semester" name="semester" required>
            <option value="">Select Semester</option>
            <option value="1st">1st</option>
            <option value="3rd for lateral entry">3rd for lateral entry</option>
        </select>

        <label for="remarks">Remarks:</label>
        <textarea id="remarks" name="remarks" rows="4"></textarea>

        <input type="submit" value="Submit">
    </form>
</body>
</html>