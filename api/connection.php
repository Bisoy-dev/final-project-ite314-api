<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "beatvibedb"; 

    try{
        $conn = new PDO("mysql:host=$server;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $ex){
        echo "Connection Failed ".$ex->getMessage();
        die;
    }
?>