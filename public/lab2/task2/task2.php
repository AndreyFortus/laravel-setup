<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: task1.php");
    exit();
}

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($login == "admin" && $password == "admin123") {
        $_SESSION['user'] = $login;
    } else {
        $error_message = "Wrong login or password!";
    }
}
?>
<html lang="">
<body>
<?php
if (!isset($_SESSION['user'])) {
    if (isset($error_message)) {
        echo "<p style='color:red;'>" . $error_message . "</p>";
    }
    ?>

    <form method="POST">
        Login: <label>
            <input type="text" name="login">
        </label><br><br>
        Password: <label>
            <input type="password" name="password">
        </label><br><br>
        <input type="submit" value="Login">
    </form>

    <?php
} else {
    echo "<h2>Hello, " . $_SESSION['user'] . "!</h2>";
    ?>

    <form method="POST">
        <input type="submit" name="logout" value="Logout">
    </form>
    <?php
}
?>
</body>
</html>
