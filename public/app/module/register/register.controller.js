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
        vm.$auth = $auth;
        vm.ToastService = ToastService;
        vm.$state = $state;
        vm.firstName = '';
        vm.lastName = '';
        vm.email = '';
        vm.password = '';
        vm.passwordConfirmation = '';
        vm.isRegistering = false;
        if (vm.$auth.isAuthenticated()) {
            vm.$state.go('app.landing');
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
            vm.$auth.signup(user)
                .then(() => {
                    vm.ToastService.show('Te hemos enviado un correo de confirmación, activa tu cuenta');
                    vm.isRegistering = false;
                    vm.$state.go('app.landing');
                })
                .catch(vm.failedRegistration);
        };


        vm.failedRegistration = function (response) {
            vm.isRegistering = false;
            if (response.status === 422) {
                for (let error in response.data.errors) {
                    return vm.ToastService.error(response.data.errors[error][0]);
                }
            }
            if (response.status === 400) {
                vm.ToastService.error(response.data.message);
            }
            vm.ToastService.error(response.responseText);
        };

    }
})();
