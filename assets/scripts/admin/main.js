var keyshop = angular.module("keyshop", ["ui.bootstrap", "multi-select", "authService"]);

keyshop.controller("KeyshopOrders", function ($scope) {
    $scope.orders = ks.orders;
});

keyshop.controller("KeyshopProducts", function ($scope) {
    $scope.products = ks.products;
});

keyshop.controller("KeyshopKeys", function ($scope) {
    $scope.keys = ks.keys;
});

keyshop.controller("KeyshopCategories", function ($scope) {
    $scope.categories = ks.categories;
});

keyshop.controller("KeyshopUsers", function ($scope) {
    $scope.users = ks.users;
});

keyshop.controller("KeyshopMultiSelectCategories", function ($scope) {
    $scope.multiSelectCategories = ks.multiSelectCategories;

    $(".form-product").submit(function() {
        var ids = new Array();
        angular.forEach($scope.multiSelectCategories, function(value) {
            if (value.ticked === true) {
                ids.push(value.id);
            }
        });
        $("[name=categories]").val(ids.join(","));
    });
});

$(function () {
    $("[data-toggle=\"tooltip\"]").tooltip();

    $(".form-remove .fa-remove").click(function() {
        var name = $(this).parents("tr").find(".name").text();
        if (confirm("Wollen Sie \"" + name + "\" wirklich löschen?")) {
            $(".form-remove").submit();
        }
    });
});

keyshop.controller('LogoutController', function ($scope, Auth) {
    $scope.logout = function() {
        Auth.logout().success(function(data) {
            if (data.success) {
                window.location.reload();
            } else {
                console.log('error 2013: logout error');
            }
        });
    };
});