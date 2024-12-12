<?php
    class usuarios{
        private $db;
        private $user;
        private $tiempo_inicio;
        private $tiempo_final;
        public function __construct($db,$user="",$tiempo_inicio=0,$tiempo_final=0) { 
            $this->db = $db;
            $this->user = $user;
            $this->tiempo_inicio = $tiempo_inicio;
            $this->tiempo_final = $tiempo_final;
        }
        
        public function registro($usu){
            try {
                $sentencia = "INSERT INTO usuario (user, tiempo_inicio, tiempo_final) VALUES (?,0,null);";
                $consulta = $this->db->prepare($sentencia);
                if ($consulta) {
                    $consulta->bind_param("s",$usu);
                    $consulta->execute();
                    if ($consulta->affected_rows > 0) {
                        echo "Te has registrado correctamente";
                        return true;
                    } else {
                        echo "Error al insertar el usuario.";
                        return false;
                    }
                }
            } catch (Exception  $e) {
                header("Refresh: 7");
                echo "ocurrio el error: ".$e->getMessage()."<br>";
                echo "<h1>Serás retornado al origen, pues tal nombre se halla desprovisto de legitimidad y no merece ser admitido en el registro de los designios válidos.</h1>";
                return false;
            }
        }

    }
?>