<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <title>Inscription</title>
</head>
<body>
    <?php require "nav.html.php"?>
    <div class="d-flex flex-column align-items-center">
        <div class="alert alert-primary text-center mt-5" style="width:25%;" role="alert">
            Inscrivez-vous ici :
        </div>
        <form action="<?=$path?>/register" method="post" class="form-group" style="width:25%;">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom">
            <label for="nom">Prenom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom">
            <label for="mdp">Mot de passe :</label>
            <input type="password" class="form-control" id="mdp" name="mdp">
            <div class="d-flex flex-column align-items-end">
                <button class="btn btn-info mt-3" type="submit">S'inscrire</button>
            </div>
        </form>
    </div>

</body>
    <?php require "script.html.php" ?>
</html>