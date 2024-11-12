<?php
require_once ('dat/datos.php');
/**
 *  Devuelve true si el código del usuario y contraseña se 
 *  encuentra en la tabla de usuarios
 *  @param $login : Código de usuario
 *  @param $clave : Clave del usuario
 *  @return true o false
 */
function userOk($login,$clave):bool {
    global $usuarios;
    $resultado="";
    $contador=0;
    foreach ($usuarios as $key => $value) {
        if ($login== $key && $value[1] == $clave) {
            return true;
        }
       
    }
    
        
    return false;
}

/**
 *  Devuelve el rol asociado al usuario
 *  @param $login: código de usuario
 *  @return ROL_ALUMNO o ROL_PROFESOR
 */
function getUserRol($login){
    global $usuarios;
 $rol = $usuarios[$login][2];   
    return $rol;
}

/**
 *  Muestra las notas del alumno indicado.
 *  @param $codigo: Código del usuario
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */
function verNotasAlumno($codigo):String{
    $msg="";
    global $nombreModulos;
    global $notas;
    global $usuarios;
    $contador=0;
    $msg .= " Bienvenido/a alumno/a: ". $usuarios[$codigo][0];
    $msg .= "<table>";
    foreach ($notas[$codigo] as $key => $value) {
        $msg .= "<tr><td>".$nombreModulos[$contador]."</td><td>$value</td>";
        $contador++;
    }
    $msg .= "</table>";
    return $msg;
}

/**
 *  Muestra las notas de todos alumnos. 
 *  @param $codigo: Código del profesor
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */
function verNotaTodas ($codigo): String {
    $msg="";
    global $nombreModulos;
    global $notas;
    global $usuarios;
    $contador=0;
    $msg .= " Bienvenido Profesor: ". " D.".$usuarios[$codigo][0];
    $msg .= "<table>";
    foreach ($usuarios as $key => $value) {
        if ($value[2] == ROL_ALUMNO) {
            $msg .= "<tr><td>".$value[0]."</td>";
            $msg .= "</tr>";  
            foreach ($notas[$key] as $key2 => $value) {
                $msg .= "<tr><td>".$nombreModulos[$contador]."</td><td>$value</td>";
                $msg .= "</tr>";  
               $contador++;
               if ($contador==4) {
                $contador=0;
               }
            }  
        }
    }
    $msg .= "</table>";
    return $msg;
}   
