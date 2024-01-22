<?php

namespace App\DB;

interface DataBase
{
    function create(object $userData): int;
    function update(int $userId, object $userData): bool;
    function delete(int $userId): bool;
    function show(int $userId): object;
    function showAll(): array;
    function authenticate(string $username, string $password): bool;

    // New methods for transactions
    function addTransaction(int $userId, string $transactionType, float $amount, string $description): void;
    function showAllTransactions(): array;
}
