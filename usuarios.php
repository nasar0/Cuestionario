<?php
    class usuario{
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
                    } else {
                        echo "Error al insertar el usuario.";
                    }
                }
            } catch (Exception  $e) {
                echo "ocurrio el error: ".$e->getMessage();;
            }
        }

    }
?>