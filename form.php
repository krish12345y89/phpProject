<?php
// Start session
session_start();

// Include the database connection file
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $dmc_10th = $_POST['dmc_10th'];
    $dmc_12th = $_POST['dmc_12th'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];
    $remarks = $_POST['remarks'];

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
        header("Location: success.php");
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
    <script>
        function validateForm() {
            const requiredFields = ['name', 'email', 'phone', 'father_name', 'mother_name', 'dmc_10th', 'dmc_12th', 'branch', 'semester'];
            for (let field of requiredFields) {
                const value = document.getElementById(field).value.trim();
                if (!value) {
                    alert(field.replace('_', ' ') + " is required.");
                    return false; // Prevent form submission
                }
            }
            return true; // Allow form submission
        }
    </script>
</head>
<body>
    <form action="form.php" method="POST" onsubmit="return validateForm()">
        <h2>Admission Form</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required><br><br>

        <label for="father_name">Father Name:</label>
        <input type="text" id="father_name" name="father_name" required><br><br>

        <label for="mother_name">Mother Name:</label>
        <input type="text" id="mother_name" name="mother_name" required><br><br>

        <label for="dmc_10th">DMC for 10th:</label>
        <input type="text" id="dmc_10th" name="dmc_10th" required><br><br>

        <label for="dmc_12th">DMC for 12th:</label>
        <input type="text" id="dmc_12th" name="dmc_12th" required><br><br>

        <label for="branch">Branch:</label>
        <select id="branch" name="branch" required>
            <option value="">Select a Branch</option>
            <option value="Computer Science ">Computer Science</option>
            <option value="Civil">Civil</option>
            <option value="I&C">I&C</option>
            <option value="Mechanical">Mechanical</option>
        </select><br><br>

        <label for="semester">Semester:</label>
        <select id="semester" name="semester" required>
            <option value="">Select Semester</option>
            <option value="1st">1st</option>
            <option value="3rd for lateral entry">3rd for lateral entry</option>
        </select><br><br>

        <label for="remarks">Remarks:</label>
        <textarea id="remarks" name="remarks"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>