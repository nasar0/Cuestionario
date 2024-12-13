<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
    <link rel="stylesheet" href="style.css"> 
    <title>Document</title>
</head>
<body>
    <?php
        require_once 'usuarios.php';     // Incluye la clase usuarios 
        require_once "preguntas.php";  // Incluye la clase preguntas 
        
        if (isset($_POST["env"])) {  // Verifica si se envió el formulario 
            $db = new mysqli('localhost', 'root', '', 'cuestionario'); // Conexión a la base de datos 
            $usu = new usuarios($db);  // Crea el objeto usuarios 
            $reg = $usu->registro($_POST["usu"], date("Y-m-d H:i:s"));  // Registra el usuario 
            
            if ($reg) {  // Si el registro fue exitoso 
                header("location:juego.php?user=" . $_POST["usu"]);  // Redirige al juego 
            }
        } else {  // Si no se envió el formulario 
            ?>
            <div class="container"> 
                <div class="wrapper"> 
                <form action="" method="post" id="registro"> 
                        <h1>login</h1>
                        <div class="input-box"> 
                            <input type="text" placeholder="Usuario" name="usu" required> 
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



