(function() {
    'use strict';

    angular
        .module('app')
        .config(SatellizerConfig);

    SatellizerConfig.$inject = ['$authProvider'];

    function SatellizerConfig($authProvider) {
        $authProvider.httpInterceptor = function() {
            return true;
        };

        $authProvider.loginUrl = '/api/auth/login';
        $authProvider.signupUrl = '/api/auth/register';
        $authProvider.tokenRoot = 'meta';
    }
})();