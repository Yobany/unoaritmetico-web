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
            '$location',
            '$rootScope',
            'ToastService'
        ];

    function AppHeaderController($auth,
                                 $state,
                                 $window,
                                 $location,
                                 $rootScope,
                                 ToastService) {

        let vm = this;
        
        vm.isAuthenticated = $auth.isAuthenticated();
        vm.urlContains = urlContains;
        vm.logout = logout;
        vm.goBack = goBack;
        vm.isHomeUrl = isHomeUrl;

        if(typeof $rootScope.errorHandlingDefined === 'undefined'){
            $rootScope.$on('app.httpError', handleError);
            $rootScope.errorHandlingDefined = true;
        }

        function isHomeUrl() {
            return $location.url() === '/';
        }

        function urlContains(stateName) {
            return $location.url().includes(stateName);
        }

        function goBack() {
            $window.history.back();
        }

        function logout() {
            $auth.logout();
            $state.go('app.landing', {}, {reload: true});
        }

        function handleError(event, response) {
            event.stopPropagation();
            if(response.status === 500) {
                ToastService.error('Ha ocurrido un error inesperado');
            }
            if (response.status === 400 || response.status === 422) {
                ToastService.error(response.data.message);
            }
        }
    }
})();