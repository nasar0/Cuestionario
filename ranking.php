<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once 'usuarios.php';
        $db = new mysqli('localhost', 'root', '', 'cuestionario');
        $us= new usuarios($db);
        $us->elo();
    ?>
</body>
</html>