<?php
include('./includes/db_connection.php');
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
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

        /* Container Styles */
        .container {
            max-width: 800px;
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

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4A90E2; /* Blue background for header */
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e1f5fe; /* Light blue on hover */
        }

        /* Link Styles */
        a {
            color: #4A90E2;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3; /* Darker blue on hover */
            text-decoration: underline;
        }

        /* Button Styles */
        .add-student {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #4A90E2;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .add-student:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            table {
                font-size: 14px; /* Smaller font size on mobile */
            }

            .add-student {
                width: 100%; /* Full width button on mobile */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Student List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td>
                            <a href="./edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                            <a href="./delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align: center;">No records found</td>
                </tr>
            <?php endif; ?>
        </table>
        <br>
        <a href="form.php" class="add-student">Add New Student</a>
    </div>
</body>
</html>