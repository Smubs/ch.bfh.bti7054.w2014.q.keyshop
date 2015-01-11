var keyshop = angular.module('keyshop', ['ui.bootstrap', 'authService', 'ngCookies']);

keyshop.run(function($rootScope, $cookieStore) {
    if ($cookieStore.get('cart') == undefined) {
        $cookieStore.put('cart', []);
    }
    $rootScope.cart = $cookieStore.get('cart');


    $rootScope.getCartCount = function () {
        var count = 0;

        $rootScope.cart.forEach(function(p) {
            count = count + p.count;
        });
        return count;
    }

    $rootScope.getCartCountByProduct = function (product) {
        var count = 0;
        $rootScope.cart.forEach(function(p) {
            if (product.id == p.id) {
                count = count + p.count;
            }
        });
        return count;
    }

    $rootScope.addProductToCart = function (product) {
        console.log('not yet implemented');
    };

    $rootScope.removeProductFromCart = function (product) {
        $rootScope.cart.forEach(function(p) {
            if (product.id == p.id) {
                p.count = p.count-1;
            }
        });

        $rootScope.cart = $rootScope.cart
            .filter(function (el) {
                return el.count !== 0;
            });
        $cookieStore.put('cart', $rootScope.cart);
    };
});

keyshop.factory('ksUtil', function() {
        return {
			// converts ksInputs to $.param-ready datas
            prepareInputs: function(inputs) {
				var rv = {};
                angular.forEach(inputs, function(input, key) {
					var rvStr = 'rv.'+input.name+'="'+input.value+'"';
					eval(rvStr); 
				});
				return rv;
            }
        };
});

keyshop.controller('ModalLogin', function ($scope, $rootScope, $cookieStore, $modal, Auth) {

    $scope.resetCart = function() {
        $cookieStore.put('cart', []);
    }

	$scope.logout = function() {
        Auth.logout()
			.success(function(data) {
				if (data.success) {
					window.location.reload();
				} else {
					console.log('error 2013: logout error'); 
				}
			});
	};

    $scope.openCart = function() {
        var modalInstance = $modal.open({
            templateUrl: 'modalCart.html',
            controller: 'ModalCartInstance',
            resolve: {
                data: function () {
                    return $scope.data;
                }
            }
        });
    }

    $scope.openLogin = function() {

        $scope.data = {
            placeholders: {
                modalTitle: 'Anmelden',
                modalSend:  'Anmelden'
            },
            inputs: new Array(
                {
                    type: 'email',
                    name: 'email',
                    icon: 'fa-at',
                    placeholder: 'E-Mail Adresse'
                },
                {
                    type: 'password',
                    name: 'password',
                    icon: 'fa-key',
                    placeholder: 'Passwort'
                }
            )
        };
		$scope.data.type = 'login';
        $scope.open();
    };

	
    $rootScope.openRegister = function() {
        $scope.data = {
            placeholders: {
                modalTitle: 'Registrieren',
                modalSend:  'Registrieren'
            },
            inputs: new Array(
                {
                    type: 'email',
                    name: 'email',
                    icon: 'fa-at',
                    placeholder: 'E-Mail Adresse wählen'
                },
                {
                    type: 'password',
                    name: 'password',
                    icon: 'fa-key',
                    placeholder: 'Passwort erstellen'
                },
                {
                    type: 'password',
                    name: 'password2',
                    icon: 'fa-repeat',
                    placeholder: 'Passwort bestätigen'
                }
            )
        };
		$scope.data.type = 'register';
        $scope.open();
    };

    $scope.open = function () {
        var modalInstance = $modal.open({
            templateUrl: 'modalUser.html',
            controller: 'ModalLoginInstance',
            resolve: {
                data: function () {
                    return $scope.data;
                }
            }
        });
    };
});

keyshop.controller('ModalCartInstance', function ($scope, $modalInstance, $rootScope, $http, $cookieStore) {
    $scope.send = function () {
        if (!ks.user) {
            $rootScope.openRegister();
        } else {
            $scope.showLoader = true;
            $http.post('/api/order/neworder/', {'cart' : $cookieStore.get('cart')}).success(function(data){
                console.log(data.orderid);
            });
        }
    };

    $scope.cancel = function () {
        $modalInstance.close();
    };
});

keyshop.controller('ModalLoginInstance', function ($scope, $rootScope, $modalInstance, data, Auth, ksUtil) {

    $scope.modalTitle = data.placeholders.modalTitle;
    $scope.modalSend  = data.placeholders.modalSend;
    $scope.inputs     = data.inputs;


    $scope.send = function () {
		var uo = ksUtil.prepareInputs($scope.inputs); 
		
		if (data.type == 'login') {
			Auth.login(uo)
				.success(function(data) {
					if (data.success) {
						window.location.reload();
					} else {
						$scope.error = true;
						$scope.feedback = {
							title: "Fehler!",
							message: data.message
						};
					}
					$scope.loading = false;
				})
				.error(function(data) {
					$scope.error = true;
					console.log('error');
					console.log(data);
					$scope.feedback = {
						title: "Server Error",
						message: "watch console"
					};
					$scope.loading = false;
				});
		}
		
		if (data.type == 'register') {
			Auth.register(uo)
				.success(function(data) {
					if (data.success) {
						window.location.reload();
					} else {
						$scope.error = true;
						$scope.feedback = {
							title: "Fehler!",
							message: data.message
						};
					}
					$scope.loading = false;
				})
				.error(function(data) {
					$scope.error = true;
					console.log('error');
					console.log(data);
					$scope.feedback = {
						title: "Server Error",
						message: "watch console"
					};
					$scope.loading = false;
				});
		}
		
		
    };

    $scope.cancel = function () {
        $modalInstance.close();
    };
});

keyshop.controller('KeyshopProducts', function ($scope) {
    $scope.products = ks.products;
});

keyshop.directive('ksProduct', function() {
    return {
        restrict: 'E',
        link:function($scope,$element,attrs){
            function chunk(arr, size) {
                var newArr = [];
                if (arr != undefined) {
                    for (var i = 0; i < arr.length; i += size) {
                        newArr.push(arr.slice(i, i + size));
                    }
                }
                return newArr;
            }

            $scope.$on("Data_Ready", function  () {
                $scope.p = eval('$scope.' + attrs.products);
                $scope.rowData = chunk($scope.p, 3);
            });
            $scope.$broadcast("Data_Ready");
        },
        templateUrl: '/assets/directives/ks-product.html'
    };
});
