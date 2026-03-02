<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Please enter both username and password.";
    } else {
        if ($username == "admin" && $password == "1234") {
            $_SESSION['user'] = $username;

            session_regenerate_id();

            header("Location: nav.php");
            exit;
        } else {
            echo "Invalid credentials, please try again.";
        }
    }
}
?>

<form method="POST">
    <h2>Login</h2>
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" name="login" value="Login">
</form>