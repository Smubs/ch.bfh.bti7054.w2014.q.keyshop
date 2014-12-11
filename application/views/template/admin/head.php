<!DOCTYPE html>
<html lang="en">
<head>
    <title>Key Shop Backend</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?= $styles ?>
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Roboto:400,100,300" rel="stylesheet" type="text/css">
</head>
<body ng-app="keyshop">
    <div class="global-wrap">
        <header>
            <div class="container">
                <a href="/"><i class="fa fa-shopping-cart"></i> Keyshop Backend</a>
            </div>
        </header>
        <nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Produkte</a></li>
                            <li><a href="#">Kategorien</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="pull-right">
                            <li class="logout"><a href="#"><i class="fa fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="container">