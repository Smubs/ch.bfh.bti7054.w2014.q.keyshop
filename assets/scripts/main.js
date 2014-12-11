var keyshop = angular.module('keyshop', ['ui.bootstrap']);

keyshop.controller('ModalLogin', function ($scope, $modal) {
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
        $scope.open();
    };

    $scope.openRegister = function() {
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
                    name: 'password',
                    icon: 'fa-repeat',
                    placeholder: 'Passwort bestätigen'
                }
            )
        };
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

keyshop.controller('ModalLoginInstance', function ($scope, $modalInstance, data, Auth) {
    $scope.modalTitle = data.placeholders.modalTitle;
    $scope.modalSend  = data.placeholders.modalSend;
    $scope.inputs     = data.inputs;


    $scope.send = function () {
        $scope.loading = true;
        Auth.login($scope.loginData)
            .success(function(data) {
                if (data.success) {
                    window.location.reload();
                } else {
                    $scope.error = true;
                    $scope.feedback = {
                        title: "Error",
                        message: "Ajax not yet implemented"
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
    };

    $scope.cancel = function () {
        $modalInstance.close();
    };
});

keyshop.controller('KeyshopProducts', function ($scope) {
    $scope.products = ks.homeProducts;
}).directive('ksProduct', function() {
    return {
        restrict: 'E',
        templateUrl: '/assets/directives/ks-product.html'
    };
});