<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "complaint_system");
if (!$conn) {
    die("DB Connection Failed: " . mysqli_connect_error());
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if ($name == "" || $email == "" || $password == "") {
        $message = "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Enter a valid email address.";
    } elseif (strlen($password) < 6) {
        $message = "Password must contain at least 6 characters.";
    } else {
        
        $email_check = mysqli_real_escape_string($conn, $email);
        $check_q = mysqli_query($conn, "SELECT id FROM users WHERE email = '$email_check'");

        if (mysqli_num_rows($check_q) > 0) {
            $message = "Email already registered.";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $name_safe = mysqli_real_escape_string($conn, $name);

            $sql = "INSERT INTO users (name, email, password) VALUES ('$name_safe', '$email_check', '$hashed')";

            if (mysqli_query($conn, $sql)) {
                header("Location: login.php");
                exit();
            } else {
                $message = "Registration failed.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Student Registration</title></head>
<body>
<div class="container">
    <h1>Student Registration</h1>
    <p style="color:red;"><?php echo $message; ?></p>
    <form method="POST">
        <label>Full Name</label><br>
        <input type="text" name="name" required><br><br>
        <label>Email Address</label><br>
        <input type="email" name="email" required><br><br>
        <label>Password</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Register</button>
    </form>
    <p><a href="login.php">Login Here</a></p>
</div>
</body>
</html>