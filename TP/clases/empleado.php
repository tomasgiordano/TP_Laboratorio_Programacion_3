<?php
    require_once "./clases/persona.php";
    class Empleado extends Persona
    {
        private $_legajo;
        private $_sueldo;
        private $_turno;

        public function __construct($_nombre,$_apellido,$_dni,$_sexo,$_legajo,$_sueldo,$_turno)
        {
            parent::__construct($_nombre,$_apellido,$_dni,$_sexo);
            $this->_legajo=$_legajo;      
            $this->_sueldo=$_sueldo;
            $this->_turno=$_turno;
        }

        public function GetLegajo()
        {
            return $this->_legajo;
        }

        public function GetSueldo()
        {
            return $this->_sueldo;
        }

        public function GetTurno()
        {
            return $this->_turno;
        }

        public function Hablar($idioma=array())
        {
            parent::Hablar($idioma);
        }

        public function ToString()
        {
            return parent::ToString(). "-" . $this->_legajo . "-" . $this->_sueldo . "-" . $this->_turno;
        }
       
    }
?>