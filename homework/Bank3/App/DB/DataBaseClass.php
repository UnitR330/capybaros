<?php

namespace App\DB;

use mysqli;

class DataBaseClass
{
    private $host = 'localhost';
    private $database = 'bank';  

    protected $connection;

    public function __construct() {
        $this->connection = new mysqli($this->host, 'root', '', $this->database);
    
        if ($this->connection->connect_error) {
            die("Database connection failed: " . $this->connection->connect_error);
        }
    }
    
    public function getConnection() {
        return $this->connection;
    }

    private function escapeString($value) {
        return $this->connection->real_escape_string($value);
    }

    public function getUserIdByEmail($email) {
        $email = $this->escapeString($email);

        $getUserQuery = "SELECT user_id FROM users WHERE email = '$email'";
        $userResult = $this->connection->query($getUserQuery);

        if ($userResult->num_rows > 0) {
            $user = $userResult->fetch_assoc();
            return $user['user_id'];
        } else {
            return null;  
        }
    }

    public function authenticateByEmail($email, $password) {
        $email = $this->escapeString($email);
        $password = $this->escapeString($password);

        $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
        $emailResult = $this->connection->query($checkEmailQuery);
        if ($emailResult->num_rows > 0) {
            $user = $emailResult->fetch_assoc();
            if (password_verify($password, $user['password_hash'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getUserById($userId) {
        $userId = (int)$userId;
        $getUserQuery = "SELECT * FROM users WHERE user_id = $userId";
        $userResult = $this->connection->query($getUserQuery);
    
        if ($userResult) {
            if ($userResult->num_rows > 0) {
                return (object)$userResult->fetch_assoc();
            } else {
                return null;
            }
        } else {
            die("Error retrieving user: " . $this->connection->error);
        }
    }

    public function createUser($userData) {
        $firstName = $this->escapeString($userData->firstName);
        $lastName = $this->escapeString($userData->lastName);
        $email = $this->escapeString($userData->email);
        $personalCode = $this->escapeString($userData->personalCode);
        $password = $this->escapeString($userData->password);
    
        $iban = $this->generateUniqueIban();
    
        $checkPersonalCodeQuery = "SELECT * FROM users WHERE personal_code = '$personalCode'";
        $personalCodeResult = $this->connection->query($checkPersonalCodeQuery);
    
        if ($personalCodeResult->num_rows > 0) {
            echo '<div class="error">Error creating user: personal code is not unique. <button style="color: white; background-color: red; padding: 10px; border: none; cursor: pointer;" onclick="history.go(-1);">Try Again</button></div>';
            exit();
        }
    
        $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
        $emailResult = $this->connection->query($checkEmailQuery);
    
        if ($emailResult->num_rows > 0) {
            echo '<div class="error">Error creating user: email is not unique. <button style="color: white; background-color: red; padding: 10px; border: none; cursor: pointer;" onclick="history.go(-1);">Try Again</button></div>';
            exit();
        }
                    
        $insertUserQuery = "INSERT INTO users (first_name, last_name, email, personal_code, password_hash) 
                            VALUES ('$firstName', '$lastName', '$email', '$personalCode', '$password')";
        $userResult = $this->connection->query($insertUserQuery);

        if ($userResult) {
            $userId = $this->connection->insert_id;

            // Insert the generated IBAN into the accounts table
            $insertAccountQuery = "INSERT INTO accounts (user_id, iban, balance) VALUES ($userId, '$iban', 0)";
            $accountResult = $this->connection->query($insertAccountQuery);

            if (!$accountResult) {
                die("Error creating user account: " . $this->connection->error);
            }

            return $userId;
        } else {
            die("Error creating user: " . $this->connection->error);
        }
    }
     private function generateUniqueIban() {
        $ibanPrefix = 'LT';
        $randomNumber = mt_rand(100000000000000000, 999999999999999999);
        $iban = $ibanPrefix . $randomNumber;
        while ($this->isIbanExists($iban)) {
            $randomNumber = mt_rand(100000000000000000, 999999999000000009);
            $iban = $ibanPrefix . $randomNumber;
        }
        return $iban;
    }
    private function isIbanExists($iban) {
        $iban = $this->escapeString($iban);
    
        // Updated query to check 'IBAN' in the 'accounts' table.
        $checkIbanQuery = "SELECT COUNT(*) as count FROM accounts WHERE IBAN = '$iban'";
        $result = $this->connection->query($checkIbanQuery);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['count'] > 0;
        }
    
        return false;
    }     
    public function getIbanByUserId($userId) {
        $userId = (int)$userId;
        $getIbanQuery = "SELECT iban FROM accounts WHERE user_id = $userId";
        $ibanResult = $this->connection->query($getIbanQuery);
    
        if ($ibanResult->num_rows > 0) {
            $iban = $ibanResult->fetch_assoc();
            return $iban;
        } else {
            return null;
        }
    }

public function calculateBalance($userId) {
    $userId = (int)$userId;
    $getBalanceQuery = "
        SELECT SUM(amount) as balance
        FROM transactions
        INNER JOIN accounts ON transactions.account_id = accounts.account_id
        WHERE accounts.user_id = $userId
    ";

    $balanceResult = $this->connection->query($getBalanceQuery);

    if ($balanceResult && $balanceResult->num_rows > 0) {
        $balance = $balanceResult->fetch_assoc();
        return $balance['balance'] ?? 0;
    } else {
        return 0;
    }
}

public function getAccountIdByIban($iban) {
    $iban = $this->escapeString($iban);
    $getAccountIdQuery = "SELECT account_id FROM accounts WHERE iban = '$iban'";
    $accountIdResult = $this->connection->query($getAccountIdQuery);

    if ($accountIdResult && $accountIdResult->num_rows > 0) {
        $accountId = $accountIdResult->fetch_assoc();
        return $accountId['account_id'];
    } else {
        die("Error getting account ID by IBAN: " . $this->connection->error);
    }
}


public function getTransactionsByUserId($userId) {
    $userId = (int)$userId;
    $getTransactionsQuery = "
        SELECT *
        FROM transactions
        INNER JOIN accounts ON transactions.account_id = accounts.account_id
        WHERE accounts.user_id = $userId
    ";
    $transactionsResult = $this->connection->query($getTransactionsQuery);

    if ($transactionsResult && $transactionsResult->num_rows > 0) {
        $transactions = [];
        while ($row = $transactionsResult->fetch_assoc()) {
            $transactions[] = $row;
        }
        return $transactions;
    } else {
        return [];
    }
}           
public function show($userId) {
    $userId = (int)$userId;
    $getUserQuery = "SELECT * FROM users WHERE user_id = $userId";
    $userResult = $this->connection->query($getUserQuery);

    if ($userResult) {
        if ($userResult->num_rows > 0) {
            return (object)$userResult->fetch_assoc();
        } else {
            return null;
        }
    } else {
        die("Error retrieving user: " . $this->connection->error);
    }
}

public function createTransaction($transactionData) {
    $userId = (int)$transactionData->userId;
    $amount = (float)$transactionData->amount;

    $userIban = $this->getIbanByUserId($userId);

    if ($userIban) {
        $accountId = $this->getAccountIdByIban($userIban['iban']);

        // Check if timestamp is already a string
        $formattedTimestamp = is_int($transactionData->timestamp)
            ? date('Y-m-d H:i:s', $transactionData->timestamp)
            : $transactionData->timestamp;

        $insertTransactionQuery = "INSERT INTO transactions (account_id, type, amount, timestamp) 
                                   VALUES ($accountId, '$transactionData->type', $amount, '$formattedTimestamp')";
        $transactionResult = $this->connection->query($insertTransactionQuery);

        if (!$transactionResult) {
            die("Error creating transaction: " . $this->connection->error);
        }
    } else {
        die("Error creating transaction: User IBAN not found.");
    }
}

public function deleteTransaction($userId, $transactionId) {
    $userId = (int)$userId;
    $transactionId = (int)$transactionId;

    $userIban = $this->getIbanByUserId($userId);

    if ($userIban) {
        $accountId = $this->getAccountIdByIban($userIban['iban']);

        $deleteTransactionQuery = "DELETE FROM transactions WHERE account_id = $accountId AND transaction_id = $transactionId";
        $deleteResult = $this->connection->query($deleteTransactionQuery);

        if (!$deleteResult) {
            die("Error deleting transaction: " . $this->connection->error);
        }
    } else {
        die("Error deleting transaction: User IBAN not found.");
    }
}

public function deleteAccount($userId) {
    $userId = (int)$userId;

    // Delete transactions associated with the user
    $deleteTransactionsQuery = "DELETE FROM transactions WHERE account_id IN (SELECT account_id FROM accounts WHERE user_id = $userId)";
    $this->connection->query($deleteTransactionsQuery);

    // Delete the user's account
    $deleteAccountQuery = "DELETE FROM accounts WHERE user_id = $userId";
    $this->connection->query($deleteAccountQuery);

    // Delete the user
    $deleteUserQuery = "DELETE FROM users WHERE user_id = $userId";
    $this->connection->query($deleteUserQuery);
}
 
    public function deposit($userId, $amount) {
    $transactionData = [
        'userId' => $userId,
        'type' => 'Deposit',
        'amount' => $amount,
        'timestamp' => time(),
    ];

    $this->createTransaction((object)$transactionData);
}

public function withdraw($userId, $amount) {
    $transactionData = [
        'userId' => $userId,
        'type' => 'Withdrawal',
        'amount' => -$amount,
        'timestamp' => time(),
    ];

    $this->createTransaction((object)$transactionData);
}

public function transfer($senderUserId, $receiverUserId, $amount) {
    // Assuming sender and receiver have their IBANs stored in the 'users' table
    $senderIban = $this->getIbanByUserId($senderUserId);
    $receiverIban = $this->getIbanByUserId($receiverUserId);

    if ($senderIban && $receiverIban) {
        $senderAccountId = $this->getAccountIdByIban($senderIban['iban']);
        $receiverAccountId = $this->getAccountIdByIban($receiverIban['iban']);

        $timestamp = time();

        // Perform the withdrawal from the sender's account
        $withdrawalData = [
            'userId' => $senderUserId,
            'type' => 'Transfer to ' . $receiverIban['iban'],
            'amount' => -$amount,
            'timestamp' => $timestamp,
        ];

        $this->createTransaction((object)$withdrawalData);

        // Perform the deposit to the receiver's account
        $depositData = [
            'userId' => $receiverUserId,
            'type' => 'Transfer from ' . $senderIban['iban'],
            'amount' => $amount,
            'timestamp' => $timestamp,
        ];

        $this->createTransaction((object)$depositData);
    } else {
        die("Error transferring funds: One or both users do not have valid IBANs.");
    }
}
}

?>