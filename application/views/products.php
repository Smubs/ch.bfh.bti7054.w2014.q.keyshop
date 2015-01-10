<div class="container">
    <div class="row">
        <div class="col-md-3">
            <aside class="sidebar-left">
                <ul class="nav nav-tabs categories nav-coupon-category-left">
                    <li class="active"><a href="#"><i class="fa fa-ticket"></i>All<span>35</span></a>
                    </li>
                    <li><a href="#"><i class="fa fa-cutlery"></i>Software<span>47</span></a>
                    </li>
                    <li><a href="#"><i class="fa fa-calendar"></i>Betriebssystem<span>43</span></a>
                    </li>
                    </li>
                </ul>
            </aside>

        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-sort">
                        <span class="product-sort-selected">Sortieren nach <b>Preis</b></span>
                        <a href="#" class="product-sort-order fa fa-angle-down"></a>
                        <ul>
                            <li><a href="#">Sortieren nach Name</a>
                            </li>
                            <li><a href="#">Sortieren nach Preis</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="product-wrap row row-wrap"  ng-controller="KeyshopFilterProducts">
                <div class="col-md-4" ng-repeat="tproduct in products">
                    <ks-product></ks-product>
                </div>
            </div>
            <div class="gap"></div>
        </div>
    </div>

</div>