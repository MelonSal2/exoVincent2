<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <title>exoVincent</title>
</head>
<body>
    <?php include "nav.html.php"?>
    <div class="d-flex flex-column align-items-center w-100">
        <h1>Exo Vincent</h1>
    </div>

    <?php if(isset($_SESSION['user'])){
        if(empty($_SESSION['user'])){
            ?>

        <?php }else {?>

            <div class="d-flex flex-column align-items-center w-100 mt-5">
                <div class="alert alert-success w-50 mt-5 text-center" role="alert">
                        Utilisez ce formulaire pour ajouter un POST
                </div>
                <form action="<?=$path?>/ajoutPost" class="mt-4 w-50 form-group" method="post">
                    <label for="contenu">Contenu de votre post :</label>
                    <textarea name="contenu" id="contenu" class="form-control" rows="10"></textarea>
                    <div class="d-flex flex-column align-items-end mt-2">
                        <button class="btn btn-success" type="submit" style="width:15%;">Poster</button>
                    </div>
                </form>
            </div>

            <div class="d-flex flex-column align-items-center mt-5 mb-5">
                <h2>Liste des POSTS :</h2>
                <table class="table table-striped w-75">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date de publication</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($ListePosts as $ListePost):?>
                        <tr>
                        <th scope="row"><?=$ListePost->id?></th>
                        <td><?=$ListePost->email?></td>
                        <td><?=$ListePost->date?></td>
                        <td><a href="<?=$path?>/Post/<?=$ListePost->id?>" class="btn btn-info">Voir</a>
                        <?php if($ListePost->email === $_SESSION['user']->email){?>
                            <a href="<?=$path?>/SupprimerPost/<?=$ListePost->id?>" class="btn btn-danger">Supprimer</a>
                        <?php } ?>
                        </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
       <?php }} ?>
</body>
    <?php require "script.html.php" ?>
</html>