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
                <a class="logo" href="/"><span class="rotated">KS</span>.ADMIN</a>
            </div>
        </header>
        <nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul>
							<li><a href="/"><i class="fa fa-reply"></i>Zurück zu Keyshop</a></li>
                            <li><a href="/admin/">Dashboard</a></li>
                            <li><a href="/admin/products">Produkte</a></li>
                            <li><a href="/admin/categories">Kategorien</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">   
                        <ul class="pull-right">
                            <li class="logout"><a href="/admin/logout"><i class="fa fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="container">
                <div class="alert alert-<?= $alert['mode'] . ' ' . $alert['display'] ?>">
                    <?= $alert['message'] ?>
                </div>
