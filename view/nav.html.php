<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="<?=$path?>/">exoVincent</a>
    <form class="form-inline">
    <?php if(isset($_SESSION['user'])){ ?>
        <a href="<?= $path ?>/Profil/<?=$_SESSION["user"]->email?>" class="btn btn-warning mr-2">Mon Profil</a>
        <a href="<?= $path ?>/deconnexion" class="btn btn-danger mr-2">Déconnexion</a>
    <?php } else {?>
        <a href="<?= $path ?>/connexion" class="btn btn-info mr-2">Se connecter</a>
        <a href="<?= $path ?>/inscription" class="btn btn-secondary ml-2">S'inscrire</a>
    <?php } ?>
    </form>
</nav>
<div class="w-100 d-flex flex-column align-items-center">
            <?php if(isset($_SESSION['correct'])){ ?>
                <div class="alert alert-success w-75 d-flex justify-content-center">
                    <?=$_SESSION['correct']?>
                </div>
            <?php } unset($_SESSION['correct'])?>
            <?php if(isset($_SESSION['erreur'])){ ?>
                <div class="alert alert-danger w-75 d-flex justify-content-center">
                    <?=$_SESSION['erreur']?>
                </div>
            <?php } unset($_SESSION['erreur']) ?>  
</div>dsd