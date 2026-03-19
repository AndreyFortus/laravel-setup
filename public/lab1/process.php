<?php
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];

if (empty($firstName) || empty($lastName)) {
    echo "Empty fields!";
} elseif (!is_string($firstName) || !is_string($lastName)) {
    echo "Wrong format!";
} else {
    echo "<h2>Hello, $firstName $lastName!</h2>";
}
