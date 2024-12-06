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
        if (isset($_POST["env"])) {
            $db = new mysqli('localhost', 'root', '', 'cuestionario');
            $pg= new preguntas($db);
            $arraypreg = $pg->getDatos(); 
            $numpreg=[];
            $cont=0;
           for ($i=0; $i < 5; $i++) { 
                $numAleatorio= mt_rand(0,9);
                array_push($numpreg,$numAleatorio);
            }
            foreach ($numpreg as $num) {
                echo  $arraypreg[$num];
                ?>
                <div class="input-boxD">
                    <input type="text" placeholder="Respuesta" name="respuesta[<?php echo $num; ?>]" require>
                    <i class='bx bx-user'></i>
                </div>
                <?php
            }
            ?>
            <input type="submit" class="btn" name="respuesta" value="Iniciar">
            <?php
            

        }else{
            ?>
            <div class="container">
                <div class="wrapper">
                    <form action="" method="post" id="registro">
                        <h1>login</h1>
                        <div class="input-box">
                            <input type="text" placeholder="Usuario" name="name" require>
                            <i class='bx bx-user'></i>
                        </div>
                        <input type="submit" class="btn" name="env" value="Iniciar">
                    </form>
                </div>
            </div>
            <?php
        }
    ?>
</body>
</html>

<?php
$numpreg = []; // Inicializar el array vacío

// Bucle externo para generar 5 números aleatorios
for ($i = 0; $i < 5; $i++) {
    $numAleatorio = mt_rand(1, 10); // Generar un número aleatorio entre 1 y 10

    // Comprobar si el número ya existe en el array $numpreg
    while (in_array($numAleatorio, $numpreg)) {
        // Si el número aleatorio ya existe, generamos uno nuevo
        $numAleatorio = mt_rand(1, 10);
    }

    // Almacenar el número aleatorio en el array
    $numpreg[] = $numAleatorio;
}

// Mostrar el resultado
print_r($numpreg);
?>



