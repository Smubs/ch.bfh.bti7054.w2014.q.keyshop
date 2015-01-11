keyshop.controller('KeyshopProductOverview', ['$scope', '$cookieStore', '$rootScope', function ($scope, $cookieStore, $rootScope) {
    $scope.cproduct = ks.product;

    $scope.getCartCountCurrentProduct = function() {
        return $rootScope.getCartCountByProduct(ks.product);
    }

    $scope.removeCurrentProductFromCart = function () {
        $rootScope.removeProductFromCart(ks.product);
    }

    $scope.addCurrentProductToCart = function() {

        var array = $cookieStore.get('cart');

        var foundIt = false;
        array.forEach(function(p) {
            if (p.id == $scope.cproduct.id) {
                p.count = p.count+1;
                foundIt = true;
            }
        });
        if (!foundIt) {
            array.push($scope.cproduct);
        }

        $cookieStore.put('cart', array);
        $rootScope.cart = array;
    };
}]);
