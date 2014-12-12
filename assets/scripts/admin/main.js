var keyshop = angular.module("keyshop", ["ui.bootstrap"]);

keyshop.controller("KeyshopProducts", function ($scope) {
    $scope.products = $.parseJSON(ks.products);
});

$(document).ready(function() {
    $(".form-product-remove .fa-remove").click(function() {
        var productName = $(this).parents("tr").find(".product-name").text();
        if (confirm("Wollen Sie das Produkt \"" + productName + "\" wirklich löschen?")) {
            $(".form-product-remove").submit();
        }
    });
});