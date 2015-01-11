keyshop.controller('KeyshopFilterProducts', ['$scope', 'filterFilter', '$http', '$timeout', function ($scope, filterFilter, $http, $timeout) {
    $scope.products = ks.products;

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

    // refreshes the filter
    $scope.refreshFilter = function() {
        $scope.showLoader();
        var url = ks.apiurl+'/'+$scope.sortBy+'/';

        $http.post(url, {'categories' : $scope.selectedCategories(), 'search' : $('[name=search]').val()}).success(function(data){
            $scope.hideLoader();
            $scope.products = data.products;
            $scope.$broadcast('Data_Ready');

            $timeout(function() { initializing = false; });
        });

    }

    $scope.refreshFilter();

}]);
