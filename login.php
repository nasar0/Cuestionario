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
             header("location:juego.php");
        }else{
            ?>
            <div class="container">
                <div class="wrapper">
                    
                </div>
            </div>
            <form action="" method="post" id="registro">
                        <h1>login</h1>
                        <div class="input-box">
                            <input type="text" placeholder="Usuario" name="name" require>
                            <i class='bx bx-user'></i>
                        </div>
                        <input type="submit" class="btn" name="env" value="Iniciar">
                    </form>
            <?php
        }
    ?>
</body>
</html>



