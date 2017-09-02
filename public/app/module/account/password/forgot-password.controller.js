(function () {
    'use strict';

    angular
        .module('app')
        .controller('ForgotPasswordController', ForgotPasswordController);

    ForgotPasswordController.$inject =
        [
            'Account',
            'ToastService',
            '$state'
        ];

    function ForgotPasswordController(Account,
                                      ToastService,
                                      $state) {
        let vm = this;
        vm.email = '';
        vm.isSending = false;
        vm.submit = submit;

        function submit () {
            vm.isSending = true;
            Account.passwordRecover({
                email: vm.email
            }, function(){
                vm.isSending = false;
                ToastService.show(`Te hemos enviado un enlace para recuperar tu cuenta, revisa tu correo`);
                $state.go('app.landing');
            });
        }

    }
})();