<?php
session_start();
include('./includes/db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    $update_sql = "UPDATE students SET name=?, email=?, phone=?, father_name=?, mother_name=?, dmc_10th=?, dmc_12th=?, branch=?, semester=?, remarks=? WHERE id=?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssssssssssi", $name, $email, $phone, $father_name, $mother_name, $dmc_10th, $dmc_12th, $branch, $semester, $remarks, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #4CAF50; /* Green color for the heading */
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
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
            border-radius: 4px;
            box-sizing: border-box; /* Include padding and border in element's total width and height */
        }

        input[type="submit"] {
            background-color: #007BFF; /* Blue background for the button */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <h2>Edit Student</h2>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" required>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($student['phone']); ?>" required>

        <label for="father_name">Father Name:</label>
        <input type="text" id="father_name" name="father_name" value="<?php echo htmlspecialchars($student['father_name']); ?>" required>

        <label for="mother_name">Mother Name:</label>
        <input type="text" id="mother_name" name="mother_name" value="<?php echo htmlspecialchars($student['mother_name']); ?>" required>

        <label for="dmc_10th">DMC for 10th:</label>
        <input type="text" id="dmc_10th" name="dmc_10th" value="<?php echo htmlspecialchars($student['dmc_10th']); ?>" required>

        <label for="dmc_12th">DMC for 12th:</label>
        <input type="text" id="dmc_12th" name="dmc_12th" value="<?php echo htmlspecialchars($student['dmc_12th']); ?>" required>

        <label for="branch">Branch:</label>
        <select id="branch" name="branch" required>
            <option value="Computer Science" <?php echo ($student['branch'] == 'Computer Science') ? 'selected' : ''; ?>>Computer Science</option>
            <option value="Civil" <?php echo ($student['branch'] == 'Civil') ? 'selected' : ''; ?>>Civil</option>
            <option value="I&C" <?php echo ($student['branch'] == 'I&C') ? 'selected' : ''; ?>>I&C</option>
            <option value="Mechanical" <?php echo ($student['branch'] == 'Mechanical') ? 'selected' : ''; ?>>Mechanical</option>
        </select>

        <label for="semester">Semester:</label>
        <select id="semester" name="semester" required>
            <option value="1st" <?php echo ($student['semester'] == '1st') ? 'selected' : ''; ?>>1st</option>
            <option value="3rd for lateral entry" <?php echo ($student['semester'] == '3rd for lateral entry') ? 'selected' : ''; ?>>3rd for lateral entry</option>
        </select>

        <label for="remarks">Remarks:</label>
        <textarea id="remarks" name="remarks"><?php echo htmlspecialchars($student['remarks']); ?></textarea>

        <input type="submit" value="Update">
    </form>
</body>
</html>