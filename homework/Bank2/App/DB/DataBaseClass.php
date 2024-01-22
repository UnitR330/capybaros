<?php

namespace App\DB;

class DataBaseClass implements DataBase
{
    private $usersFile;
    private $transactionsFile;

    public function __construct()
    {
        $this->usersFile = __DIR__ . '/../../data/users.json';
        $this->transactionsFile = __DIR__ . '/../../data/transactions.json';

        $usersDirectory = dirname($this->usersFile);
        $transactionsDirectory = dirname($this->transactionsFile);

        if (!is_dir($usersDirectory)) {
            mkdir($usersDirectory, 0777, true);
        }

        if (!is_dir($transactionsDirectory)) {
            mkdir($transactionsDirectory, 0777, true);
        }

        if (!file_exists($this->usersFile)) {
            file_put_contents($this->usersFile, '[]');
        }

        if (!file_exists($this->transactionsFile)) {
            file_put_contents($this->transactionsFile, '[]');
        }
    }

    public function createUser(object $userData): int
{
    $users = $this->loadData($this->usersFile);
    $newUserId = $this->generateUserId($users);
    $userData->userId = $newUserId;
    $userData->IBAN = $this->generateIBAN();  
    $users[] = (array)$userData;  
    $this->saveData($users, $this->usersFile);
    return $newUserId;
} 
private function generateIBAN(): string
{
    $iban = 'LT';  
    for ($i = 0; $i < 20; $i++) {  
        $iban .= mt_rand(0, 9);
    }
    return $iban;
}
 
 
 
public function createTransaction(object $transactionData): int
{
    $transactions = $this->loadData($this->transactionsFile);
    $newTransactionId = $this->generateTransactionId($transactions);
    $transactionData->id = $newTransactionId;
    $transactions[] = (array)$transactionData;  
    $this->saveData($transactions, $this->transactionsFile);
    return $newTransactionId;
}   

    public function authenticate(string $username, string $password): bool
{
    $users = $this->loadData($this->usersFile);

    foreach ($users as $user) {
        if ($user['username'] === $username && password_verify($password, $user['password'])) {
            return true;  
        }
    }

    return false;  
}

public function getUserIdByUsername(string $username): ?int
{
    $users = $this->loadData($this->usersFile);

    foreach ($users as $user) {
        if ($user['username'] === $username) {
            return $user['userId'];  
        }
    }

    return null;  
}

public function show(int $userId): ?object
{
    $users = $this->loadData($this->usersFile);

    foreach ($users as $user) {
        if ($user['userId'] === $userId) {
            return (object)$user; 
        }
    }

    return null; 
}

    private function loadData(string $file): array
    {
        $jsonData = file_get_contents($file);
        return json_decode($jsonData, true) ?: [];
    }

    private function saveData(array $data, string $file): void
    {
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($file, $jsonData);
    }

    private function generateUserId(array $users): int
    {
        return count($users) + 1;
    }
    
    public function calculateBalance(int $userId): float
    {
    $transactions = $this->getTransactionsByUserId($userId);
    $balance = 0;

    foreach ($transactions as $transaction) {
        $balance += $transaction['amount'];
    }

    return $balance;
}

public function getTransactionsByUserId(int $userId): array
{
    $transactions = $this->loadData($this->transactionsFile);
    $userTransactions = [];

    foreach ($transactions as $transaction) {
        if (isset($transaction['userId']) && $transaction['userId'] === $userId) {
            $userTransactions[] = $transaction;
        }
    }

    return $userTransactions;
}

    private function generateTransactionId(array $transactions): int
    {
        return count($transactions) + 1;
    }
public function deleteTransaction(int $userId, int $transactionId): void
{
    $transactions = $this->loadData($this->transactionsFile);

    $indexToDelete = array_search($transactionId, array_column($transactions, 'id'));

    if ($indexToDelete !== false) {
        
        unset($transactions[$indexToDelete]);
        $transactions = array_values($transactions);
        $this->saveData($transactions, $this->transactionsFile);
    }
}

}
