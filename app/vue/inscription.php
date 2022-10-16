<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
</head>
<body>
<?php
if (isset($error)) {
    echo '<div class="alert alert-danger text-center" role="alert">
                    <strong>Users already use</strong>
                  </div>';
}
?>
<form action="index.php?action=inscrire" method="post">
    <div>
        <p>Nom :</p>
        <label>
            <input class="form-control" type="text" name="username">
        </label>
    </div>
    <div>
        <p>Mdp :</p>
        <label>
            <input class="form-control" type="password" name="password">
        </label>
    </div>
    <div><button type="submit">S'inscrire</button></div>
</form>

</body>
<?php