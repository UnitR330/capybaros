<?php
namespace App\DB;


interface DataBase
{

    function create(object $userData) : int;
    
    function update(int $userId, object $userData) : bool;
    
    function delete(int $userId) : bool;
    
    function show(int $userId) : object;
    
    function showAll() : array;
    
}

?>

<?php

namespace App\DB;

interface UserDatabase {
    function createUser(object $userData): int;
    function updateUser(int $userId, object $userData): bool;
    function deleteUser(int $userId): bool;
    function showUser(int $userId): ?object;
    function showAllUsers(): array;
    function authenticateUser(string $username, string $password): bool;
}

interface AccountDatabase {
    function createAccount(int $userId, string $iban): int;
    function showAccount(int $accountId): ?object;
    function showAllAccounts(): array;
}

interface TransactionDatabase {
    function createTransaction(int $accountId, string $type, float $amount, ?string $paymentDescription): int;
    function showTransaction(int $transactionId): ?object;
    function showAllTransactions(): array;
    function deleteTransaction(int $transactionId): bool;
}

interface MariaDBDatabase extends UserDatabase, AccountDatabase, TransactionDatabase {
}

class UserDatabaseClass implements UserDatabase {
}

class AccountDatabaseClass implements AccountDatabase {
}

class TransactionDatabaseClass implements TransactionDatabase {
}

class DataBaseClass implements MariaDBDatabase {
    private $userDatabase;
    private $accountDatabase;
    private $transactionDatabase;

    public function __construct()
    {
        $this->userDatabase = new UserDatabaseClass();
        $this->accountDatabase = new AccountDatabaseClass();
        $this->transactionDatabase = new TransactionDatabaseClass();
    }
  
  
  
 
 
 
 
}

?>
