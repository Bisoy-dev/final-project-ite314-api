<?php 
    header('Content-Type','x-www-form-urlencoded'); 
    include "connection.php"; 

    $title = $_POST['songTitle'];
    $artist = $_POST['artistName'];
    $genre = $_POST['genre'];
    $recordLabel = $_POST['recordLabel'];
    $releaseDate = $_POST['releaseDate'];
    $album = $_POST['album'];

    $fileName = $_FILES['trackFile']['name'];
    $tempPath = $_FILES['trackFile']['tmp_name'];
    $size = $_FILES['trackFile']['size']; 

    $folder = "../tracks/"; 
    $validExt = array("mp3"); 

    $file = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); 
    if(in_array($file, $validExt)){
        move_uploaded_file($tempPath, $folder . $fileName);
    } 

    $sql = "INSERT INTO tblsong(songTitle, artist, album, releaseDate, recordLabel, genre, trackFile) VALUES(:title, :artist, :album, :releaseDate, :recordLabel, :genre, :trackFile)"; 

    $stmt = $conn->prepare($sql); 
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":artist", $artist);
    $stmt->bindParam(":album", $album);
    $stmt->bindParam(":releaseDate", $releaseDate);
    $stmt->bindParam(":recordLabel", $recordLabel); 
    $stmt->bindParam(":genre", $genre);
    $stmt->bindParam(":trackFile", $fileName); 

    $reult = 0;
    if($stmt->execute()){
        if($stmt->rowCount() > 0){
            $reult = 1;
        }
    } 

    $stmt = null;
    $conn = null; 

    echo $reult;
?>