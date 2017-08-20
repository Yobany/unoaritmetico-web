(function() {
    'use strict';

    angular
        .module('app')
        .run(RoutesRun);

    RoutesRun.$inject = ['$state', '$transitions', '$auth'];

    function RoutesRun($state, $transitions, $auth) {

        let requiresAuthCriteria = {
            to: ($state) => $state.data && $state.data.auth
        };

        let redirectToLogin = function ($auth) {
            if (!$auth.isAuthenticated()) {
                return $state.target('app.login', undefined, {location: false});
            }
        };

        $transitions.onBefore(requiresAuthCriteria, redirectToLogin, {priority:10});

    }
})();