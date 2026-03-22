<?php
require_once 'AccountInterface.php';

class BankAccount implements AccountInterface
{
    const MIN_BALANCE = 0;

    protected mixed $balance;
    protected mixed $currency;

    public function __construct($currency = "USD", $initialBalance = 0)
    {
        $this->currency = $currency;
        $this->balance = $initialBalance;
    }

    public function deposit($amount): void
    {
        if ($amount <= 0) {
            throw new Exception("Error: amount must be greater than 0");
        }

        $this->balance += $amount;
    }

    public function withdraw($amount): void
    {
        if ($amount <= 0) {
            throw new Exception("Error: amount must be greater than 0");
        }

        if (($this->balance - $amount) < self::MIN_BALANCE) {
            throw new Exception("Error: Insufficient balance.");
        }

        $this->balance -= $amount;
    }

    public function getBalance(): string
    {
        return $this->balance . " " . $this->currency;
    }
}
