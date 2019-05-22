<?php
if(isset($_POST['saveUserInfo'])){

    $id = $_POST['id'];

    $ime = $_POST['firstname'];
    $prezime = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $uloga = $_POST['uloga'];

    include "conn/konekcija.php";

    $upit = "UPDATE korisnik SET ime = :ime, prezime = :prezime, username = :username, email = :email, password = :password, uloga_id = :uloga WHERE id_korisnik = :id";

    $rezultat = $konekcija->prepare($upit);

    $rezultat->bindParam(":id", $id);

    $rezultat->bindParam(":ime", $ime);
    $rezultat->bindParam(":prezime", $prezime);
    $rezultat->bindParam(":username", $username);
    $rezultat->bindParam(":email", $email);
    $rezultat->bindParam(":password", $password);
    $rezultat->bindParam(":uloga", $uloga);

    $rezultat->execute();
    header("Location: admin.php");
}