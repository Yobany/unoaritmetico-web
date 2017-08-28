(function () {
    'use strict';

    angular
        .module('app')
        .controller('GroupFormController', GroupFormController);

    GroupFormController.$inject =
        [
            'Group',
            'entity',
            '$uibModalInstance'
        ];

    function GroupFormController(Group,
                                 entity,
                                 $uibModalInstance) {

        let vm = this;

        vm.group = entity;
        vm.action = (entity.id) ? "Editar" : "Agregar";
        vm.clear = clear;

        function clear () {
            $uibModalInstance.dismiss('cancel');
        }

        vm.submit = function () {
            if (vm.group.id) {
                Group.update(vm.group, onSuccess, onError);
            } else {
                Group.save(vm.group, onSuccess, onError);
            }
        };

    }
})();