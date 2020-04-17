<?php
    abstract class Persona
    {
      private $_apellido;
      private $_dni;
      private $_nombre;
      private $_sexo;

      public function __construct($_nombre,$_apellido,$_dni,$_sexo)
      {
        $this->_apellido=$_apellido;
        $this->_dni=$_dni;
        $this->_nombre=$_nombre;
        $this->_sexo=$_sexo;
      }

      public function GetApellido()
      {
        return $this->_apellido;
      }

      public function GetDni()
      {
        return $this->_dni;
      }

      public function GetNombre()
      {
        return $this->_nombre;
      }

      public function GetSexo()
      {
        return $this->_sexo;
      }

      public function Hablar($idioma=array()){
        $cadena="El empleado habla ";

        foreach ($idioma as $valor) {
            $cadena = $cadena . $valor . ", ";
        }
        $cadena = substr($cadena,0,-2);
        return $cadena;
    }

      public function ToString()
      {
        return $this->_nombre."-".$this->_apellido."-".$this->_sexo."-".$this->_dni;
      }
    }  
?>
