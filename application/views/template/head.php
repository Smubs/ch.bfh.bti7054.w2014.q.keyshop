<!DOCTYPE html>
<html lang="en">
<head>
    <title>Keyshop</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= $styles ?>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,300" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
</head>
<body ng-app="keyshop">
    <div class="global-wrap">
        <header class="main">
            <div class="container">
                <a class="logo" href="/">K<span class="rotated">e</span>yshop</a>
            </div>
        </header>
        <nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li><a href="/" class="<?= $classHome ?>">Home</a></li>
                            <li><a href="/products" class="<?= $classProducts ?>">Produkte</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6" ng-controller="ModalLogin" ng-cloak>
                        <ul class="useroption-wrapper">
                            <li class="cart">
                                <a href="#_"><i class="fa fa-shopping-cart"></i>Warenkorb <span ng-show="getCartCount() > 0">({{getCartCount()}})</span></a>
                                <div class="cart-box">
                                    <ul class="cart-items">
                                        <li  ng-show="getCartCount() > 1">
                                            <a href="#_" ng-click="openCart()"><strong>{{getCartCount()}}</strong> Produkte befinden sich in Ihrem Warenkorb</a>
                                        </li>
                                        <li  ng-show="getCartCount() == 1">
                                            <a href="#_" ng-click="openCart()"><strong>Ein</strong> Produkt befindet sich in Ihrem Warenkorb</a>
                                        </li>
                                        <li  ng-show="getCartCount() == 0">
                                            <a href="#_">Sie haben noch keine Produkte in Ihrem Warenkorb</a>
                                        </li>
                                        <li style="height: 0;" ng-show="getCartCount() > 0"><a href="#_"  ng-click="openCart()"><i class="fa fa-shopping-cart"></i> Zur Kasse</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
							<?php if (!$user): ?>
                            <li><a href="#_" ng-click="openLogin()"><i class="fa fa-sign-in"></i>Anmelden</a></li>
                            <li><a href="#_" ng-click="openRegister()"><i class="fa fa-edit"></i>Registrieren</a></li>
							<?php else: ?>
                            <li>
                                <a href="/profile/" class="<?= $classProfile ?>"><i class="fa fa-edit"></i>
                                    <?php if (!$user->getFirstname()): ?>
                                    <?= $user->getEmail() ?>
                                    <?php else: ?>
                                    <?= $user->getFirstname().' '.$user->getLastname() ?>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <?php if ($user && $user->getAdmin()): ?>
                            <li><a href="<?= site_url('admin') ?>"><i class="fa fa-list"></i>Backend</a></li>
                            <?php endif ?>
                            <li><a href="#_" ng-click="logout()"><i class="fa fa-sign-out"></i>Abmelden</a></li>
							<?php endif; ?>

                        </ul>

                        <script type="text/ng-template" id="modalCart.html">
                            <div class="modal-header">
                                <h3 class="modal-title">Warenkorb</h3>
                            </div>
                            <div class="modal-body">
                                <div ng-show="error" class="bs-callout bs-callout-danger modal-callout">
                                    <h4>{{feedback.title}}</h4>
                                    <p>{{feedback.message}}</p>
                                </div>
                                <div class="table-responsive table-overview">
                                    <table class="table table-striped ng-scope" ng-controller="KeyshopProducts">

                                        <tbody><tr>
                                            <th>Anzahl</th>
                                            <th>Name</th>
                                            <th>Preis</th>
                                            <th></th>
                                        </tr>
                                        <tr ng-repeat="product in cart" class="ng-scope">
                                            <td class="ng-binding">{{product.count}}</td>
                                            <td class="name">{{product.name}}</td>
                                            <td class="price">{{product.price*product.count}} CHF</td>
                                            <td>
                                                <!--<i ng-click="" class="fa fa-plus"></i>-->
                                                <i style="cursor: pointer" ng-click="removeProductFromCart(product)" class="fa fa-trash"></i>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" ng-click="send()"><i ng-show="showLoader" class="fa fa-spinner fa-spin"></i> Bestellen</button>
                                <button class="btn btn-warning" ng-click="cancel()">Schliessen</button>
                            </div>
                        </script>

                        <script type="text/ng-template" id="modalUser.html">
                            <form ng-submit="send()">
                                <div class="modal-header">
                                    <h3 class="modal-title">{{modalTitle}}</h3>
                                </div>
                                <div class="modal-body">
                                        <div ng-show="error" class="bs-callout bs-callout-danger modal-callout">
                                            <h4>{{feedback.title}}</h4>
                                            <p>{{feedback.message}}</p>
                                        </div>
                                        <div class="form-group" ng-repeat="input in inputs">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa {{input.icon}}"></i></div>
                                                <input class="form-control" type="{{input.type}}" ng-model="input.value" name="{{input.name}}" placeholder="{{input.placeholder}}" />
                                            </div>
                                        </div>
                                    <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-primary" ng-click="send()">{{modalSend}}</button>
                                    <button class="btn btn-warning" ng-click="cancel()">Schliessen</button>
                                </div>
                            </form>
                        </script>
                    </div>
                </div>
            </div>
        </nav>

        <form action="/<?= uri_string() ?>" method="post" class="search-wrapper">
            <div class="container">
                <div class="row">
                    <?php if($showSearch): ?>
                    <div class="col-md-6 clearfix">
                        <label>
                            <i class="fa fa-search"></i>
                            <span>Ich suche nach</span>
                        </label>
                        <div class="search-input">
                            <input class="form-control" type="text" name="search" value="<?= $search ?>" placeholder="Produkt" />
                        </div>
                    </div>
                    <div class="col-md-6 clearfix">
                        <!-- something else??? -->
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </form>
        <div class="content-wrapper">
            <div class="container">
