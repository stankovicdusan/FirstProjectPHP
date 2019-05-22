<?php
	session_start();
	
	include "conn/konekcija.php";

	if(isset($_POST['btnSub'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']); 

		$upit = "SELECT * FROM korisnik WHERE username = :username AND password = :password";

		$prepareQuery = $konekcija->prepare($upit);
		$prepareQuery->bindParam(":username", $username);
		$prepareQuery->bindParam(":password", $password);

		$rez = $prepareQuery->execute();
		if($rez){
			if($prepareQuery->rowCount()==1){
				$korisnik = $prepareQuery->fetch();

				$_SESSION['korisnik_id'] = $korisnik->id_korisnik;

				$_SESSION['korisnik'] = $korisnik;

				if($_SESSION['korisnik']->uloga_id==1){
				    echo "<script type='text/javascript'> document.location = 'user.php'; </script>";
				}else{
				    echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";
				}
			}
			else{
				//echo "<script type='text/javascript'> alert('Nesto nije u redu'); </script>";
			}
		}
		else{
			echo "Nesto nije u redu sa upitom!";
		}
	}

	include "views/header.php";
?>
<link rel="stylesheet" type="text/css" href="styles/checkout.css">
<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
<?php
	include "views/menu.php";
?>
	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(images/cart.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
										<li><a href="index.html">Home</a></li>
										<li>Log in - Register</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="checkout">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="billing checkout_section">
						<div class="section_title">Register</div>
						<div class="section_subtitle">Please register to continue</div>
						<div class="checkout_form_container">
						<?php
							if(isset($_POST['btnReg'])){
								$ime = $_POST['ime'];
								$prezime = $_POST['prezime'];
								$username = $_POST['usernamee'];
								$email = $_POST['email'];
								$lozinka = $_POST['passwordd'];

								include "conn/konekcija.php";

								$lozinka = md5($lozinka);
								$unos_upit = $konekcija->prepare("INSERT INTO korisnik VALUES ('', :ime, :prezime, :username, :email, :password, 1)");

								$unos_upit->bindParam(":ime", $ime);
								$unos_upit->bindParam(":prezime", $prezime);
								$unos_upit->bindParam(":username", $username);
								$unos_upit->bindParam(":email", $email);
								$unos_upit->bindParam(":password", $lozinka);

								try{
									$rezultat = $unos_upit->execute();

									if($rezultat){
										echo "<script type='text/javascript'> alert('Uspesna registracija'); </script>";
									}else{
										echo "<script type='text/javascript'> alert('Neuspesna registracija'); </script>";
									}
								}
								catch(PDOException $e){
									echo $e->getMessage();
								}
							}
						?>
							<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="checkout_form" class="checkout_form">
								<div class="row">
									<div class="col-xl-6">
										<!-- First name -->
										<label for="checkout_name">First Name*</label>
										<input type="text" id="checkout_name" name="ime" class="checkout_input" required="required">
									</div>
									<div class="col-xl-6">
										<!-- Last name -->
										<label for="checkout_last_name">Last Name*</label>
										<input type="text" id="checkout_last_name" name="prezime" class="checkout_input" required="required">
									</div>
								</div>
								<div>
									<!-- username -->
									<label for="checkout_last_name">Username*</label>
									<input type="text" id="checkout_last_name" name="usernamee" class="checkout_input" required="required">
								</div>
								<div>
									<!-- Password -->
									<label for="checkout_password">Password*</label>
									<input type="password" id="checkout_password" name="passwordd" class="checkout_input" require="required">
								</div>
								<div>
									<!-- Email -->
									<label for="checkout_email">Email Address*</label>
									<input type="phone" id="checkout_email" name="email" class="checkout_input" required="required">
								</div>
								<div class="checkout_extra">
									<div>
										<input type="checkbox" id="checkbox_terms" name="regular_checkbox" class="regular_checkbox" checked="checked">
										<label for="checkbox_terms"><img src="images/check.png" alt=""></label>
										<span class="checkbox_title">Terms and conditions</span>
									</div>
									<div>
										<input type="checkbox" id="checkbox_account" name="regular_checkbox" class="regular_checkbox">
										<label for="checkbox_account"><img src="images/check.png" alt=""></label>
										<span class="checkbox_title">Create an account</span>
									</div>
									<input type="submit" value="Register" name="btnReg" class="button order_button"/>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Order Info -->
				<div class="col-lg-6">
						<!-- <div class="order checkout_section"> -->
							<div class="section_title">Log in</div>
							<div class="section_subtitle">Please log in to continue</div> <br/><br/>
					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
						<div class="col-xl-6">
						<!-- Username -->
							<div>
								<label for="checkout_username" style="color:black;">Username*</label>
								<input type="text" id="checkout_username" name="username" class="checkout_input" required="required">
							</div>
							<div><br/>
						<!-- Password -->
								<label for="checkout_password" style="color:black;">Password*</label>
								<input type="password" id="checkout_password" name="password" class="checkout_input" require="required">
							</div>
						</div>
							<div class="order_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra temp or so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</div>
							<input type="submit" value="Log in" name="btnSub" class="button order_button"/>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php
		include "views/footer.php";
	?>