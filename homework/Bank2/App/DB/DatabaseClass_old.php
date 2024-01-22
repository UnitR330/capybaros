<?php
namespace App\DB;

class DatabaseClass implements DataBase
{
    private $dataFile = __DIR__ . '/../data/accounts.json';

    public function create(object $userData): int
    {
        // Implementation of the create method
    }

    public function update(int $userId, object $userData): bool
    {
        // Implementation of the update method
    }

    public function delete(int $userId): bool
    {
        // Implementation of the delete method
    }

    public function show(int $userId): object
    {
        // Implementation of the show method
    }

    public function showAll(): array
    {
        // Implementation of the showAll method
    }
}
