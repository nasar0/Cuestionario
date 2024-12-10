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
        require_once "preguntas.php";
        $db = new mysqli('localhost', 'root', '', 'cuestionario');
        $pg= new preguntas($db);
        $arraypreg = $pg->getDatos(); 
        if(!isset($cont))
            static $cont=0;
        $numpreg = [];
        for ($i = 0; $i < 5; $i++) {
            do {
                $numAleatorio = mt_rand(0, 9);
            } while (in_array($numAleatorio, $numpreg)); 
            array_push($numpreg, $numAleatorio);
        }
        
        if (isset($_POST["env"])) {
            echo $_POST["rsp"];
            $comprobar =$pg->comprobar($_POST["rsp"],$numpreg[$cont+1]);
            echo $numpreg[$cont];
            if ($comprobar==true) {
                echo "hola";
            }
            if ($comprobar==false) {
                echo "adios";
            }
            foreach ($numpreg as $num ) {
                echo  $arraypreg[$num]."".$cont;
            }
        }else {
            echo'<form action="" method="post" id="registro">
                    <label for="">'.$arraypreg[$numpreg[$cont]].'</label>
                    <input type="text" placeholder="Respuesta" name="rsp" require><br>
                    <input type="submit" class="btn" name="env" value="Iniciar">
                </form>';
        }
    ?>
    
</body>
</html>