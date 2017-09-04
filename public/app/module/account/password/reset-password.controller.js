(function () {
    'use strict';

    angular
        .module('app')
        .controller('ResetPasswordController', ResetPasswordController);

    ResetPasswordController.$inject =
        [
            'Account',
            'ToastService',
            '$state',
            '$stateParams'
        ];

    function ResetPasswordController(Account,
                                     ToastService,
                                     $state,
                                     $stateParams) {

        let vm = this;
        vm.password = '';
        vm.passwordConfirmation = '';
        vm.submit = submit;

        if (typeof $stateParams.token === 'undefined') {
            $state.go('app.landing');
        }

        function submit() {
            Account.passwordReset({
                token: $stateParams.token,
                password: vm.password,
                passwordConfirmation: vm.passwordConfirmation
            }, function(){
                ToastService.show('Tu contraseña ha sido actualizada, inicia sesión');
                $state.go('app.login');
            });
        }

    }
})();