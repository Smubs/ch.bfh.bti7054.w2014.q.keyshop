
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<div class="col-md-7 animated fadeInLeft">
					<img src="<?='/assets/images/products/'.$product->getPicture()?>" alt="<?=$product->getName()?>-Bild" title="Gamer Chick" />
				</div>
				<div class="col-md-5 animated fadeInRight">
					<div class="product-info box">
						<h3><?=$product->getName()?></h3>
						<p class="product-info-price"><?=$product->getPrice()?> CHF</p>
						<p class="text-smaller text-muted"><?=$product->getDescription()?></p>
						<ul class="list-inline">
							<li><a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> In Warenkorb</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="gap"></div>
			<h3>Ähnliche Produkte</h3>
			<div class="gap gap-mini"></div>
			<div class="row row-wrap">
				
				<div class="products" ng-controller="KeyshopProducts" >
                    <ks-product products="products"></ks-product>
				</div>
			</div>
			<div class="gap gap-small"></div>
		</div>
	</div>

</div>