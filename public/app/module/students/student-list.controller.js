(function () {
    'use strict';

    angular
        .module('app')
        .controller('StudentListController', StudentListController);

    StudentListController.$inject =
        [
            'API',
            '$mdDialog',
            '$state'
        ];

    function StudentListController(API,
                                   $mdDialog,
                                   $state) {

        let vm = this;

        vm.API = API;
        vm.$mdDialog = $mdDialog;
        vm.$state = $state;
        vm.students = [];
        vm.fetchStudents();

        vm.confirmDeletion = function (student) {
            let confirm = vm.$mdDialog.confirm()
                .title('¿Deseas eliminar el estudiante "' + student.name + '"')
                .textContent('Todas las partidas relacionadas a este estudiante se eliminaran')
                .ariaLabel('Confirmar operación')
                .ok('SI')
                .cancel('NO');

            let component = vm;

            vm.$mdDialog.show(confirm).then(function () {
                student.remove().then(() => {
                    component.fetchStudents();
                }, () => {
                });
            });
        };

        vm.fetchStudents = function () {
            vm.isLoading = true;
            vm.API.all('students').getList().then((results) => {
                vm.students = results;
                vm.isLoading = false;
            }, () => {
            });
        };

    }
})();