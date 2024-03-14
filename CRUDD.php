<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->conectar();

$_POST = json_decode(file_get_contents("php://input"), true);

function permisos() {  
  if (isset($_SERVER['HTTP_ORIGIN'])){
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
      header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
      header('Access-Control-Allow-Credentials: true');      
  }  
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))          
        header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
    exit(0);
  }
}
permisos();

//recibimos los valores
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$precio = (isset($_POST['precio'])) ? $_POST['precio'] : '';
$tamano = (isset($_POST['tamano'])) ? $_POST['tamano'] : '';

switch($opcion){
	case 1://muestra los datos
        $consulta = "SELECT nombre, descripcion, precio, cantidad FROM articulos";
        $resultado = $Conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2://crear nuevo registro
        $consulta = "INSERT INTO articulos (descripcion, precio, cantidad) VALUES('$descripcion', '$precio') ";
        $resultado = $Conexion->prepare($consulta);
        $resultado->execute();                
        break;
    case 3:
        $consulta = "UPDATE articulos SET descripcion='$descripcion', precio='$precio' WHERE nombre='$nombre' ";		
        $resultado = $Conexion->prepare($consulta);
        $resultado->execute();                        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 4://borrar registro
        $consulta = "DELETE FROM articulos WHERE nombre='$nombre' ";		
        $resultado = $Conexion->prepare($consulta);
        $resultado->execute();                           
        break;         
    
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;

