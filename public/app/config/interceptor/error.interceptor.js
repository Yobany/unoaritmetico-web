(function() {
    'use strict';

    angular
        .module('app')
        .factory('errorHandlerInterceptor', errorHandlerInterceptor);

    errorHandlerInterceptor.$inject =
        [
            '$q',
            '$rootScope'
        ];

    function errorHandlerInterceptor ($q,
                                      $rootScope) {
        var service = {
            responseError: responseError
        };

        return service;

        function responseError (response) {
            $rootScope.$emit('app.httpError', response);
            return $q.reject(response);
        }
    }
})();