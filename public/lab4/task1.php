<?php

$conn = mysqli_connect("mysql", "started-user", "started-password", "started");
if (!$conn) {
    die("Помилка підключення: " . mysqli_connect_error());
}

$sql_create_table = "
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL
    )
";

if (mysqli_query($conn, $sql_create_table)) {
    echo "Таблицю 'users' успішно створено!<br>";
} else {
    echo "Помилка створення таблиці: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);
