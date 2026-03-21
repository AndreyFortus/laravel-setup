<?php
$cookie_name = "user_name";

if (isset($_POST['my_name'])) {
    $cookie_value = $_POST['my_name'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/");
}

if (isset($_POST['delete'])) {
    setcookie($cookie_name, "", time() - 3600, "/");
}
?>

<html lang="">
<body>
<?php
if (!isset($_COOKIE[$cookie_name])) {
    echo "Enter your name:<br>";
    ?>
    <form method="POST">
        <label>
            <input type="text" name="my_name">
        </label>
        <input type="submit" value="Save">
    </form>
    <?php
} else {
    echo "Hello, " . $_COOKIE[$cookie_name] . "!<br><br>";
    ?>
    <form method="POST">
        <input type="submit" name="delete" value="Delete cookie">
    </form>
    <?php
}
?>
</body>
</html>
