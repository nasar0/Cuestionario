<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        #bd {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #b7328d, #ac18c0);
            margin: 0;
            padding: 0;
        }

        table {
            color: #fff;
            font-size: 14px;
            table-layout: fixed;
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        th {
            padding: 20px 15px;
            font-weight: 700;
            text-transform: uppercase;
            background-color: rgba(255, 255, 255, 0.2);
            text-align: left;
        }

        td {
            padding: 15px;
            border-bottom: solid 1px rgba(255, 255, 255, 0.2);
        }

        tbody tr {
            cursor: pointer;
        }

        tbody tr:hover {
            background: rgba(243, 103, 199, 0.4);
        }
    </style>
</head>

<body>
    <div id="bd">
        <?php
            require_once 'usuarios.php'; 
            $db = new mysqli('localhost', 'root', '', 'cuestionario'); 
            $us = new usuarios($db); 
            $rank =  $us->elo(); 
            $cont = 1; 
            echo "<table>";
            echo "<tr><th>Numero</th><th>usuario</th><th>Tiempo</th></tr>"; 

            foreach ($rank as $value => $v) { // Itera sobre el ranking
                echo "<tr>"; 
                echo "<td>" . $cont++ . "</td>"; 
                echo "<td>" . $value . "</td>"; 
                // esto se bugea no se porque por eso hago esa burrada
                if ($v - 40 < 0) {
                    echo "<td>" . $v . " Segundos</td>";
                } else {
                    echo "<td>" . $v - 40 . " Segundos</td>"; 
                }
                echo "</tr>"; 
            }

            echo "</table>"; 
        ?>


    </div>
</body>

</html>