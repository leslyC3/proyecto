<?php
 class conexion{
    public static function conectar(){
        $servername = "127.0.0.1";
        $username = "mydb:msql://localhost:3036/Pasteleria";
        $password = "bigtimerush12345!!@@#";
        $dbname = "Pasteleria";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        
    }
 }