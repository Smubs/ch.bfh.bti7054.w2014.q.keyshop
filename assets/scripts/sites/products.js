keyshop.controller('KeyshopFilterProducts', ['$scope', 'filterFilter', '$http', '$timeout', '$cookies', function ($scope, filterFilter, $http, $timeout, $cookies) {
    $scope.products = ks.products;

    // will save user filters in cookies - not finished
    var saveFilter = true;

    // do not edit!
    $scope.sortBy = 'name';
    var initializing = true;
    var wrap = $(".product-wrap");
    var wrapHeight;

    $scope.showLoader = function () {
        wrap.append("<div class='loader'><div cl" +
        "+ass='preloader'><div class='preloader-container'><span class='animated-preloader'></span></div></div></div>");
    };

    $scope.hideLoader = function () {
        var loader = $(".loader");
        wrap.removeClass("init");
        loader.fadeOut(200, function () {
            $(this).remove();
        });
        wrapHeight = wrap.height();
    };

    // name of category field
    $scope.category = 'category';

    // categories
    $scope.categories = ks.categories; // get categories by php

    // method to get selected regions
    $scope.selectedCategories = function() {
        return filterFilter($scope.categories, { selected: true });
    };

    $scope.$watch('categories|filter:{selected:true}', function (nv) {
        if (!initializing) {
            $scope.refreshFilter();
        }

    }, true);

    $scope.$watch('sortBy', function (nv) {
        $scope.refreshFilter();
    }, true);

    $scope.unCheckAll = function(obj) {
        angular.forEach(obj, function (item) {
            item.selected = true;
        });
    };

    // get cookies if exist
    if (saveFilter && $cookies.categories) {
        // $scope.categories = $cookies.categories;
    }

    // refreshes the filter
    $scope.refreshFilter = function() {
        $scope.showLoader();
        var url = ks.ajaxurl+'/'+$scope.sortBy+'/';

        $http.post(url, {'categories' : $scope.selectedCategories()}).success(function(data){
            // save new cookies
            if (saveFilter) {
                $cookies.categories = $scope.categories;
            }

            $scope.hideLoader();
            $scope.products = data.products;
            $scope.$broadcast("Data_Ready");

            $timeout(function() { initializing = false; });
        });

    }

    $scope.refreshFilter();

}]);
