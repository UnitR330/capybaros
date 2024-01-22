<?php
namespace App\DB;

class DatabaseClass implements DataBase
{
    private $dataFile = __DIR__ . 'http://localhost/_46-grupe_/capybaros/homework/Bank2/data/accounts.json';

    public function create(object $userData): int
    {
        $accounts = $this->loadData();

        // Generate a new user ID
        $newUserId = $this->generateUserId($accounts);

        // Set the new user ID
        $userData->id = $newUserId;

        // Add the new user to the accounts array
        $accounts[] = $userData;

        // Save the updated data to the file
        $this->saveData($accounts);

        return $newUserId;
    }

    public function update(int $userId, object $userData): bool
    {
        $accounts = $this->loadData();

        // Find the user with the specified ID
        $userIndex = $this->findUserIndexById($userId, $accounts);

        if ($userIndex !== false) {
            // Update the user data
            $accounts[$userIndex] = $userData;

            // Save the updated data to the file
            $this->saveData($accounts);

            return true;
        }

        return false;
    }

    public function delete(int $userId): bool
    {
        $accounts = $this->loadData();

        // Find the user with the specified ID
        $userIndex = $this->findUserIndexById($userId, $accounts);

        if ($userIndex !== false) {
            // Remove the user from the array
            array_splice($accounts, $userIndex, 1);

            // Save the updated data to the file
            $this->saveData($accounts);

            return true;
        }

        return false;
    }

    public function show(int $userId): object
    {
        $accounts = $this->loadData();

        // Find the user with the specified ID
        $userIndex = $this->findUserIndexById($userId, $accounts);

        if ($userIndex !== false) {
            return (object)$accounts[$userIndex];
        }

        // Return an empty object if user not found
        return (object)[];
    }

    public function showAll(): array
    {
        return $this->loadData();
    }

    private function loadData(): array
    {
        $jsonData = file_get_contents($this->dataFile);
        return json_decode($jsonData, true) ?: [];
    }

    private function saveData(array $data): void
    {
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($this->dataFile, $jsonData);
    }

    private function generateUserId(array $accounts): int
    {
        // Generate a new user ID (assuming user IDs are sequential)
        return count($accounts) + 1;
    }

    private function findUserIndexById(int $userId, array $accounts): int|false
    {
        foreach ($accounts as $index => $user) {
            if ($user['id'] === $userId) {
                return $index;
            }
        }

        return false;
    }
}
