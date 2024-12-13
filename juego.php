<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
        //explode
        //implode
        

         function mostrarFormulario($pregunta, $idPreg, $nombreEnv,$cont) {
            echo $cont;
            echo '<div class="container">
                    <div class="wrapper">
                    ' . $cont . '
                        <form action="#" method="post" id="registro">
                            <label for="respuesta">' . explode(",", $pregunta)[0] . '</label><br>
                            <input type="text" placeholder="respuesta" name="rsp">
                            <input type="hidden" name="pregunta" value="' . $pregunta . '">
                            <input type="hidden" name="idPreg" value="' . $idPreg . '">
                            <input type="hidden" name="cont" value="' . $cont . '">
                            <input type="submit" class="btn" name="' . $nombreEnv . '" value="Responder">
                        </form>
                    </div>
                </div>';
        }



        require_once 'usuarios.php';     
        require_once "preguntas.php";
        $db = new mysqli('localhost', 'root', '', 'cuestionario');
        $pg= new preguntas($db);
        $us= new usuarios($db);
        $db->set_charset("utf8");
        $arraypreg = $pg->getDatos() ;
        $numpreg = [];
        $cont=0;
        $comprobar=false;
        for ($i = 0; $i < 5; $i++) {
            do {
                $numAleatorio = mt_rand(0, 9);
            } while (in_array($numAleatorio, $numpreg)); 
            array_push($numpreg, $numAleatorio);
        }

        

       
            if (isset($_POST["env"])) {
                $cont=$_POST["cont"];
                if($cont < 4){
                    $pregunta = explode(",", $_POST["pregunta"]);
                    $comprobar = $pg->comprobar($_POST["rsp"], $pregunta[1]);
                    
                    
                    if ($comprobar == false) {
                        mostrarFormulario($_POST["pregunta"], $_POST["idPreg"], "env",$cont);
                    }else{
                        $cont++;
                        mostrarFormulario($arraypreg[$numpreg[$cont]], $numpreg[$cont], "env",$cont);
                    }
                }else{
                    $usuario=$_GET["user"];
                    if ($us->tiempofin($usuario)) {
                        header("location:ranking.php");
                    }
                    
                }
            } else {
                mostrarFormulario($arraypreg[$numpreg[$cont]], $numpreg[$cont], "env",$cont);
            }
            
        
       


        
    ?>
    
</body>
</html>