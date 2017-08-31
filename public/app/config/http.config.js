/**
 * Created by pixco on 30/08/2017.
 */
(function() {
    'use strict';

    angular
        .module('app')
        .config(httpConfig);

    httpConfig.$inject = ['$httpProvider'];

    function httpConfig($httpProvider) {

        $httpProvider.interceptors.push('authInterceptor');
    }
})();