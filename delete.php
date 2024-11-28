<?php
include('./includes/db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM students WHERE id=?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: get.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>