
<?php
    class usuarios{
        //Atributos de clase
        private $db; 
        private $user; 
        private $tiempo_inicio; 
        private $tiempo_final; 

        // Constructor
        public function __construct($db, $user = "", $tiempo_inicio = 0, $tiempo_final = 0) { 
            $this->db = $db;
            $this->user = $user;
            $this->tiempo_inicio = $tiempo_inicio;
            $this->tiempo_final = $tiempo_final;
        }
        
        // Registra un nuevo usuario
        public function registro($usu, $tmp){
            try {
                $sentencia = "INSERT INTO usuario (user, tiempo_inicio, tiempo_final) VALUES (?,?,null);";
                $consulta = $this->db->prepare($sentencia);
                if ($consulta) {
                    $consulta->bind_param("ss", $usu, $tmp);
                    $consulta->execute();
                    if ($consulta->affected_rows > 0) {
                        echo "Te has registrado correctamente";
                        return true;
                    }
                }
            } catch (Exception $e) {
                header("Refresh: 7");
                echo "Error: ".$e->getMessage()."<br>";
                echo "<h1>Serás retornado al origen, pues tal nombre se halla desprovisto de legitimidad y no merece ser admitido en el registro de los designios válidos.</h1>";
                return false;
            }
        }

        // Actualiza el tiempo final del usuario
        public function tiempofin($usu){
            $this->tiempo_final = date("Y-m-d H:i:s");
            $sentencia = "UPDATE usuario SET tiempo_final=? where user=?";
            $consulta = $this->db->prepare($sentencia);
            if ($consulta) {
                $consulta->bind_param("ss", $this->tiempo_final, $usu);
                if ($consulta->execute()) {
                    return true;
                }
            }
        }

        // Obtiene el ranking de usuarios
        public function elo(){
            $nombre = "";
            $tiempo = "";
            $sentencia = "SELECT user, tiempo_final - tiempo_inicio AS tiempo FROM usuario WHERE tiempo_final IS NOT NULL ORDER BY tiempo ASC";
            $consulta = $this->db->prepare($sentencia);
            $cont = 0;
            $consulta->bind_result($nombre, $tiempo);
            if ($consulta->execute()) {
                $elo = [];
                while ($consulta->fetch()) {
                    $elo["$nombre"] = $tiempo;
                }
            }
            return $elo;
        }
    }
?>
