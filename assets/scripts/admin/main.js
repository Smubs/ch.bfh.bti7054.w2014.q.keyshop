var keyshop = angular.module("keyshop", ["ui.bootstrap"]);

keyshop.controller("KeyshopProducts", function ($scope) {
    $scope.products = $.parseJSON(ks.products);
});

keyshop.controller("KeyshopAlert", function ($scope) {
    $scope.alert = {};
    $scope.alert.display = "hide";
    if (ks && ks.alert) {
        $scope.alert = ks.alert;
        $scope.alert.display = "";
    }
});

$(document).ready(function() {
    $(".form-product-remove .fa-remove").click(function() {
        var productName = $(this).parents("tr").find(".product-name").text();
        if (confirm("Wollen Sie das Produkt \"" + productName + "\" wirklich löschen?")) {
            $(".form-product-remove").submit();
        }
    });
});