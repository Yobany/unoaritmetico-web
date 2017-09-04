(function() {
    'use strict';
    angular
        .module('app')
        .factory('Account', Account);

    Account.$inject = ['$resource'];

    function Account ($resource) {
        let resourceUrl = 'api/auth';

        return $resource(resourceUrl, {}, {
            'activate': {
                method: 'GET',
                url: 'api/auth/activate'
            },
            'passwordRecover': {
                method: 'POST',
                url: 'api/games/password/recover'
            },
            'passwordReset': {
                method: 'POST',
                url: 'api/games/password/reset'
            },
        });
    }
})();