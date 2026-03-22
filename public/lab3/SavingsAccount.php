<?php
require_once 'BankAccount.php';

class SavingsAccount extends BankAccount
{
    public static float $interestRate = 0.10;

    public function applyInterest(): void
    {
        $interestAmount = $this->balance * self::$interestRate;
        $this->deposit($interestAmount);
    }
}
