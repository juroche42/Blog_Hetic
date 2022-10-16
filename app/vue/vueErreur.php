<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coucou</title>
</head>
<body>
<div class="text-center">
    <h1>ERROR</h1>
    <?php
    if (isset($errorArr)) {
        foreach ($errorArr as $value) {
            echo $value;
        }
    }
    ?>
</div>
</body>


