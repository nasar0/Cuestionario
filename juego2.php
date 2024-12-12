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
require_once 'usuarios.php';
require_once 'preguntas.php';

$db = new mysqli('localhost', 'root', '', 'cuestionario');
$pg = new preguntas($db);
$db->set_charset("utf8");

$arraypreg = $pg->getDatos();
$numpreg = [];

// Generar preguntas aleatorias solo una vez
if (!isset($preguntasGeneradas)) {
    $preguntasGeneradas = true;
    for ($i = 0; $i < 5; $i++) {
        do {
            $numAleatorio = mt_rand(0, 9);
        } while (in_array($numAleatorio, $numpreg));
        array_push($numpreg, $numAleatorio);
    }
}

// Función para manejar el contador estático y mostrar el formulario
function mostrarFormularioConContador($pregunta, $idPreg, $nombreEnv) {
    static $cont = 0;  // Declaración de la variable static
    echo '<div class="container">
            <div class="wrapper">
            Pregunta número: ' . ($cont + 1) . '
                <form action="" method="post" id="registro">
                    <label for="">' . explode(",", $pregunta)[0] . '</label><br>
                    <input type="text" placeholder="respuesta" name="rsp">
                    <input type="hidden" name="pregunta" value="' . $pregunta . '">
                    <input type="hidden" name="idPreg" value="' . $idPreg . '">
                    <input type="submit" class="btn" name="' . $nombreEnv . '" value="Responder">
                </form>
            </div>
        </div>';
    $cont++;
}

// Lógica para mostrar las preguntas según el formulario enviado
if (isset($_POST["env"])) {
    $pregunta = explode(",", $_POST["pregunta"]);
    $comprobar = $pg->comprobar($_POST["rsp"], $pregunta[1]);
    if ($comprobar == false) {
        mostrarFormularioConContador($_POST["pregunta"], $_POST["idPreg"], "env");
    }
} else {
    mostrarFormularioConContador($arraypreg[$numpreg[0]], $numpreg[0], "env");
}

if (isset($_POST["env2"])) {
    $pregunta = explode(",", $_POST["pregunta"]);
    $comprobar = $pg->comprobar($_POST["rsp"], $pregunta[1]);
    if ($comprobar == false) {
        mostrarFormularioConContador($_POST["pregunta"], $_POST["idPreg"], "env2");
    }
} else {
    mostrarFormularioConContador($arraypreg[$numpreg[1]], $numpreg[1], "env2");
}

if (isset($_POST["env3"])) {
    $pregunta = explode(",", $_POST["pregunta"]);
    $comprobar = $pg->comprobar($_POST["rsp"], $pregunta[1]);
    if ($comprobar == false) {
        mostrarFormularioConContador($_POST["pregunta"], $_POST["idPreg"], "env3");
    }
} else {
    mostrarFormularioConContador($arraypreg[$numpreg[2]], $numpreg[2], "env3");
}
?>

</body>
</html>
