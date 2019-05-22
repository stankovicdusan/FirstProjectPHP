<?php
	session_start();
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
<?php
	if(isset($_POST['button'])){
		$ime = $_POST['firstname'];
		$prezime = $_POST['lastname'];
		$adresa = $_POST['adress'];
		$telefon = $_POST['phonenumber'];
		$email = $_POST['email'];
		$proizvod = $_POST['lista1'];
		$placanje = $_POST['lista2'];

		include "conn/konekcija.php";

		$unos_upit = $konekcija->prepare("INSERT INTO porudzbine VALUES ('', :ime, :prezime, :adresa, :telefon, :email, :proizvod, :nacin_placanja)");

		$unos_upit->bindParam(":ime", $ime);
		$unos_upit->bindParam(":prezime", $prezime);
		$unos_upit->bindParam(":adresa", $adresa);
		$unos_upit->bindParam(":telefon", $telefon);
		$unos_upit->bindParam(":email", $email);
		$unos_upit->bindParam(":proizvod", $proizvod);
		$unos_upit->bindParam(":nacin_placanja", $placanje);

		try{
			$rezultat = $unos_upit->execute();

			if($rezultat){
				echo "<script type='text/javascript'> alert('Uspesno ste porucili'); </script>";
			}else{
				echo "<script type='text/javascript'> alert('Neuspesno ste porucili'); </script>";
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
?>
			<h2 class="order">You can see your orders here!</h2>
            <div class="container">
			<div class="col-lg-8 offset-lg-2" id="css1">
            <form>
	            <table class="table table-striped">
	                <tr>
	                    <td class="timeTable"><label>First name</label></td>
	                    <td class="timeTable"><?= $ime ?></td>
	                </tr>
	                
	                <tr>
	                    <td class="timeTable"><label>Last name</label></td>
	                    <td class="timeTable"><?= $prezime ?></td>
	                </tr>
	                
	                <tr>
	                    <td class="timeTable"><label>Adress</label></td>
	                    <td class="timeTable"><?= $adresa ?></td>
	                </tr>
	                
	                <tr>
	                    <td class="timeTable"><label>Phone number</label></td>
	                    <td class="timeTable"><?= $telefon ?></td>
	                </tr>
	                
	                <tr>
	                    <td class="timeTable"><label>E-mail</label></td>
	                    <td class="timeTable"><?= $email ?></td>
	                </tr>
	                
	                <tr>
	                    <td class="timeTable"><label>Product</label></td>
	                    <td class="timeTable"><?php
	                            if(isset($proizvod)){
	                                echo ($proizvod);
	                            }else{
	                                echo "Choose value";
	                            }  
	                        ?>
	                    </td>
	                </tr>
	                
	                <tr>
	                    <td class="timeTable"><label>Payment method</label></td>
	                    <td class="timeTable"><?php
	                            if(isset($placanje)){
	                                echo ($placanje);
	                            }else{
	                                echo "Choose value";
	                            }  
	                        ?>
	                    </td>
	                </tr>
					<tr>
						<td colspan="2" class="timeTable"><?php 
						
						print "Transaction date: ";
						print date("m/d/y G.i:s<br>", time());

						?>
						
						</td>
					</tr>
	            </table>
	           </form>
	       </div>
	   </div>
