<?php
	session_start();

    $cookie_name = "username";
    $cookie_value = "Uspesno ste pokrenuli kolacic!";
    
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

	include "views/header.php";
	include "views/menu.php";

	if(isset($_SESSION['korisnik'])){
    	if($_SESSION['korisnik']->uloga_id != 1 && $_SESSION['korisnik']->uloga_id != 2){
    		header("Location: index.php");
    	}
    }else{
    	header("Location: index.php");
    }
?>
	<!-- deo za usera -->

            <?php
                $nizSelect = [
                    "VISA" => "VISA",
                    "MASTERCARD" => "MASTERCARD",
                    "MAESTRO" => "MAESTRO",
                    "AMERICANEXPRESS" => "AMERICANEXPRESS"
                ];      
            ?>
            <h2 class="order11">You can order here:</h2>
            <?php 
                if(!isset($_COOKIE[$cookie_name])) {
                    echo "Cookie named '" . $cookie_name . "' is not set!";
                } else {
                    echo "Cookie '" . $cookie_name . "' is set!<br>";
                    echo "Value is: " . $_COOKIE[$cookie_name];
                }
            ?>
            <form method="post" action="user-order.php" class="order1">
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
                <label>Adress:</label><br/>
                <input type="text" name="adress" placeholder="Your adress..." class="kontakt-form" /><br/>
                    </tr>
                    <tr>
                <label>Phone number:</label><br/>
                <input type="text" name="phonenumber" placeholder="Your phonenumber..." class="kontakt-form"/><br/>
                    </tr>
                    <tr>
                <label>E-mail:</label><br/>
                <input type="text" name="email" placeholder="Your e-mail..." class="kontakt-form"/><br/>
                    </tr>
                </table>
                <label>Product:</label><br/>
                <?php 
                        include "conn/konekcija.php";

                        $upit = "SELECT naslov FROM proizvod";
                        $rezultat = $konekcija->query($upit)->fetchAll();        
                ?>
                <select name="lista1" class="list">
                    <option value="0">Choose</option>
                    <?php foreach($rezultat as $red) : ?>
                        <option value="<?= $red->naslov ?>"><?= $red->naslov ?></option>
                    <?php endforeach; ?>
                </select><br/><br/>
                <label>Payments</label><br/>
                <select name="lista2" class="list">
                    <option value="0">Choose</option>
                    <?php foreach($nizSelect as $indeks): ?>
                        <option><?= $indeks ?></option>
                    <?php endforeach; ?>
                </select><br/><br/> 
                <input type="submit" name="button" value="Submit" class="button1"/>
                <br/>
            </form>

            <?php
                if(isset($_POST['sendFile'])){
                    define("phpProjekat", "c:\\xampp\\htdocs\\2017200986\\2017200986\\2017200986\\");
                    if(isset($_FILES['fajl'])){
                        if(is_uploaded_file($_FILES['fajl']['tmp_name'])){
                            if($_FILES['fajl']['type'] != "application/pdf"){
                                echo "<script type='text/javascript'> alert('File can be only in pdf format!'); </script>";
                            }
                            else{
                                $rez = move_uploaded_file($_FILES['fajl']['tmp_name'], phpProjekat . ".pdf");

                                if($rez == 1){
                                    echo "<script type='text/javascript'> alert('File is succesfully uploaded!'); </script>";
                                }else{
                                    echo "<script type='text/javascript'> alert('Error, try again!'); </script>";
                                }
                            }
                        }else{
                            echo "<script type='text/javascript'> alert('Errorr!'); </script>";
                        }
                    }else{
                        echo "<script type='text/javascript'> alert('Error!'); </script>";
                    }
                }
            ?>

            <form method="post" enctype="multipart/form-data" class="order1 order111" action="<?php $_SERVER['PHP_SELF'] ?>">
                <label for="upload file">You can upload only pdf document!</label><br/>
                <input type="file" name="fajl"/><br>
                <input type="submit" name="sendFile" value="Send file" class="button1 btnFile"/>    
            </form>
<?php
    include "views/iconbox.php";
?>