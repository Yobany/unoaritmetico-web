(function () {
    'use strict';

    angular
        .module('app')
        .controller('ForgotPasswordController', ForgotPasswordController);

    ForgotPasswordController.$inject =
        [
            'API',
            'ToastService',
            '$state'
        ];

    function ForgotPasswordController(API,
                                      ToastService,
                                      $state) {
        let vm = this;
        vm.API = API;
        vm.$state = $state;
        vm.ToastService = ToastService;
        vm.email = '';
        vm.isSending = false;


        vm.submit = function () {
            vm.isSending = true;
            vm.API.all('auth/password/recover').post({
                email: vm.email
            }).then(() => {
                vm.isSending = false;
                vm.ToastService.show(`Te hemos enviado un enlace para recuperar tu cuenta, revisa tu correo`);
                vm.$state.go('app.landing');
            });
        }

    }
})();