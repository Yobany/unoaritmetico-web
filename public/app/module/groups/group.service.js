(function() {
    'use strict';
    angular
        .module('app')
        .factory('Group', Group);

    Group.$inject = ['$resource'];

    function Group ($resource) {
        let resourceUrl = 'api/groups/:id';

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