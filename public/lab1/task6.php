<?php
$student = [
    "name" => "John",
    "surname" => "Smith",
    "age" => 21,
    "specialty" => "F3"
];

echo "name: " . $student["name"] . "<br>";
echo "surname: " . $student["surname"] . "<br>";
echo "age: " . $student["age"] . "<br>";
echo "specialty: " . $student["specialty"] . "<br>";

$student["average_grade"] = 97.5;

print_r($student);
