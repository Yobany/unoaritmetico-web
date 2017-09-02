(function () {
    'use strict';

    angular
        .module('app')
        .controller('AppHeaderController', AppHeaderController);

    AppHeaderController.$inject =
        [
            '$sce',
            '$auth',
            '$state',
            '$window',
            '$location'
        ];

    function AppHeaderController($sce,
                                 $auth,
                                 $state,
                                 $window,
                                 $location) {

        let vm = this;

        vm.$sce = $sce;
        vm.$auth = $auth;
        vm.$state = $state;
        vm.$window = $window;
        vm.isAuthenticated = vm.$auth.isAuthenticated();
        vm.isCurrentState = isCurrentState;

        function isCurrentState(stateName){
            return $location.url().includes(stateName);
        }

        vm.historyBack = function () {
            vm.$window.history.back();
        };

        vm.logout = function () {
            vm.$auth.logout();
            vm.$state.go('app.landing', {}, {reload: true});
        };


    }
})();