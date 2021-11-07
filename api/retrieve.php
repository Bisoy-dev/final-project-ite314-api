<?php 
    header('Content-Type','application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');
    
    include "connection.php"; 

    $sql = "SELECT * FROM tblsong"; 

    $stmt = $conn->prepare($sql); 
    $result = ""; 

    if($stmt->execute()){
        if($stmt->rowCount() > 0){
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            $result = json_encode($data, JSON_PRETTY_PRINT);
        }
    } 

    $stmt = null;
    $conn = null;

    echo $result;
?>