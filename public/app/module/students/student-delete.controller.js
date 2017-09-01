(function() {
    'use strict';

    angular
        .module('app')
        .controller('StudentDeleteController',StudentDeleteController);

    StudentDeleteController.$inject =
        [
            '$uibModalInstance',
            'entity',
            'Student'
        ];

    function StudentDeleteController($uibModalInstance,
                                     entity,
                                     Student) {
        let vm = this;

        vm.student = entity;
        vm.clear = clear;
        vm.remove = remove;

        function clear () {
            $uibModalInstance.dismiss('cancel');
        }

        function remove() {
            Student.delete({ id: vm.student.id }, function () {
                $uibModalInstance.close(true);
            });
        }
    }
})();