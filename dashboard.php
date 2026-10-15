<?php
session_start();

require_once __DIR__ . '/../config/database.php';

$sql = "SELECT * FROM complaints";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
</head>
<body>

<h1>College Complaint Management System</h1>

<h2>Dashboard</h2>

<p>Total Complaints: <?php echo mysqli_num_rows($result); ?></p>

<a href="../complaint.php">Submit Complaint</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['title']); ?></td>
        <td><?php echo htmlspecialchars($row['category']); ?></td>
        <td><?php echo htmlspecialchars($row['status']); ?></td>
    </tr>
    <?php } ?>

</table>

</body>
</html>