var keyshop = angular.module('keyshop', ['ui.bootstrap']);

keyshop.controller('ModalLogin', function ($scope, $modal) {
    $scope.openLogin = function() {
        $scope.placeholders = {
            modalTitle: 'Anmelden',
            modalSend:  'Anmelden'
        };
        $scope.inputs = new Array(
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
        );
        $scope.open($scope.inputs);
    };

    $scope.openRegister = function() {
        $scope.placeholders = {
            modalTitle: 'Registrieren',
            modalSend:  'Registrieren'
        };

        $scope.open();
    };

    $scope.open = function (inputs) {
        var modalInstance = $modal.open({
            templateUrl: 'modalUser.html',
            controller: 'ModalLoginInstance',
            resolve: {
                placeholders: function () {
                    return $scope.placeholders;
                },
                inputs: function () {
                    return $scope.inputs;
                }
            }
        });
    };
});

keyshop.controller('ModalLoginInstance', function ($scope, $modalInstance, placeholders, inputs) {
    $scope.modalTitle = placeholders.modalTitle;
    $scope.modalSend  = placeholders.modalSend;
    $scope.inputs     = inputs;

    $scope.send = function () {
        alert("Sending ajax request...");
    };

    $scope.cancel = function () {
        $modalInstance.close();
    };
});