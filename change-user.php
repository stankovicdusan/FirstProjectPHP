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
    include "conn/konekcija.php";

    if(!isset($_GET['id'])){
        header("Location: admin.php");
    }

    $id = $_GET['id'];
    $upit = "SELECT * FROM korisnik WHERE id_korisnik = :id";
    $rezultat = $konekcija->prepare($upit);
    $rezultat->bindParam(":id", $id);

    $rezultat->execute();

    $korisnik = $rezultat->fetch(); 

    if($korisnik==null){
        header("Location: admin.php");
    }
?>
<div id="form-sell">
            <form method="post" action="change.php" class="order11">
                <table>
                    <input type="hidden" name="id" value="<?= $korisnik->id_korisnik ?>"/>
                    <tr>
                        <label>First name:</label><br/>
                        <input type="text" name="firstname" value="<?= $korisnik->ime ?>" placeholder="Your name..." class="kontakt-form"/><br/>
                    </tr>
                    <tr>
                        <label>Last name:</label><br/>
                        <input type="text" name="lastname" value="<?= $korisnik->prezime ?>" placeholder="Your lastname..." class="kontakt-form" /><br/>
                    </tr>
                    <tr>
                        <label>Username:</label><br/>
                        <input type="text" name="username" value="<?= $korisnik->username ?>" placeholder="Your username..." class="kontakt-form" /><br/>
                    </tr>
                    <tr>
                        <label>E-mail:</label><br/>
                        <input type="text" name="email" value="<?= $korisnik->email ?>" placeholder="Your e-mail..." class="kontakt-form"/><br/>
                    </tr>
                    <tr>
                        <label>Password:</label><br/>
                        <input type="text" name="password" value="<?= $korisnik->password ?>" placeholder="Your password..." class="kontakt-form"/><br/>
                    </tr>
                        </table>
                        <label>Role:</label><br/>
                        <select name="uloga" class="list">
                            <option value="0">Choose</option>
                        <?php 
                            include "conn/konekcija.php";

                            $upit = "SELECT * FROM uloga";
                            $uloga = $konekcija->query($upit)->fetchAll();

                            foreach($uloga as $ul):
                                if($ul->id_uloga == $korisnik->uloga_id) :
                        ?>
                        <option selected value="<?= $ul->id_uloga ?>"><?= $ul->naziv ?></option>
                            <?php 
                                else: 
                            ?>
                        <option value="<?= $ul->id_uloga ?>"><?= $ul->naziv ?></option>
                            <?php
                                endif;
                            endforeach;
                            ?>
                    </select><br/><br/>
                    <input type="submit" name="saveUserInfo" value="Change" class="button1"/>
                    <br/>
            </form>
            </div>
<?php
    include "views/footer.php";
?>