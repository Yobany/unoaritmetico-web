(function () {
    'use strict';

    angular
        .module('app')
        .controller('ActivateAccountController', ActivateAccountController);

    ActivateAccountController.$inject =
        [
            'Account',
            'ToastService',
            '$state',
            '$stateParams'
        ];

    function ActivateAccountController(Account,
                                       ToastService,
                                       $state,
                                       $stateParams) {

        let vm = this;
        vm.isValidToken = false;
        vm.verifyToken = verifyToken;

        if (typeof $stateParams.token === 'undefined') {
            $state.go('app.landing');
        } else {
            vm.verifyToken($stateParams.token);
        }

        function verifyToken(mailToken) {
            Account.activate({ token: mailToken }, function(){
                ToastService.show('Tu cuenta esta ahora activada, inicia sesión');
                $state.go('app.login');
            }, function(){
                $state.go('app.landing');
            });
        }
    }
})();