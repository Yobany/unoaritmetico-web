(function () {
    'use strict';

    angular
        .module('app')
        .controller('GroupListController', GroupListController);

    GroupListController.$inject =
        [
            'API',
            '$mdDialog',
            '$state'
        ];

    function GroupListController(API,
                                 $mdDialog,
                                 $state) {

        let vm = this;
        vm.API = API;
        vm.$mdDialog = $mdDialog;
        vm.$state = $state;
        vm.groups = [];
        vm.fetchGroups = fetchGroups;

        vm.confirmDeletion = function (group) {
            let confirm = vm.$mdDialog.confirm()
                .title('¿Deseas eliminar el grupo "' + group.name + '"')
                .textContent('Todos los alumnos pertenecientes al grupo se eliminaran')
                .ariaLabel('Confirmar operación')
                .ok('SI')
                .cancel('NO');

            vm.$mdDialog.show(confirm).then(() => remove(group), () => {
            });

            let component = vm;
            let remove = (group) => {
                group.remove().then(() => {
                    component.fetchGroups();
                }, () => {
                });
            }
        };

        function fetchGroups() {
            vm.isLoading = true;
            vm.API.all('groups').getList().then((results) => {
                vm.groups = results;
                vm.isLoading = false;
            }, () => {
            });
        }

    }
})();