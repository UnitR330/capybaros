<?php
namespace App\DB;

class DataBaseClass implements DataBase
{
    private $dataFile;

    public function __construct()
    {
        $this->dataFile = __DIR__ . '/../../data/accounts.json';

        $directory = dirname($this->dataFile);
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        if (!file_exists($this->dataFile)) {
            file_put_contents($this->dataFile, '[]');
        }
    }

  public function create(object $userData): int
  {
      $accounts = $this->loadData();
      $newUserId = $this->generateUserId($accounts);
      $userData->id = $newUserId;
      $accounts[] = (array)$userData;  
      $this->saveData($accounts);
      return $newUserId;
  }
  
  public function authenticate(string $username, string $password): bool
  {
      $accounts = $this->loadData();
  
      foreach ($accounts as $user) {
          if ($user['username'] === $username && password_verify($password, $user['password_hash'])) {
              return true;
          }
      }
      return false;
  }
 
public function update(int $userId, object $userData): bool
{
    $accounts = $this->loadData();
    $userIndex = $this->findUserIndexById($userId, $accounts);

    if ($userIndex !== false) {
        $accounts[$userIndex]['balance'] = $userData->balance;

        $this->saveData($accounts);
        return true;
    }

    return false;
}

    public function delete(int $userId): bool
    {

        return false; 
    }

    public function show(int $userId): object
    {
        $accounts = $this->loadData();
        $userIndex = $this->findUserIndexById($userId, $accounts);
    var_dump($userIndex);
        if ($userIndex !== false) {
            $user = (object) $accounts[$userIndex];

            if (!property_exists($user, 'balance')) {
                $user->balance = 0;
            }

            return $user;
        }

        return (object)[];
    }

    public function showAll(): array
    {
        // Implement the showAll logic
        // ...

        return []; // Placeholder, update as needed
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

}
