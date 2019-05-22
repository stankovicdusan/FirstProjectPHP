<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    include "conn/konekcija.php";

    $upit = "DELETE FROM korisnik WHERE id_korisnik = :id";
    $rezultat = $konekcija->prepare($upit);

    $rezultat->bindParam(":id", $id);

    $rezultat->execute();
    
    header("Location: admin.php");
}
?>