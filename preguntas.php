<?php
    class pregunta{
        private $db;
        private $id;
        private $pregunta;
        private $respuesta;
        private $norespuestas;
        public function __construct($db,$id="",$pregunta="",$respuesta="",$norespuestas="") { 
            $this->db = $db;
            $this->id = $id;
            $this->pregunta = $pregunta;
            $this->respuesta = $respuesta;
            $this->norespuestas = $norespuestas;
        }
        public function getDatos(){
            $sentencia = "select * from pregunta";
            $consulta = $this->db->prepare($sentencia);
            $consulta->bind_result($this->id,$this->pregunta,$this->respuesta,$this->norespuestas)
            $consulta->execute();
        }
        public function comprobar($texto,$idU){
            $sentencia = "SELECT respuesta FROM preguntas WHERE id = ?;";
            $consulta = $this->db->prepare($sentencia);
            if ($consulta) {
                $consulta->bind_param("i", $idU); 
                $consulta->bind_result($this->respuesta)
                $consulta->execute();
                if ($consulta->fetch() ) {
                   return $result = strcmp($texto, $this->resultado) == 0 ? true : false;  
                }
            }    
        }
    }
?>