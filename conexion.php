<?php
    
    class Conexion{
        private $servidor = "localhost";
        //private $dbName = "album";
        private $usuario = "root";
        private $contrasenia = "";
        private $conexion;

        public function  __construct(){
            try{
                $this->conexion = new PDO("mysql:host=$this->servidor;dbname=album",$this->usuario,$this->contrasenia);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            }catch(PDOExcepction $e){
                return "Falla de conexion".$e;
            }
        }

        // INSERTAR/BORRAR/ACTUALIZAR
        public function ejecutar($sql){
            $this->conexion->exec($sql);
            return $this->conexion->lastInsertId();
        }

        public function consultar($sql){
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll();
        }
    }

?>