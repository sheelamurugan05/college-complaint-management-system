<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "complaint_system");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email == "" || $password == "") {
        $error = "Please enter email and password.";
    } else {
        $email = mysqli_real_escape_string($conn, $email);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $res = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($res);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: public/user/dashboard.php");
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    }
}
?>
<html>
<body>
<h2>Login</h2>
<p style="color:red;"><?php echo $error; ?></p>
<form method="POST">
Email: <input type="email" name="email" required><br><br>
Password: <input type="password" name="password" required><br><br>
<button type="submit">Login</button>
</form>
</body>
</html>