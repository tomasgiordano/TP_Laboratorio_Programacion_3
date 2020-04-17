<?php
    require_once("./clases/fabrica.php");
    $EmpleadoString = array();

    $e;

    $ar = fopen("archivos/empleados.txt", "r");
    while(!feof($ar))
    {
        $EmpleadoString = explode('-',fgets($ar),7);
        $EmpleadoString[0]=trim($EmpleadoString[0]);
        if($EmpleadoString[0]==""){
            break;
        }
        $e = new Empleado($EmpleadoString[0],$EmpleadoString[1],$EmpleadoString[2],$EmpleadoString[3],$EmpleadoString[4],$EmpleadoString[5],$EmpleadoString[6]);
        $Legajo=$e->GetLegajo();
        echo $e->ToString()."<pre style='display:inline'>&#09;</pre>".'<a href="./eliminar.php/?legajo='.$Legajo.'">Eliminar</a><br>';
        //$EmpleadoString=array();

    }
    fclose($ar);
    echo '<h2><a href="index.html">Volver al index</a></h2>';
