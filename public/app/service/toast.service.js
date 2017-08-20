(function () {
    'use strict';
    angular
        .module('app')
        .factory('ToastService', ToastService);

    ToastService.$inject = ['$mdToast'];

    function ToastService($mdToast) {

        let factory = {};

        let vm = this;

        vm.$mdToast = $mdToast;
        vm.delay = 6000;
        vm.position = 'bottom left';
        vm.action = 'Entendido';


        factory.show = function (content) {
            if (!content) {
                return false;
            }

            return vm.$mdToast.show(
                vm.$mdToast.simple()
                    .content(content)
                    .position(vm.position)
                    .action(vm.action)
                    .hideDelay(vm.delay)
            );
        };

        factory.error = function (content) {
            if (!content) {
                return false;
            }

            return vm.$mdToast.show(
                vm.$mdToast.simple()
                    .content(content)
                    .position(vm.position)
                    .theme('warn')
                    .action(vm.action)
                    .hideDelay(vm.delay)
            );
        };

        return factory;
    }
})();