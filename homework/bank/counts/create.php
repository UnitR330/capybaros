<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="http://localhost/_46-grupe_/capybaros/homework/bank/counts/app.js" defer></script>
    <title>Create</title>
</head>
<body>
    <?php require __DIR__ . '/parts/nav.php' ?>
    <?php require __DIR__ . '/parts/msg.php' ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h2>Create</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="http://localhost/_46-grupe_/capybaros/homework/bank/counts/store.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Amount: <span id="amount"></span></label>
                                <input type="range" class="form-range" name="amount" min="0" max="1000" value="10">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <input type="text" class="form-control" id="description" name="description" maxlength="40">
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Create</button>
                        </form>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
