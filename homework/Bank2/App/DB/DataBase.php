<?php

namespace App\DB;

interface DataBase
{
    public function __construct();

    public function createUser(object $userData): int;

    public function createTransaction(object $transactionData): int;
}
