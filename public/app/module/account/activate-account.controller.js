(function () {
    'use strict';

    angular
        .module('app')
        .controller('ActivateAccountController', ActivateAccountController);

    ActivateAccountController.$inject =
        [
            'API',
            'ToastService',
            '$state',
            '$stateParams'
        ];

    function ActivateAccountController(API,
                                       ToastService,
                                       $state,
                                       $stateParams) {

        let vm = this;

        vm.API = API;
        vm.$state = $state;
        vm.ToastService = ToastService;
        vm.$stateParams = $stateParams;

        vm.isValidToken = false;
        if (typeof vm.$stateParams.token === 'undefined') {
            vm.$state.go('app.landing');
        } else {
            vm.verifyToken(vm.$stateParams.token);
        }

        vm.verifyToken = function (token) {
            vm.API.all('auth').get('activate', {
                token
            }).then(() => {
                vm.ToastService.show('Tu cuenta esta ahora activada, inicia sesión');
                vm.$state.go('app.login');
            }, () => {
                vm.$state.go('app.landing');
            });
        }
    }
})();