<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: task3.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Захищена сторінка</title>
</head>
<body>
<h1>Авторизація успішна, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>

<p><a href="logout.php">Вийти з акаунта</a></p>
</body>
</html>
