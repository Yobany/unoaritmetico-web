(function() {
    'use strict';

    angular
        .module('app')
        .run(RoutesRun);

    RoutesRun.$inject = ['$state', '$transitions', '$auth'];

    function RoutesRun($state, $transitions, $auth) {
        $transitions.onBefore({
            to: function($state){
                return $state.data && $state.data.auth;
            }
        }, function () {
            if (!$auth.isAuthenticated()) {
                return $state.target('app.login', undefined, {location: true});
            }
        }, {priority:10});
    }
})();