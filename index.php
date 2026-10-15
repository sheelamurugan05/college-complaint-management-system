<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>College Complaint Management System</title>

    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            margin: 0;
        }

        .header {
            background: #142850;
            color: white;
            padding: 25px;
            text-align: center;
        }

        .main {
            max-width: 700px;
            margin: 60px auto;
            padding: 30px;
            background: white;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 2px 10px #cccccc;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            margin: 10px;
            background: #176bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background: #142850;
        }

        .footer {
            text-align: center;
            padding: 15px;
            color: #555;
        }
    </style>
</head>

<body>

<div class="header">
    <h1>College Complaint Management System</h1>
    <p>Student Complaint Portal</p>
</div>

<div class="main">

    <h2>Welcome!</h2>

    <p>
        Submit your college complaints easily and track their status.
    </p>

    <?php if (isset($_SESSION['user_id'])) { ?>

        <a href="dashboard.php" class="btn">My Dashboard</a>

        <a href="complaint.php" class="btn">Submit Complaint</a>

        <a href="logout.php" class="btn">Logout</a>

    <?php } else { ?>

        <a href="login.php" class="btn">Login</a>

        <a href="register.php" class="btn">Register</a>

    <?php } ?>

</div>

<div class="footer">
    <p>
        &copy; <?php echo date("Y"); ?>
        College Complaint Management System
    </p>
</div>

</body>
</html>