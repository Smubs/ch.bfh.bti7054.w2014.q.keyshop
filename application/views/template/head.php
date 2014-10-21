<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Key Shop</title>

    <script type="text/javascript" src="/assets/scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/assets/scripts/angular.min.js"></script>
    <script type="text/javascript" src="/assets/scripts/ui-bootstrap-tpls-0.11.2.min.js"></script>
    <script type="text/javascript">
        var keyshop = angular.module('keyshop', ['ui.bootstrap']);
    </script>

    <link type="text/css" rel="stylesheet" href="/assets/styles/main.css" />
    <link type="text/css" rel="stylesheet" href="/assets/styles/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="/assets/styles/bootstrap-theme.min.css" />
</head>
<body ng-app="keyshop">
    <div class="container">
        <header class="container">
            <a href="/"><img src="/assets/images/keyshop-logo.png" alt="Keyshop Logo"></a>
        </header>
        <nav>
            <ul>
                <li><a href="#">Nav 1</a></li>
                <li><a href="#">Nav 2</a></li>
                <li><a href="#">Nav 3</a></li>
            </ul>
        </nav>