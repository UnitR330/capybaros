<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorized</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/_46-grupe_/capybaros/homework/bank/css/authorized.css">
    <script src="http://localhost/_46-Grupe_/capybaros/homework/bank/counts/app.js" defer></script>
    <!-- <script>
        function disableButton(btnId) {
            var btn = document.getElementById(btnId);
            btn.classList.add("disabled", "btn-secondary"); // Add Bootstrap classes for disabled state
            btn.innerHTML = "Account Created"; // Optional: Change the button text
            btn.removeAttribute("onclick"); // Remove the onclick attribute to prevent further clicks
        }
    </script> -->
   
 
</head>
<header>
    <div class="header-left">
        <img src="http://localhost/_46-grupe_/capybaros/homework/bank/images/main_logo.png" alt="Logo">
        <h3><?= $_SESSION['name']?>, your bank account ID: <?= $_SESSION['id'] ?></h3>       
    </div>
    <div class="header-center">
        <nav>
            <ul>
                <li><a href="index.php">Go to main page</a></li>
            </ul>
        </nav>
    </div>
    <div class="header-right">
        <form action="http://localhost/_46-grupe_/capybaros/homework/bank/sign_out.php" method="post">
            <button class="logout-btn">Logout</button>
        </form>
    </div>
</header>
 
<body>
<!-- <div class="col-2">
        <form action="http://localhost/_46-Grupe_/capybaros/homework/bank/counts/store.php" method="post">
            <button type="submit" class="btn btn-primary" id="createEuroBtn" onclick="disableButton('createEuroBtn')">Create Euro Account</button>
        </form>
    </div>


    <div class="col-2">
        <form action="http://localhost/_46-Grupe_/capybaros/homework/bank/counts/create_usd_account.php" method="get">
            <button type="button" class="btn btn-info" id="createUsdBtn" onclick="disableButton('createUsdBtn')">Create USD Account</button>
        </form>
    </div>

    <div class="col-2">
        <form action="http://localhost/_46-Grupe_/capybaros/homework/bank/counts/create_gbp_account.php" method="get">
            <button type="button" class="btn btn-warning" id="createGbpBtn" onclick="disableButton('createGbpBtn')">Create GBP Account</button>
        </form>
    </div> -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-2">
                <form action="http://localhost/_46-Grupe_/capybaros/homework/bank/counts/read.php" method="get">
                    <div class="mb-3">
                        <label for="amount" class="form-label" style="color: white;">Sort By</label>
                        <select class="form-select" name="sort">
                            <option value="default" <?= ($_GET['sort'] ?? '') == 'default' ? 'selected' : '' ?>>Default</option>
                            <option value="amount_asc" <?= ($_GET['sort'] ?? '') == 'amount_asc' ? 'selected' : '' ?> >By amount 0-9</option>
                            <option value="amount_desc" <?= ($_GET['sort'] ?? '') == 'amount_desc' ? 'selected' : '' ?> >By amount 9-0</option>
                            <option value="id_asc" <?= ($_GET['sort'] ?? '') == 'id_asc' ? 'selected' : '' ?>>By id 0-9</option>
                            <option value="id_desc" <?= ($_GET['sort'] ?? '') == 'id_desc' ? 'selected' : '' ?>>By id 9-0</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Sort</button>
                    <a href="http://localhost/_46-Grupe_/capybaros/homework/bank/counts/read.php" class="btn btn-secondary">Clear</a>
                </form>
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
        </li>

        <?php $boxes = json_decode(file_get_contents(__DIR__ . '/counts/data/boxes.json'), true) ?>
        <?php
        if (isset($_GET['sort'])) {
            match($_GET['sort']) {
                'amount_asc' => usort($boxes, fn($a, $b) => $a['amount'] <=> $b['amount']),
                'amount_desc' => usort($boxes, fn($a, $b) => $b['amount'] <=> $a['amount']),
                'id_asc' => usort($boxes, fn($a, $b) => $a['boxId'] <=> $b['boxId']),
                'id_desc' => usort($boxes, fn($a, $b) => $b['boxId'] <=> $a['boxId']),
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


