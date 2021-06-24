<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <title>Info Post</title>
</head>
<body>
    <?php require "nav.html.php"?>
    <div class="d-flex flex-column align-items-center mt-5">
        <div class="card" style="width: 36rem;">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">De : <?=$InfoPost->email?></h6>
            <p class="card-text"><?=$InfoPost->contenu?></p>
        </div>
        </div>
    </div>

</body>
    <?php require "script.html.php" ?>
</html>