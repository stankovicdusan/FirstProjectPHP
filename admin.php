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

	<!-- Admin deo -->

	<?php
		include "conn/konekcija.php";

		//dohvatanje svih korisnika iz baze i prikazivanje u tabeli
    
	    $upit = "SELECT k.id_korisnik, k.ime, k.prezime, u.naziv FROM korisnik k INNER JOIN uloga u ON k.uloga_id = u.id_uloga";
	    $rezultat = $konekcija->query($upit);
	    $korisnici = $rezultat->fetchAll();
	?>

		<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2" id="css1">
					<table class="table table-dark admin-table">
					  <thead>
					    <tr>
					      <th scope="col">RB</th>
					      <th scope="col">FirstName</th>
					      <th scope="col">LastName</th>
					      <th scope="col">Role</th>
					      <th scope="col">Change</th>
					      <th scope="col">Delete</th>
					    </tr>
					  </thead>
					  <?php 
	                        $br=1;
	                        foreach($korisnici as $k):
	                    ?>
					  <tbody>
					    <tr>
					      <th scope="row"><?= $br++ ?></th>
					      <td><?= $k->ime ?></td>
					      <td><?= $k->prezime ?></td>
					      <td><?= $k->naziv ?></td>
					      <td><a href="change-user.php?id=<?= $k->id_korisnik ?>">Change</a></td>
					      <td><a href="delete-user.php?id=<?= $k->id_korisnik ?>">Delete</a></td>
					    </tr>
					  </tbody>
					  <?php endforeach; ?>
					</table>
					<a class="btn btn-dark" href="add-user.php" role="button">Add user</a>
				</div>
			</div>
		</div>
	</div>