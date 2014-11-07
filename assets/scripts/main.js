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

keyshop.controller('ModalLoginInstance', function ($scope, $modalInstance, data) {
    $scope.modalTitle = data.placeholders.modalTitle;
    $scope.modalSend  = data.placeholders.modalSend;
    $scope.inputs     = data.inputs;

    $scope.send = function () {
        $scope.error = true;
        $scope.feedback = {
            title: "Error",
            message: "Ajax not yet implemented"
        };

    };

    $scope.cancel = function () {
        $modalInstance.close();
    };
});

keyshop.controller('KeyshopProducts', function ($scope) {
    $scope.products = [
        {
            title: "Windows 8.1 Pro",
            image: "windows-8.1.jpg",
            description: "Das stabile und bewährte Windows 8.1 Pro.",
            price: "75 CHF",
            priceOld: "150 CHF",
            priceSave: "Sie sparen 50%",
            category: "Kategorie"
        },
        {
            title: "Windows 10 Beta",
            image: "windows-10.jpg",
            description: "Testen Sie die Beta-Version von Windows 10.",
            price: "10 CHF",
            priceOld: "15 CHF",
            priceSave: "Sie sparen 33%",
            category: "Kategorie"
        },
        {
            title: "Microsoft Office 2013 Professional Plus",
            image: "office-2013.png",
            description: "Alles, was Sie für's Arbeiten benötigen.",
            price: "100 CHF",
            priceOld: "200 CHF",
            priceSave: "Sie sparen 50%",
            category: "Kategorie"
        }
    ];
}).directive('ksProduct', function() {
    return {
        restrict: 'E',
        templateUrl: '/assets/directives/ks-product.html'
    };
});