<?php
    require_once "./clases/fabrica.php";

    $Empleado = new Empleado($_POST["Nombre"],$_POST["Apellido"],$_POST["Dni"],$_POST["Sexo"],$_POST["Legajo"],$_POST["Sueldo"],$_POST["radios"]);
    $Fabrica = new Fabrica("MiFabrica S.A.",7);
    $Fabrica->TraerDeArchivo("empleados.txt");

    if($Fabrica->AgregarEmpleado($Empleado)){
        $Fabrica->GuardarEnArchivo("empleados.txt");
        echo '<h2><a href="mostrar.php">Mostrar empleados</a></h2>';
    }
    else
    {
        echo "No pudo agregarse el empleado a la fabrica";
        echo '<h2><a href="index.html>Volver al formulario</a></h2>';
    }