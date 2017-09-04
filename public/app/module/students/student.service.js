(function() {
    'use strict';
    angular
        .module('app')
        .factory('Student', Student);

    Student.$inject = ['$resource'];

    function Student ($resource) {
        let resourceUrl = 'api/students/:id';

        return $resource(resourceUrl, {}, {
            'query': { method: 'GET'},
            'get': {
                method: 'GET',
                transformResponse: function (response) {
                    if (response) {
                        response = angular.fromJson(response);
                    }
                    if(response.data){
                        response = response.data;
                    }
                    return response;
                }},
            'update': { method:'PUT' }
        });
    }
})();