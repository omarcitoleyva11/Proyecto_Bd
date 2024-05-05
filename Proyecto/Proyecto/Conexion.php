<?php
function connect(){
//Cambia las credenciales, si no jala, quitale el puerto
$mysqli = new mysqli("localhost","root","Joahan11.","mydb","3306"); #Si note jala borra el puerto "3306"
if ($mysqli->connect_errno !=0) {
    return $mysqli->connect_error;
}else{
    return $mysqli;
}
}