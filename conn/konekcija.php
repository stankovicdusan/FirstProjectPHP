<?php
    $serverBaze = "localhost";
    $nazivBaze = "2017200986";
    $user = "root";
    $pass = "";

    try{
        $konekcija = new PDO("mysql:host=$serverBaze;dbname=$nazivBaze",$user,$pass);
        $konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $konekcija->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>