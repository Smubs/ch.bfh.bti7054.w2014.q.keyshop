<h1 class="first">Die neusten Produkte</h1>
<div class="row" ng-controller="KeyshopProducts">
    <a class="col-md-4" href="#" ng-repeat="product in products">
        <ks-product data="{{product}}"></ks-product>
    </a>
</div>