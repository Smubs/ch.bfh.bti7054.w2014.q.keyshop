<!DOCTYPE html>
<html lang="en">
<head>
    <title>Key Shop</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?= $styles ?>
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,300" rel="stylesheet" type="text/css">
</head>
<body ng-app="keyshop">
    <div class="global-wrap">
        <header>
            <div class="container">
                <a href="/"><i class="fa fa-shopping-cart"></i> Keyshop</a>
            </div>
        </header>
        <nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Produkte</a></li>
                            <li><a href="#">Kategorien</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6" ng-controller="ModalLogin">
                        <ul class="shopping-cart-wrapper">
                            <li class="shopping-cart"><a href="#"><i class="fa fa-shopping-cart"></i>Warenkorb</a></li>
                            <li><a href="#" ng-click="openLogin()"><i class="fa fa-sign-in"></i>Anmelden</a></li>
                            <li><a href="#" ng-click="openRegister()"><i class="fa fa-edit"></i>Registrieren</a></li>
                        </ul>

                        <script type="text/ng-template" id="modalUser.html">
                            <div class="modal-header">
                                <h3 class="modal-title">{{ modalTitle }}</h3>
                            </div>
                            <div class="modal-body">
                                <div class="form-group" ng-repeat="input in inputs">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa {{ input.icon }}"></i></div>
                                        <input class="form-control" type="{{ input.type }}" name="{{ input.name }}" placeholder="{{ input.placeholder }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" ng-click="send()">{{ modalSend }}</button>
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
                    <div class="col-md-5 clearfix">
                        <label>
                            <i class="fa fa-folder-open"></i>
                            <span>In der Kategorie</span>
                        </label>
                        <div class="search-category">
                            <select name="search-category">
                                <option>Alle</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-block search-btn" type="submit">Search</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="content-wrapper">
            <div class="container">