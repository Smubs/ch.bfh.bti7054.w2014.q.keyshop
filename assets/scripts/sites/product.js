keyshop.controller('KeyshopProductOverview', ['$scope', '$rootScope', function ($scope, $rootScope) {
    $scope.cproduct = ks.product;

    $scope.getCartCountCurrentProduct = function() {
        return $rootScope.getCartCountByProduct(ks.product);
    }

    $scope.removeCurrentProductFromCart = function () {
        $rootScope.removeProductFromCart(ks.product);
    }

    $scope.addCurrentProductToCart = function() {
        $rootScope.addProductToCart($scope.cproduct);
    };
}]);
