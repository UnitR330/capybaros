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

    public function create(object $userData): int
    {
        $users = $this->loadData($this->usersFile);
        $newUserId = $this->generateUserId($users);
        $userData->id = $newUserId;
        $users[] = (array)$userData;

        $this->saveData($users, $this->usersFile);

        return $newUserId;
    }

    public function authenticate(string $username, string $password): bool
    {
        $users = $this->loadData($this->usersFile);

        foreach ($users as $user) {
            if ($user['username'] === $username && password_verify($password, $user['password_hash'])) {
                return true;
            }
        }

        return false;
    }

    public function update(int $userId, object $userData): bool
    {
        $users = $this->loadData($this->usersFile);
        $userIndex = $this->findUserIndexById($userId, $users);

        if ($userIndex !== false) {
            $users[$userIndex]['balance'] = $userData->balance;
            $this->saveData($users, $this->usersFile);

            return true;
        }

        return false;
    }

    public function delete(int $userId): bool
    {
        $users = $this->loadData($this->usersFile);
        $userIndex = $this->findUserIndexById($userId, $users);

        if ($userIndex !== false) {
            unset($users[$userIndex]);
            $this->saveData(array_values($users), $this->usersFile);

            return true;
        }

        return false;
    }

    public function show(int $userId): object
    {
        $users = $this->loadData($this->usersFile);
        $userIndex = $this->findUserIndexById($userId, $users);

        if ($userIndex !== false) {
            $user = (object)$users[$userIndex];

            if (!property_exists($user, 'balance')) {
                $user->balance = 0;
            }

            return $user;
        }

        return (object)[];
    }
    public function showAll(): array
    {
        $accounts = $this->loadData();
    
        // Implement the logic to return all users
        return $accounts;
    }
    public function showAllUsers(): array
    {
        return $this->loadData($this->usersFile);
    }

    private function loadData(): array
    {
        $jsonData = file_get_contents($this->usersFile);
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
    public function getUserIdByUsername(string $username): ?int
    {
        $accounts = $this->loadData();
    
        foreach ($accounts as $user) {
            if ($user['username'] === $username) {
                return $user['id'];
            }
        }
    
        return null; // Return null if username is not found
    }
    private function findUserIndexById(int $userId, array $users): int|false
    {
        foreach ($users as $index => $user) {
            if ($user['id'] === $userId) {
                return $index;
            }
        }

        return false;
    }

    // New method to handle transactions
    public function addTransaction(int $userId, string $transactionType, float $amount, string $description): void
    {
        $transactions = $this->loadData($this->transactionsFile);
        $transactions[] = [
            'id' => count($transactions) + 1,
            'user_id' => $userId,
            'iban' => $this->generateRandomIBAN(),
            'transaction_number' => $this->generateRandomTransactionNumber(),
            'transaction_type' => $transactionType,
            'amount' => $amount,
            'date_time' => date('Y-m-d H:i:s'),
            'description' => $description,
        ];

        $this->saveData($transactions, $this->transactionsFile);
    }

    public function showAllTransactions(): array
    {
        return $this->loadData($this->transactionsFile);
    }

    private function generateRandomIBAN(): string
    {
        return 'LT' . rand(10, 99) . '1234' . rand(1000, 9999) . '5678' . rand(1000, 9999);
    }

    private function generateRandomTransactionNumber(): string
    {
        return 'TXN' . rand(100000, 999999);
    }
}
