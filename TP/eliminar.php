<?php 
    require_once("./clases/fabrica.php");

    $ar = fopen("archivos/empleados.txt", "r");
    $loEncontro = false;
    $emp;
    while(!feof($ar))
    {
        $EmpleadoString = explode('-',fgets($ar));
        $EmpleadoString[0]=trim($EmpleadoString[0]);
        if($EmpleadoString[0] != ""){
            if($EmpleadoString[4] == $_GET["legajo"]){
                $EmpleadoString[6] = trim($EmpleadoString[6], "\r\n");
                $emp = new Empleado($EmpleadoString[1], $EmpleadoString[0],
                $EmpleadoString[2], $EmpleadoString[3], $EmpleadoString[4], $EmpleadoString[5],
                $EmpleadoString[6]);
                $loEncontro = true;    
                break;
            }
        }
        
    }
    
    if($loEncontro)
    {
        $Fabrica = new Fabrica("MiFabrica S.A.",7);
        $Fabrica->TraerDeArchivo("empleados.txt");
        if($Fabrica->EliminarEmpleado($emp))
        {
            $Fabrica->GuardarEnArchivo("empleados.txt");
            echo "<h2>El empleado fue eliminado</h2>";
        }     
    }
    else
    {
        echo"<h2>No se pudo encontrar al empleado en la fabrica</h2>";
    }

    echo '<br><h2><a href="./mostrar.php">Mostrar empleados</a></h2>';
    echo '<br><h2><a href="./index.html">Volver al formulario</a></h2>';
    
    