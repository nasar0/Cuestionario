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
            $sentencia = "SELECT user FROM usuario WHERE user=?;";
            $consulta = $this->db->prepare($sentencia);
            if ($consulta) {
                $consulta->bind_param("s",$usu);
                $consulta->bind_result($this->user)
                $consulta->execute();
                $consulta->fetch();
                if (!strcmp($usu, $this->user)) {
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
                }else{
                    echo "ESE USUARIO YA EXISTE , PRUEBA INICIAR SESION";
                }

            }
        } 
    }
?>