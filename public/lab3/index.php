<?php
require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

echo "<h2 style='text-align:center;'>Client code</h2>";

echo "<h3>1. Bank account</h3>";
$myAccount = new BankAccount("USD", 100);
echo "Balance: " . $myAccount->getBalance() . "<br>";

try {
    echo "Deposit 50<br>";
    $myAccount->deposit(50);
    echo "Balance: " . $myAccount->getBalance() . "<br>";

    echo "Withdraw 30<br>";
    $myAccount->withdraw(30);
    echo "Balance: " . $myAccount->getBalance() . "<br>";

    echo "Withdraw 500<br>";
    $myAccount->withdraw(500);

} catch (Exception $e) {
    echo "<b style='color:red;'>" . $e->getMessage() . "</b><br>";
}

echo "<hr>";

echo "<h3>2. Savings account</h3>";
$mySavings = new SavingsAccount("EUR", 2700);
echo "Balance: " . $mySavings->getBalance() . "<br>";

try {
    echo "Apply interest<br>";
    $mySavings->applyInterest();
    echo "Balance: " . $mySavings->getBalance() . "<br>";

    echo "Deposit -10<br>";
    $mySavings->deposit(-10);

} catch (Exception $e) {
    echo "<b style='color:red;'>" . $e->getMessage() . "</b><br>";
}
