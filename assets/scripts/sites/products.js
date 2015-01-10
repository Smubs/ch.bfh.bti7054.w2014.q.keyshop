keyshop.controller('KeyshopFilterProducts', ['$scope', 'filterFilter', '$http', '$timeout', '$cookieStore', function ($scope, filterFilter, $http, $timeout, $cookieStore) {
    $scope.products = ks.products;

    // will only show a limited count of objects if every filter is active
    var limited = false;

    // will save user filters in cookies
    var saveFilter = true;

    // do not edit!
    var initializing = true;
    var wrap = $(".product-wrap");
    var wrapHeight;

    $scope.showLoader = function () {
        wrap.append("<div class='loader'><div class='preloader'><div class='preloader-container'><span class='animated-preloader'></span></div></div></div>");
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
        return filterFilter($scope.regions, { selected: true });
    };

    // watch for changes
    $scope.$watch('categories|filter:{selected:true}', function (nv) {
        if (!initializing) {
            $scope.refreshFilter();
        }

    }, true);

    $scope.unCheckAll = function(obj) {
        angular.forEach(obj, function (item) {
            item.selected = true;
        });
    };

    // get cookies if exist
    if (saveFilter && $cookieStore.get('categories')) {
        $scope.btypes = $cookieStore.get('categories');
    }

    // refreshes the filter
    $scope.refreshFilter = function() {

        $scope.showLoader();
        var url = ks.ajaxurl;
        console.log(ks.ajaxurl);

        // add categories to url
        /*url+= "?"+$scope.category+"="
        if (!limited || $scope.categories.length != $scope.selectedCategories().length) {
            angular.forEach($scope.selectedCategories(), function (k, v) {
                url += k.value+'|';
            });
        }
        url = url.substring(0, url.length - 1);
        */

        $http.get(url).success(function(data){
            // save new cookies
            if (saveFilter) {
                $cookieStore.put('categories',$scope.regions);
            }

            $scope.hideLoader();
            $scope.products = data.products;
            $timeout(function() { initializing = false; });
        });
    }

    $scope.refreshFilter();

}]);
