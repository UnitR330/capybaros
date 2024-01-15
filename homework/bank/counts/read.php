<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="http://localhost/_46-Grupe_/capybaros/homework/bank/counts/app.js" defer></script>
    <title>Read</title>
</head>
<body>
    <?php require __DIR__ . '/parts/nav.php' ?>
    <?php require __DIR__ . '/parts/msg.php' ?>
  
    <?php
    // Fetch and initialize $boxes from the JSON file
    $boxes = json_decode(file_get_contents(__DIR__ . '/data/boxes.json'), true);
    ?>
  
    <div class="container mt-5">
        <div class="row">
            <div class="col-2">
                <h2>Read</h2>
                
                <!-- Sort and Clear form on the left side -->
                <form action="http://localhost/_46-Grupe_/capybaros/homework/bank/counts/read.php" method="get">
                    <div class="mb-3">
                        <label for="amount" class="form-label">Sort By</label>
                        <select class="form-select" name="sort">
                            <option value="default" <?= ($_GET['sort'] ?? '') == 'default' ? 'selected' : '' ?>>Default</option>
                            <option value="amount_asc" <?= ($_GET['sort'] ?? '') == 'amount_asc' ? 'selected' : '' ?>>By amount 0-9</option>
                            <option value="amount_desc" <?= ($_GET['sort'] ?? '') == 'amount_desc' ? 'selected' : '' ?>>By amount 9-0</option>
                            <option value="id_asc" <?= ($_GET['sort'] ?? '') == 'id_asc' ? 'selected' : '' ?>>By id 0-9</option>
                            <option value="id_desc" <?= ($_GET['sort'] ?? '') == 'id_desc' ? 'selected' : '' ?>>By id 9-0</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Sort</button>
                    <a href="http://localhost/_46-Grupe_/capybaros/homework/bank/counts/read.php" class="btn btn-secondary">Clear</a>
                </form>
            </div>
     <!-- Add the new button -->
     <button id="setInitialBalance" class="btn btn-primary">Set Initial Balance</button>
                </form>
            </div>

            <!-- Balance calculation on the right side -->
            <div class="col-10 text-end">
                <?php
                    // Check if $boxes is not null
                    if (!is_null($boxes)) {
                        $totalBalance = array_sum(array_column($boxes, 'amount'));
                        echo '<span class="fw-bold">Balance: ' . $totalBalance . ' €</span>';
                    } else {
                        echo '<span class="fw-bold">Balance: 0 €</span>';
                    }
                ?>
            </div>
        </div>
    </div>
        <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                    <b>Transaction Nr.</b>
                    </div>
                    <div class="col-2">
                    <b>Date and time</b>
                    </div>
                    <div class="col-2">
                    <b>Description</b>
                    </div>
                    <div class="col-2">
                    <b>Amount</b>
                    </div>
                    <div class="col-2">
                    <b>Action</b>
                    </div>
                </div>
            </div>
        </li>
        <script>
document.addEventListener('DOMContentLoaded', function () {
    const setInitialBalanceButton = document.getElementById('setInitialBalance');

    if (setInitialBalanceButton) {
        setInitialBalanceButton.addEventListener('click', function () {
            setInitialBalance();
        });
    }

    function setInitialBalance() {
        fetch('http://localhost/_46-Grupe_/capybaros/homework/bank/counts/store.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'setInitialBalance=true', // Indicate that it's an initial balance request
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Assuming store.php returns JSON data
            })
            .then(data => {
                // Update the balance element on the page
                updateBalance();
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
                // Handle error, e.g., show an error message to the user
            })
            .finally(() => {
                // Hide the button after the initial balance is set
                setInitialBalanceButton.style.display = 'none';
            });
    }

    function updateBalance() {
        setInterval(() => {
            // Fetch and initialize $boxes from the JSON file
            fetch('http://localhost/_46-Grupe_/capybaros/homework/bank/counts/data/boxes.json')
                .then(response => response.json())
                .then(boxes => {
                    // Check if $boxes is not null
                    if (!is_null(boxes)) {
                        const totalBalance = array_sum(array_column(boxes, 'amount'));
                        const balanceElement = document.querySelector('.fw-bold');
                        if (balanceElement) {
                            balanceElement.innerText = 'Balance: ' + totalBalance + ' €';
                        }
                    }
                })
                .catch(error => {
                    console.error('There was a problem fetching the updated balance:', error);
                    // Handle error, e.g., show an error message to the user
                });
        }, 5000); // Update every 5 seconds, adjust as needed
    }

    // Initial call to update balance
    updateBalance();
});


    </script>
        <?php $boxes = json_decode(file_get_contents(__DIR__ . '/data/boxes.json'), true) ?>
        <?php
        if (isset($_GET['sort'])) {
            match($_GET['sort']) {
                'amount_asc' => usort($boxes, fn($a, $b) => $a['amount'] <=> $b['amount']),
                'amount_desc' => usort($boxes, fn($a, $b) => $b['amount'] <=> $a['amount']),
                'id_asc' => usort($boxes, fn($a, $b) => $a['transactionNumber'] <=> $b['transactionNumber']),
                'id_desc' => usort($boxes, fn($a, $b) => $b['transactionNumber'] <=> $a['transactionNumber']),
                default => $boxes,
            };
        }

        ?>
        <?php foreach ($boxes as $box) : ?>
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <?= $box['transactionNumber'] ?>
                    </div>
                    <div class="col-2">
                        <?= $box['timestamp'] ?>
                    </div>
                    <div class="col-2">
                        <?= $box['description'] ?>
                    </div>
                    <div class="col-2">
                        <?= $box['amount'] ?>
                    </div>
                    <div class="col-2">
                        <a href="http://localhost/_46-Grupe_/capybaros/homework/bank/counts/show.php?id=<?= $box['transactionNumber'] ?>" class="btn btn-outline-success btn-sm">Show</a>
                        <a href="http://localhost/_46-Grupe_/capybaros/homework/bank/counts/edit.php?id=<?= $box['transactionNumber'] ?>" class="btn btn-outline-info btn-sm">Edit</a>
                        <a href="http://localhost/_46-Grupe_/capybaros/homework/bank/counts/delete.php?id=<?= $box['transactionNumber'] ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>
        </li>
        <?php endforeach ?>
    </ul>
</body>
</html>