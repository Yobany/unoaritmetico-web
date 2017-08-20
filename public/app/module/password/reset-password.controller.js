(function () {
    'use strict';

    angular
        .module('app')
        .controller('ResetPasswordController', ResetPasswordController);

    ResetPasswordController.$inject =
        [
            'API',
            'ToastService',
            '$state',
            '$stateParams'
        ];

    function ResetPasswordController(API,
                                     ToastService,
                                     $state,
                                     $stateParams) {

        let vm = this;
        vm.API = API;
        vm.$state = $state;
        vm.ToastService = ToastService;
        vm.$stateParams = $stateParams;
        vm.password = '';
        vm.passwordConfirmation = '';
        if (typeof vm.$stateParams.token === 'undefined') {
            vm.$state.go('app.landing');
        }

        vm.submit = function () {
            let data = {
                token: vm.$stateParams.token,
                password: vm.password,
                passwordConfirmation: vm.passwordConfirmation
            };

            vm.API.all('auth/password/reset').post(data).then(() => {
                vm.ToastService.show('Tu contraseña ha sido actualizada, inicia sesión');
                vm.$state.go('app.login');
            });
        }

    }
})();