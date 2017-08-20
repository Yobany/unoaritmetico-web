(function () {
    'use strict';

    angular
        .module('app')
        .controller('StudentFormController', StudentFormController);

    StudentFormController.$inject =
        [
            '$mdDialog',
            'API'
        ];

    function StudentFormController($mdDialog,
                                   API) {

        let vm = this;

        vm.$mdDialog = $mdDialog;
        vm.API = API;
        if (vm.studentid) {
            vm.API.one("students", vm.studentid).get().then((result) => {
                vm.student = result;
            });
        } else {
            vm.student = {
                name: null,
                age: null,
                group: null
            };
        }
        vm.action = (vm.studentid) ? "Editar" : "Agregar";


        vm.save = function () {
            let component = vm;
            vm.student.group = vm.student.group.id;
            vm.API.all('students').post(vm.student).then(() => {
                component.$mdDialog.hide();
            }, () => {
            });
        };

        vm.update = function () {
            let component = vm;
            let updatedStudent = vm.API.one("students", vm.student.id);
            updatedStudent.name = vm.student.name;
            updatedStudent.age = vm.student.age;
            updatedStudent.group = vm.student.group.id;
            updatedStudent.put().then(() => {
                component.$mdDialog.hide();
            }, () => {
            });
        };

        vm.cancel = function () {
            vm.$mdDialog.cancel();
        };

        vm.submit = function () {
            if (vm.student.id) {
                vm.update();
            } else {
                vm.save();
            }
        };

        vm.fetchGroups = function () {
            vm.groups = [];
            vm.API.all('groups').getList().then((results) => {
                vm.groups = results;
            });
        };

    }
})();