angular.module('authService', [])

    .factory('Auth', function($http, $rootScope) {

        return {
            get : function() {
                return $http.get('/ajax/auth');
            },

            logout : function() {
                return $http.get('/ajax/auth/logout');
            },

            login : function(loginData) {
                return $http({
                    method: 'POST',
                    url: '/ajax/auth/login',
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(loginData)
                });
            },
			
			register : function(registerData) {
                return $http({
                    method: 'POST',
                    url: '/ajax/auth/register',
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(registerData)
                });
            }
			

        }

    });
