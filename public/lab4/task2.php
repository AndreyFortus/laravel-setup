<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = mysqli_connect("mysql", "started-user", "started-password", "started");
    if (!$conn) {
        die("Помилка підключення: " . mysqli_connect_error());
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = md5($password);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    try {
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);
            mysqli_stmt_execute($stmt);
            echo "Користувача $username додано";
            mysqli_stmt_close($stmt);
        } else {
            echo "Помилка підготовки запиту";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Помилка: " . $e->getMessage();
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
</head>
<body>

<form method="POST" action="">
    <p>
        <label for="username">Ім'я:</label><br>
        <input type="text" name="username" id="username" required>
    </p>

    <p>
        <label for="email">Електронна пошта:</label><br>
        <input type="email" name="email" id="email" required>
    </p>

    <p>
        <label for="password">Пароль:</label><br>
        <input type="password" name="password" id="password" required>
    </p>

    <p>
        <input type="submit" value="Зареєструватися">
    </p>
</form>
</body>
</html>
