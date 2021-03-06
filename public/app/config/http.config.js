(function() {
    'use strict';

    angular
        .module('app')
        .config(httpConfig);

    httpConfig.$inject = ['$httpProvider'];

    function httpConfig($httpProvider) {
        $httpProvider.interceptors.push('errorHandlerInterceptor');
        $httpProvider.interceptors.push('authInterceptor');
    }
})();