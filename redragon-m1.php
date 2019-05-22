<?php
	session_start();
	include "views/header.php";
?>
<link rel="stylesheet" type="text/css" href="styles/categories.css">
<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
<?php
	include "views/menu.php";
?>
<div class="products mouse-products">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="product_grid">
						<div class="product">
							<?php
								include "conn/konekcija.php";
								$upit = "SELECT * FROM info_proizvod ip INNER JOIN proizvod p ON ip.proizvod_id=p.id_proizvod WHERE alt='Redragon'";
		    					$rezultat = $konekcija->query($upit)->fetch();
							?>
							<div class="product_image"><img src="<?= $rezultat->src ?>" alt="<?= $rezultat->alt ?>"></div>
							<div class="product_content">
								<div class="product_title"><a href="<?= $rezultat->href ?>"><?= $rezultat->naslov ?></a></div>
								<div class="product_price" style="color:black;"><?= $rezultat->tekst1 ?> </div>
								<div class="product_price" style="color:black;"><?= $rezultat->tekst2 ?></div>
								<div class="product_price" style="color:black;"><?= $rezultat->tekst3 ?></div>
								<div class="product_price" style="color:black;"><?= $rezultat->tekst4 ?></div>
								<div class="product_price"><?= $rezultat->cena ?></div>
							</div>
						</div>
					</div>		
				</div>
			</div>
		</div>
	</div>
<?php
	include "views/footer.php";
?>