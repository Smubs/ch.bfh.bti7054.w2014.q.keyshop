var keyshop = angular.module("keyshop", ["ui.bootstrap", "multi-select"]);

keyshop.controller("KeyshopProducts", function ($scope) {
    $scope.products = ks.products;
});

keyshop.controller("KeyshopCategories", function ($scope) {
    $scope.categories = ks.categories;
});

keyshop.controller("KeyshopMultiSelect", function ($scope) {
    $scope.data = ks.multiSelectData;

    $(".form-product").submit(function() {
        var ids = new Array();
        angular.forEach($scope.data, function(value) {
            if (value.ticked === true) {
                ids.push(value.id);
            }
        });
        $("[name=categories]").val(ids.join(","));
    });
});

$(document).ready(function() {
    $(".form-remove .fa-remove").click(function() {
        var name = $(this).parents("tr").find(".name").text();
        if (confirm("Wollen Sie \"" + name + "\" wirklich löschen?")) {
            $(".form-remove").submit();
        }
    });
});