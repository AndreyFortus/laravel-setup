<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: index.php");
    exit();
}
?>

<html lang="">
<body>
<h2>info:</h2>

<ul>
    <li>
        <b>IP:</b>
        <?php echo $_SERVER['REMOTE_ADDR']; ?>
    </li>
    <li>
        <b>Browser:</b>
        <?php echo $_SERVER['HTTP_USER_AGENT']; ?>
    </li>
    <li>
        <b>Script:</b>
        <?php echo $_SERVER['PHP_SELF']; ?>
    </li>
    <li>
        <b>Method:</b>
        <?php echo $_SERVER['REQUEST_METHOD']; ?>
    </li>
    <li>
        <b>Path to file:</b>
        <?php echo $_SERVER['SCRIPT_FILENAME']; ?>
    </li>
</ul>

</body>
</html>
