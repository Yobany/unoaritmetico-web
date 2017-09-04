(function() {
    'use strict';

    angular
        .module('app')
        .controller('GroupDeleteController',GroupDeleteController);

    GroupDeleteController.$inject =
        [
            '$uibModalInstance',
            'entity',
            'Group'
        ];

    function GroupDeleteController($uibModalInstance,
                                   entity,
                                   Group) {
        let vm = this;

        vm.group = entity;
        vm.clear = clear;
        vm.remove = remove;

        function clear () {
            $uibModalInstance.dismiss('cancel');
        }

        function remove() {
            Group.delete({ id: vm.group.id }, function () {
                $uibModalInstance.close(true);
            });
        }
    }
})();