(function () {
    'use strict';

    angular
        .module('app')
        .controller('AppHeaderController', AppHeaderController);

    AppHeaderController.$inject =
        [
            '$auth',
            '$state',
            '$window',
            '$location'
        ];

    function AppHeaderController($auth,
                                 $state,
                                 $window,
                                 $location) {

        let vm = this;
        
        vm.isAuthenticated = $auth.isAuthenticated();
        vm.urlContains = urlContains;
        vm.logout = logout;
        vm.goBack = goBack;

        function urlContains(stateName){
            return $location.url().includes(stateName);
        }

        function goBack() {
            $window.history.back();
        }

        function logout() {
            $auth.logout();
            $state.go('app.landing', {}, {reload: true});
        }
    }
})();