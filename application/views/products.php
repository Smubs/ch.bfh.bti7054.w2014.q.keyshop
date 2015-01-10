<div class="container" ng-controller="KeyshopFilterProducts">
    <div class="row">
        <div class="col-md-3">
            <aside class="sidebar-left">
                <ul class="nav nav-tabs categories">
                    <li ng-repeat="c in categories" ng-class="{ 'active': c.selected}">
                        <a href="#_" ng-click="c.selected=!c.selected"><i class="{{c.cssClass}}"></i>{{c.name}}</a>
                    </li>
                </ul>
            </aside>

        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-sort">
                        <span ng-show="sortBy=='name'" class="product-sort-selected">Sortieren nach <b>Name</b></span>
                        <span ng-show="sortBy=='price'" class="product-sort-selected">Sortieren nach <b>Preis</b></span>

                        <a href="#_" class="product-sort-order fa fa-angle-down"></a>
                        <ul>
                            <li><a ng-click="sortBy='name'" href="#_">Sortieren nach Name</a>
                            </li>
                            <li><a ng-click="sortBy='price'" href="#_">Sortieren nach Preis</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="product-wrap row row-wrap"  >
                <ks-product products="products"></ks-product>
            </div>
            <div class="gap"></div>
        </div>
    </div>

</div>