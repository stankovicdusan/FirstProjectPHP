<?php 
	session_start();    
	include "views/header.php";
	include "views/menu.php";
?>
<div class="products mouse-products">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="product_grid">
					<?php
						include "conn/konekcija.php";
						$upit = "SELECT * FROM proizvod p INNER JOIN kategorija k ON p.kategorija_id=k.id_kategorija WHERE k.naziv='Mouse'";
    					$rezultat = $konekcija->query($upit)->fetchAll(PDO::FETCH_OBJ);
    					foreach($rezultat as $red):
					?>
						<!-- Product -->
						<div class="product">
							<div class="product_image"><img src="<?= $red->src ?>" alt="<?= $red->alt ?>"></div>
							<div class="product_content">
								<div class="product_title"><a href="<?= $red->href ?>"><?= $red->naslov ?></a></div>
								<div class="product_price"><?= $red->cena ?></div>
							</div>
						</div>

					<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	include "views/iconbox.php";
	include "views/footer.php";
?>	