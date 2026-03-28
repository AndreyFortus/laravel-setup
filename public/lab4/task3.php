<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = mysqli_connect("mysql", "started-user", "started-password", "started");
    if (!$conn) {
        die("Помилка підключення: " . mysqli_connect_error());
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            if (md5($password) === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                echo "Успішний вхід " . $user['username'] . "!";
                header("Location: welcome.php");
                exit();
            } else {
                echo "Помилка: Неправильний пароль";
            }
        } else {
            echo "Помилка: Користувача з таким логіном не знайдено";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Помилка: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Авторизація</title>
</head>
<body>
<form method="POST" action="">
    <p>
        <label for="username">Ім'я:</label><br>
        <input type="text" name="username" id="username" required>
    </p>
    <p>
        <label for="password">Пароль:</label><br>
        <input type="password" name="password" id="password" required>
    </p>
    <p>
        <input type="submit" value="Увійти">
    </p>
</form>
</body>
</html>
