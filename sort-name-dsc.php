<?php
	session_start();
	include "views/header.php";
	include "views/menu.php";
	include "views/slider.php";
?>
<!-- Products -->
	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					<!-- Sort by name asc --> 
					<a href="sort-name-asc.php" class="btn btn-dark">Sort A-Z</a>
					<!-- Sort by name dsc -->
					<a href="sort-name-dsc.php" class="btn btn-dark">Sort Z-A</a>
					<!-- Sort by price lowest -->
					<a href="sort-price-asc.php" class="btn btn-dark">Sort by lowest price</a>
					<!-- Sort by price highest -->
					<a href="sort-price-dsc.php" class="btn btn-dark">Sort by highest price</a>
					<div class="product_grid">
						<?php
							include "conn/konekcija.php";

							$upit = "SELECT * FROM proizvod ORDER BY naslov DESC";
		    				$rezultat = $konekcija->query($upit)->fetchAll();
							
							foreach($rezultat as $red):
						?>
						<!-- Product -->
						<div class="product">
							<div class="product_image"><img src="<?= $red->src ?>" alt="<?= $red->alt ?>"></div>
							<div class="product_content">
								<div class="product_title"><a href="<?= $red->href ?>"><?= $red->naslov ?></a></div>
								<div class="product_price"><?= $red->cena ?>$</div>
							</div>
						</div>
					<?php endforeach; ?>
					</div>	
				</div>
			</div>
		</div>
	</div>
<?php
	include "views/ad.php";
	include "views/iconbox.php";
	include "views/footer.php";
?>	