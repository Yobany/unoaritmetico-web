(function () {
    'use strict';

    angular
        .module('app')
        .controller('RegisterController', RegisterController);

    RegisterController.$inject =
        [
            '$auth',
            'ToastService',
            '$state'
        ];

    function RegisterController($auth,
                                ToastService,
                                $state) {

        let vm = this;
        vm.firstName = '';
        vm.lastName = '';
        vm.email = '';
        vm.password = '';
        vm.passwordConfirmation = '';
        vm.isRegistering = false;
        if ($auth.isAuthenticated()) {
            $state.go('app.landing');
        }


        vm.register = function () {
            let user = {
                firstName: vm.firstName,
                lastName: vm.lastName,
                email: vm.email,
                password: vm.password,
                passwordConfirmation: vm.passwordConfirmation
            };
            vm.isRegistering = true;
            $auth.signup(user)
                .then(() => {
                    ToastService.show('Te hemos enviado un correo de confirmación, activa tu cuenta');
                    vm.isRegistering = false;
                    $state.go('app.landing');
                })
                .catch(vm.failedRegistration);
        };


        vm.failedRegistration = function (response) {
            vm.isRegistering = false;
        };

    }
})();
