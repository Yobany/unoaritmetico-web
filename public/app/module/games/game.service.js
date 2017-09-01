(function() {
    'use strict';
    angular
        .module('app')
        .factory('Game', Game);

    Game.$inject = ['$resource'];

    function Game ($resource) {
        let resourceUrl = 'api/games/:id';

        return $resource(resourceUrl, {}, {
            'query': { method: 'GET'},
            'export': {
                method: 'GET',
                url: 'api/games/:id/export'
            },
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