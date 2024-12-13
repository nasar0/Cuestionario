<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        
    </style>
</head>
<body>
    <?php
        // Función para mostrar el formulario con la pregunta
        function mostrarFormulario($pregunta, $idPreg, $nombreEnv, $cont) {
            echo $cont;
            echo '<div class="container">
                    <div class="wrapper">
                        <form action="#" method="post" id="registro">
                            <h2 for="respuesta">' . explode(",", $pregunta)[0] . '</h2><br>
                            <div class="input-box"> 
                                <input type="text" placeholder="respuesta" name="rsp" required> 
                            </div>
                            <input type="hidden" name="pregunta" value="' . $pregunta . '">
                            <input type="hidden" name="idPreg" value="' . $idPreg . '">
                            <input type="hidden" name="cont" value="' . $cont . '">
                            <input type="submit" class="btn" name="' . $nombreEnv . '" value="Responder">
                        </form>
                    </div>
                </div>';
        }

        // Cargar clases y establecer conexión DB
        require_once 'usuarios.php';     
        require_once "preguntas.php";
        $db = new mysqli('localhost', 'root', '', 'cuestionario');
        $pg = new preguntas($db);
        $us = new usuarios($db);
        $db->set_charset("utf8");

        // Obtener preguntas de la base de datos
        $arraypreg = $pg->getDatos();
        $numpreg = [];
        $cont = 0;
        $comprobar = false;

        // Generar 5 preguntas aleatorias
        for ($i = 0; $i < 5; $i++) {
            do {
                $numAleatorio = mt_rand(0, 9);
            } while (in_array($numAleatorio, $numpreg)); 
            array_push($numpreg, $numAleatorio);
        }

        // Procesar respuesta del formulario
        if (isset($_POST["env"])) {
            $cont = $_POST["cont"];
            if ($cont < 4) {
                $pregunta = explode(",", $_POST["pregunta"]);
                $comprobar = $pg->comprobar($_POST["rsp"], $pregunta[1]);

                // Comprobar respuesta y mostrar siguiente pregunta
                if ($comprobar == false) {
                    mostrarFormulario($_POST["pregunta"], $_POST["idPreg"], "env", $cont);
                } else {
                    $cont++;
                    mostrarFormulario($arraypreg[$numpreg[$cont]], $numpreg[$cont], "env", $cont);
                }
            } else {
                // Finalizar el juego y redirigir al ranking
                $usuario = $_GET["user"];
                if ($us->tiempofin($usuario)) {
                    header("location:ranking.php");
                }
            }
        } else {
            // Mostrar primera pregunta
            mostrarFormulario($arraypreg[$numpreg[$cont]], $numpreg[$cont], "env", $cont);
        }
    ?>
</body>
</html>
