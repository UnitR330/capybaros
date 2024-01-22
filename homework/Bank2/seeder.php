<?php
namespace App\DB;

class Seeder
{
    private $dataFile = __DIR__ . '/../../data/accounts.json';

    public function seed()
    {
        $accounts = [
            [
                "id" => 1,
                "firstName" => "John",
                "lastName" => "Doe",
                "personalCode" => "12345678901",
                "accountNumber" => "LT12341234567856781234",
                "balance" => 1000
            ],
            [
                "id" => 2,
                "firstName" => "Jane",
                "lastName" => "Smith",
                "personalCode" => "98765432109",
                "accountNumber" => "LT56785678567856781234",
                "balance" => 500
            ]
            // Add more accounts as needed
        ];

        // Convert the accounts array to JSON and write it to the file
        $jsonAccounts = json_encode($accounts, JSON_PRETTY_PRINT);
        file_put_contents($this->dataFile, $jsonAccounts);

        echo 'Seed data successfully added to accounts.json';
    }
}

// Run the seeder
$seeder = new Seeder();
$seeder->seed();
