<?php
session_start();
require_once __DIR__ . '/../config/database.php';

$message = "";

if (isset($_POST['submit'])) {

    $title = trim($_POST['title']);
    $category = trim($_POST['category']);
    $description = trim($_POST['description']);

    if ($title != "" && $category != "" && $description != "") {

        $sql = "INSERT INTO complaints (title, category, description, status)
                VALUES (?, ?, ?, 'Pending')";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $title, $category, $description);

            if (mysqli_stmt_execute($stmt)) {
                $message = "Complaint submitted successfully!";
            } else {
                $message = "Error submitting complaint.";
            }

            mysqli_stmt_close($stmt);
        } else {
            $message = "Database error.";
        }

    } else {
        $message = "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Complaint</title>
</head>
<body>

<h2>College Complaint Management System</h2>
<h3>Submit Complaint</h3>

<p><?php echo htmlspecialchars($message); ?></p>

<form method="POST">

    <label>Title:</label><br>
    <input type="text" name="title" required>
    <br><br>

    <label>Category:</label><br>
    <select name="category" required>
        <option value="">Select Category</option>
        <option value="Classroom">Classroom</option>
        <option value="Hostel">Hostel</option>
        <option value="Library">Library</option>
        <option value="Canteen">Canteen</option>
        <option value="Other">Other</option>
    </select>
    <br><br>

    <label>Description:</label><br>
    <textarea name="description" required></textarea>
    <br><br>

    <button type="submit" name="submit">Submit Complaint</button>

</form>

</body>
</html>