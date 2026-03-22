<?php

interface AccountInterface
{
    public function deposit($amount);

    public function withdraw($amount);

    public function getBalance();
}
