<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="container mt-5">
        <div class="row">
            <div class="col">
                <h2>Create</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="http://localhost/capybaros/crud/store.php" method="post">
                            <div class="mb-3">
                            <label class="form-label">Amount:</label>
                            <input type="range" class="form-range" name="amount" min="0" max="1000">
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