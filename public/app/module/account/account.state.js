(function() {
    'use strict';

    angular
        .module('app')
        .config(RoutesConfig);

    RoutesConfig.$inject = ['$stateProvider'];

    function RoutesConfig($stateProvider) {
        $stateProvider
            .state('app.login', {
                url: '/login',
                views: {
                    'main@': {
                        templateUrl: 'app/module/account/login/login.page.html',
                        controller: 'LoginController',
                        controllerAs: 'vm'
                    }
                }
            })
            .state('app.register', {
                url: '/register',
                views: {
                    'main@': {
                        templateUrl: 'app/module/account/register/register.page.html',
                        controller: 'RegisterController',
                        controllerAs: 'vm'
                    }
                }
            })
            .state('app.activate', {
                url: '/auth/activate?token',
                views: {
                    'main@': {
                        templateUrl: 'app/module/account/activation/activate-account.page.html',
                        controller: 'ActivateAccountController',
                        controllerAs: 'vm'
                    }
                }
            })
            .state('app.forgot_password', {
                url: '/auth/recover',
                views: {
                    'main@': {
                        templateUrl: 'app/module/account/password/forgot-password.page.html',
                        controller: 'ForgotPasswordController',
                        controllerAs: 'vm'
                    }
                }
            })
            .state('app.reset_password', {
                url: '/auth/reset?token',
                views: {
                    'main@': {
                        templateUrl: 'app/module/account/password/reset-password.page.html',
                        controller: 'ResetPasswordController',
                        controllerAs: 'vm'
                    }
                }
            });
    }
})();