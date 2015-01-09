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
                            <li><a href="/">Home</a></li>
							<?php if (isset($isAdmin) && $isAdmin): ?>
									<li><a href="<?=site_url('admin')?>">Admin</a></li>
							<?php endif ?>
                            <li><a href="<?=site_url('produkte')?>">Produkte</a></li>
                            <li><a href="<?=site_url('kategorien')?>">Kategorien</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6" ng-controller="ModalLogin">
                        <ul class="shopping-cart-wrapper">
                            <li class="shopping-cart shopping-cart-white"><a href="#"><i class="fa fa-shopping-cart"></i>Warenkorb</a>
                                <div class="shopping-cart-box">
                                    <ul class="shopping-cart-items">
                                        <li>
                                            <a href="/">
                                                <img src="/assets/images/products/windows-10.jpg" alt="Image Alternative text">
                                                <h5>Windows 8.1 Pro</h5><span>150 CHF</span>
                                            </a>
                                        </li>
										 <li>
                                            <a href="/">
                                                <img src="/assets/images/products/windows-10.jpg" alt="Image Alternative text">
                                                <h5>Windows 8.1 Pro</h5><span>150 CHF</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="list-inline text-center">
                                        <li><a href="page-checkout.html"><i class="fa fa-check-square"></i> Zur Kasse</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
							<?php if (!$user): ?>
								<li><a href="#" ng-click="openLogin()"><i class="fa fa-sign-in"></i>Anmelden</a></li>
								<li><a href="#" ng-click="openRegister()"><i class="fa fa-edit"></i>Registrieren</a></li>
							<?php else: ?>
								<li><a href="/profil/"><i class="fa fa-edit"></i>
									<?php if (!$user['firstname']): ?>
										<?=$user['email']?>
									<?php else: ?>
										<?=$user['firstname'].' '.$user['lastname']?>
									<?php endif; ?>										
								</a></li>
								<li><a href="#" ng-click="logout()"><i class="fa fa-sign-out"></i>Abmelden</a></li>
							<?php endif; ?>
                            
                        </ul>

                        <script type="text/ng-template" id="modalUser.html">
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
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" ng-click="send()">{{modalSend}}</button>
                                <button class="btn btn-warning" ng-click="cancel()">Schliessen</button>
                            </div>
                        </script>
                    </div>
                </div>
            </div>
        </nav>
        <form class="search-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 clearfix">
                        <label>
                            <i class="fa fa-search"></i>
                            <span>Ich suche nach</span>
                        </label>
                        <div class="search-input">
                            <input class="form-control" type="text" placeholder="Produkt" />
                        </div>
                    </div>
                    <div class="col-md-6 clearfix">
                        <!-- something else??? -->
                    </div>
                </div>
            </div>
        </form>
        <div class="content-wrapper">
            <div class="container">
