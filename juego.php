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
        require_once "preguntas.php";
        $db = new mysqli('localhost', 'root', '', 'cuestionario');
        $pg= new preguntas($db);
        $db->set_charset("utf8");
        $arraypreg = $pg->getDatos() ;
        $numpreg = [];
        $cont=0;
        for ($i = 0; $i < 5; $i++) {
            do {
                $numAleatorio = mt_rand(0, 9);
            } while (in_array($numAleatorio, $numpreg)); 
            array_push($numpreg, $numAleatorio);
        }

        
        if (isset($_POST["env"])){
            $pregunta= explode(",",$_POST["pregunta"]);
            echo $pregunta[0];
            echo $pregunta[1];
            echo "id preg: ".$_POST["idPreg"];
            $comprobar = $pg->comprobar($_POST["rsp"],$pregunta[1]);
            
            if($comprobar==false) {
                
            }
            if ($comprobar==true) {
                
            }
        }else {
            echo '<div class="container">
                <div class="wrapper">
                    <form action="" method="post" id="registro">
                        <label for="">'. explode(",",$arraypreg[$numpreg[$cont]])[0] . '<label><br>
                        <input type="text" placeholder="respuesta" name="rsp">
                        <input type="submit" class="btn" name="env" value="Responder">
                        <input type="hidden" name="pregunta" value="' .$arraypreg[$numpreg[$cont]]. '">
                        <input type="hidden" name="idPreg" value="' .$numpreg[$cont]+1.. '">
                    <form>
                </div>
             </div>';
        }

        function generarPreg($cont,$arraypreg,$numpreg){
            echo '<div class="container">
                <div class="wrapper">
                    <form action="" method="post" id="registro">
                        <label for="">'. explode(",",$arraypreg[$numpreg[$cont]])[0] . '<label><br>
                        <input type="text" placeholder="respuesta" name="rsp">
                        <input type="submit" class="btn" name="env" value="Responder">
                        <input type="hidden" name="pregunta" value="' .$arraypreg[$numpreg[$cont]]. '">
                        <input type="hidden" name="idPreg" value="' .$numpreg[$cont]+1.. '">
                    <form>
                </div>
             </div>';
        }

        
    ?>
    
</body>
</html>