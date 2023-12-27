<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>
<body>

<?php require __DIR__ . '/parts/nav.php' ?>
 
    <?php
        $id = $_GET['id'] ?? 0;
        $boxes = json_decode(file_get_contents(__DIR__ . '/data/boxes.json'), true);    
        $box = $boxes[$id] ?? null;
    ?>
 
    <?php if (!$box) : ?>
        <div class="alert alert-danger" role="alert">
            Box not found!
        </div>
 
    <?php else: ?>
 
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Show</h2>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i>Box ID:</i> <?= $Box['boxId'] ?></h5>
                            <p class="card-text"><i>Mandarins amount:</i> <?= $Box['amount'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
    <?php endif ?>    
    

</body>
</html>