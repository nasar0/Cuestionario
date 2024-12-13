<?php
    class preguntas{
        //Atributos de clase
        private $db;
        private $id;
        private $pregunta;
        private $respuesta;
        private $norespuestas;
        // Constructor de la clase
        public function __construct($db, $id = "", $pregunta = "", $respuesta = "", $norespuestas = "") { 
            $this->db = $db; 
            $this->pregunta = $pregunta; 
            $this->respuesta = $respuesta; 
            $this->norespuestas = $norespuestas; 
        }

        // Obtiene todas las preguntas desde la base de datos
        public function getDatos(){
            $sentencia = "SELECT * FROM preguntas "; 
            $consulta = $this->db->prepare($sentencia); 
            $consulta->bind_result($this->id, $this->pregunta, $this->respuesta, $this->norespuestas); 
            $consulta->execute(); 
            $pregunta = []; 
            while ($consulta->fetch()) { 
                array_push($pregunta, $this->__toString()); 
            }
            return $pregunta; 
        }

        // Convierte el objeto a un formato string (pregunta, id)
        public function __toString() {
            return $this->pregunta . "," . $this->id . "<br>"; 
        }

        // Compara la respuesta del usuario con la respuesta correcta
        public function comprobar($texto, $idU){
            $sentencia = "SELECT respuesta FROM preguntas WHERE id = ?;"; 
            $consulta = $this->db->prepare($sentencia); 
            if ($consulta) {
                $consulta->bind_param("i", $idU); 
                $consulta->bind_result($this->respuesta);
                $consulta->execute(); 
                if ($consulta->fetch()) {
                    return $result = strcmp($texto, $this->respuesta) == 0 ? true : false; 
                }
            }    
        }
    }
?>
