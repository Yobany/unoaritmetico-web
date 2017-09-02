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
        vm.submit = submit;

        function clear () {
            $uibModalInstance.dismiss('cancel');
        }

        function submit() {
            if (vm.group.id) {
                Group.update({ id: vm.group.id }, vm.group, onSuccess);
            } else {
                Group.save(vm.group, onSuccess);
            }
        }

        function onSuccess(){
            $uibModalInstance.close(true);
        }

    }
})();