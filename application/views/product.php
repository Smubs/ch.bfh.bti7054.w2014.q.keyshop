<div ng-controller="KeyshopProductOverview" class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<div class="col-md-7 animated fadeInLeft">
					<img src="<?='/assets/images/products/'.$product->getPicture()?>" alt="<?=$product->getName()?>-Bild" title="<?=$product->getName()?>" />
				</div>
				<div class="col-md-5 animated fadeInRight">
					<div class="product-info box">
						<h3><?=$product->getName()?></h3>
						<p class="product-info-price"><?=$product->getPrice()?> CHF</p>
						<p class="text-smaller text-muted"><?=$product->getDescription()?></p>
						<ul class="list-inline">
							<li>
                                <a href="#_"  ng-class="{ 'disabled': cproduct.maxcount <= getCartCountCurrentProduct()}" ng-click="addCurrentProductToCart()" class="btn btn-primary  "><i class="fa fa-shopping-cart"></i> In Warenkorb <span ng-show="getCartCountCurrentProduct() > 0" class="animated fadeInLeft"> ({{getCartCountCurrentProduct()}})</span></a>
							</li>
                            <li  class="animated fadeIn" ng-show="getCartCountCurrentProduct() > 0"><a href="#_" ng-click="removeCurrentProductFromCart()" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </li>
                            <li ng-show="cproduct.maxcount <= getCartCountCurrentProduct()" class="animated fadeIn mt20" >Wir haben keine weiteren Keys!</li>
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