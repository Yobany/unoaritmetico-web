(function () {
    'use strict';

    angular
        .module('app')
        .controller('StudentFormController', StudentFormController);

    StudentFormController.$inject =
        [
            'Student',
            'Group',
            'entity',
            '$uibModalInstance'
        ];

    function StudentFormController(Student,
                                   Group,
                                   entity,
                                   $uibModalInstance) {

        let vm = this;

        Group.query(function(groupCollection){
            vm.groups = groupCollection.data;
        });

        vm.student = entity;
        vm.student.group = vm.student.group.data;
        vm.action = (entity.id) ? "Editar" : "Agregar";
        vm.clear = clear;

        function clear () {
            $uibModalInstance.dismiss('cancel');
        }

        vm.submit = function () {
            let request = {
                name: vm.student.name,
                age: vm.student.age,
                group: vm.student.group.id
            };
            if (vm.student.id) {
                Student.update({ id: vm.student.id }, request, onSuccess);
            } else {
                Student.save(request, onSuccess);
            }
        };

        function onSuccess(){
            $uibModalInstance.close(true);
        }

    }
})();