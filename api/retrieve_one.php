<?php
    header('Content-Type','application/json');
    include "connection.php"; 

    $id = $_GET['id'];
    $sql = "SELECT * FROM tblsong WHERE id = $id"; 

    $stmt = $conn->prepare($sql);
    $result = ""; 

    if($stmt->execute()){
        if($stmt->rowCount() > 0){
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $result = json_encode($data, JSON_PRETTY_PRINT);
        }
    } 

    $stmt = null;
    $conn = null; 

    echo $result;
?>