(function () {
    'use strict';

    angular
        .module('app')
        .controller('GroupFormController', GroupFormController);

    GroupFormController.$inject =
        [
            '$mdDialog', 
            'API'
        ];

    function GroupFormController($mdDialog,
                                 API) {

        let vm = this;

        vm.$mdDialog = $mdDialog;
        vm.API = API;


        if (vm.groupid) {
            vm.API.one("groups", vm.groupid).get().then((result) => {
                vm.group = result;
            });
        } else {
            vm.group = {
                name: null
            };
        }
        vm.action = (vm.groupid) ? "Editar" : "Agregar";


        vm.save = function () {
            vm.API.all('groups').post(vm.group).then(() => {
                vm.$mdDialog.hide();
            }, () => {
            });
        };

        vm.update = function () {
            let updatedGroup = vm.API.one("groups", vm.group.id);
            updatedGroup.name = vm.group.name;
            updatedGroup.put().then(() => {
                vm.$mdDialog.hide();
            }, () => {
            });
        };

        vm.cancel = function () {
            vm.$mdDialog.cancel();
        };

        vm.submit = function () {
            if (vm.group.id) {
                vm.update();
            } else {
                vm.save();
            }
        };

    }
})();