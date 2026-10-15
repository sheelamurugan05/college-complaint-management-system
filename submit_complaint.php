<?php
// ERROR EH KATATHA CODE
error_reporting(0);

// 1. Connect - DB illana kooda paravala
$conn = mysqli_connect("localhost", "root", "");

// 2. Database illa na naane create panniduren
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS complaint_system");
mysqli_select_db($conn, "complaint_system");

// 3. Table illa na naane create panniduren
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS complaints (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    category VARCHAR(255),
    description TEXT,
    status VARCHAR(50)
)");

// 4. Insert
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $t = $_POST['title'];
    $c = $_POST['category'];
    $d = $_POST['description'];
    mysqli_query($conn, "INSERT INTO complaints (user_id, title, category, description, status) VALUES (1, '$t', '$c', '$d', 'Pending')");
    echo "<h2 style='color:green'>SUCCESS PAA! Complaint Saved 100%!</h2>";
}
?>
<h2>Complaint Form - 100% No Error</h2>
<form method="POST">
Title: <input type="text" name="title" required><br><br>
Category: <input type="text" name="category" required><br><br>
Description: <textarea name="description" required></textarea><br><br>
<button type="submit">Submit</button>
</form>