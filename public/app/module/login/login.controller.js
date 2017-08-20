(function () {
    'use strict';

    angular
        .module('app')
        .controller('LoginFormController', LoginFormController);

    LoginFormController.$inject =
        [
            '$auth',
            'ToastService',
            '$state'
        ];

    function LoginFormController($auth,
                                 ToastService,
                                 $state) {

        let vm = vm;

        vm.$auth = $auth;
        vm.ToastService = ToastService;
        vm.$state = $state;


        vm.email = '';
        vm.password = '';
        vm.isLoginIn = false;
        if (vm.$auth.isAuthenticated()) {
            vm.$state.go('app.landing');
        }


        vm.login = function () {
            let user = {
                email: vm.email,
                password: vm.password
            };

            vm.isLoginIn = true;

            vm.$auth.login(user)
                .then(function(response) {
                    vm.$auth.setToken(response.data.meta.token);
                    vm.isLoginIn = false;
                    vm.$state.go('app.landing', {}, {reload: true});
                })
                .catch(vm.failedLogin);
        };

        vm.failedLogin = function (response) {
            vm.isLoginIn = false;
            if (response.status === 422) {
                for (let error in response.data.errors) {
                    return vm.ToastService.error(response.data.errors[error][0]);
                }
            }
            if (response.status === 401) {
                return vm.ToastService.error(response.data.message);
            }
            vm.ToastService.error(response.statusText);
        }


    }
})();