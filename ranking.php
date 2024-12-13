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
        $rank =  $us->elo();
        $cont=1;
        echo "<table>";
        echo "<tr><td>Numero</td><td>usuario</td><td>Tiempo</td></tr>";

        foreach ($rank as $value => $v) {
            echo "<tr>";
            echo "<td>". $cont++ ."</td>";  
            echo "<td>". $value ."</td>";   
            if ($v-40<0) {
                echo "<td>". $v ."</td>";  
            }else{
                echo "<td>". $v-40 ."</td>";  
            }
           
            echo "</tr>";
        }

        echo "</table>";
    ?>
</body>
</html>