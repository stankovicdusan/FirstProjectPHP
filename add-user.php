<?php
	session_start();
	include "views/header.php";
	include "views/menu.php";

	if(isset($_SESSION['korisnik'])){
    	if($_SESSION['korisnik']->uloga_id != 2){
    		header("Location: index.php");
    	}
    }else{
    	header("Location: index.php");
    }
?>
<?php
    if(isset($_POST['addUser'])){
        $ime = $_POST['firstname'];
        $prezime = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $uloga = $_POST['uloga'];

        include "conn/konekcija.php";

        $upit = "SELECT * FROM korisnik WHERE email = :email";
            
            $rezultat = $konekcija->prepare($upit);
            $rezultat->bindParam(':email', $email);

            $rezultat->execute();

            $korisnici = $rezultat->fetch();

            if($korisnici != null) {
                echo "Vec postoji korisnik sa tim email!";
            } else {
                $upit1 = "INSERT INTO korisnik VALUES('',:ime, :prezime, :username, :email, :password, :uloga)";

                $rezultat1 = $konekcija->prepare($upit1);
                $rezultat1->bindParam(":ime", $ime);
                $rezultat1->bindParam(":prezime", $prezime);
                $rezultat1->bindParam(":username", $username);
                $rezultat1->bindParam(":email", $email);
                $rezultat1->bindParam(":password", $password);
                $rezultat1->bindParam(":uloga", $uloga);

                $izvrseno = $rezultat1->execute();
                if($izvrseno){
                    echo "Upisan korisnik u BAZU!";
                    echo "<script type='text/javascript'> document.location = 'admin.php';   </script>";
                } else {
                    echo "Greska pri unosu u bazu!";
                }
            }
        }

?>
<div id="form-sell">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="order11">
                <table>
                    <tr>
                <label>First name:</label><br/>
                <input type="text" name="firstname" placeholder="Your name..." class="kontakt-form"/><br/>
                    </tr>
                    <tr>
                <label>Last name:</label><br/>
                <input type="text" name="lastname" placeholder="Your lastname..." class="kontakt-form" /><br/>
                    </tr>
                    <tr>
                <label>Username:</label><br/>
                <input type="text" name="username" placeholder="Your username..." class="kontakt-form" /><br/>
                    </tr>
                    <tr>
                <label>E-mail:</label><br/>
                <input type="text" name="email" placeholder="Your e-mail..." class="kontakt-form"/><br/>
                    </tr>
                    <tr>
                <label>Password:</label><br/>
                <input type="text" name="password" placeholder="Your password..." class="kontakt-form"/><br/>
                    </tr>
                </table>
                <label>Role:</label><br/>
                <?php 
                        include "conn/konekcija.php";

                        $upit = "SELECT * FROM uloga";
                        $rezultat = $konekcija->query($upit)->fetchAll();        
                ?>
                <select name="uloga" class="list">
                    <option value="0">Choose</option>
                    <?php foreach($rezultat as $red) : ?>
                        <option value="<?= $red->id_uloga ?>"><?= $red->naziv ?></option>
                    <?php endforeach; ?>
                </select><br/><br/>
                <input type="submit" name="addUser" value="Add" class="button1"/>
                <br/>
            </form>
        </div>
<?php
    include "views/footer.php";
?>