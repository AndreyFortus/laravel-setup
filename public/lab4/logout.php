<?php
session_start();

$_SESSION = array();

session_destroy();

header("Location: task3.php");
exit();
