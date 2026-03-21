<?php
session_start();

if (isset($_POST['item_name'])) {
    $item = $_POST['item_name'];
    $_SESSION['cart'][] = $item;

    if (isset($_COOKIE['history'])) {
        $new_history = $_COOKIE['history'] . ", " . $item;
    } else {
        $new_history = $item;
    }

    setcookie("history", $new_history, time() + (86400 * 30), "/");
    header("Location: task4.php");
    exit();
}


if (isset($_POST['clear_cart'])) {
    session_destroy();
    header("Location: task4.php");
    exit();
}
?>
<html lang="uk">
<body>

<h2>Shop</h2>

<form method="POST">
    Item:
    <label>
        <input type="text" name="item_name" required>
    </label>
    <input type="submit" value="Add">
</form>

<hr>

<h3>Cart (session):</h3>
<?php
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        echo "- " . $product . "<br>";
    }
} else {
    echo "Cart is empty.<br>";
}
?>

<br>
<form method="POST">
    <input type="submit" name="clear_cart" value="Clear">
</form>

<hr>

<h3>History (cookie):</h3>
<?php
if (isset($_COOKIE['history'])) {
    echo $_COOKIE['history'];
} else {
    echo "History is empty.";
}
?>

</body>
</html>
