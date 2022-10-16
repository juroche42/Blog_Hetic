<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
</head>
<body>
<a href="index.php?action=<?php if (isset($admin)) {
    echo "seDeconnecter";
} else {
    echo "seConnecterPage";
}?>">
    <?php if (isset($admin)) {
        echo 'Se déconnecter';
    } else {
        echo 'Se connecter';
    } ?></a>

<?php if (!isset($admin)){
    ?>
    <a class="btn btn-primary" role="button" href="index.php?action=sinscrirePage">S'inscrire</a>
    <?php
}?>


<?php
if (!empty($tabArticle)){
    foreach ($tabArticle as $article){?>
        <div>
            <h1><?=$article->getTitre()?></h1>
            <p><?=$article->getDescription()?></p>
            <p><?=$article->getDate()?></p>
            <?php if (isset($admin)){
                ?>
                <a class="btn btn-primary" role="button" href="index.php?action=supprimerArticle&feed=<?=$article->getId()?>" ">Effacer</a>
                <?php
            }?>

        </div>
    <?php }
} else { ?>
    <h1>PAS DE NOUVEL ARTICLE</h1>
<?php }?>


<?php if (isset($admin)){
    ?>
    <a href="index.php?action=pageAjouterArticle">Créer article</a>
    <?php
}?>



</body>
<?php