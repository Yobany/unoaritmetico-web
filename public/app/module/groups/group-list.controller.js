(function () {
    'use strict';

    angular
        .module('app')
        .controller('GroupListController', GroupListController);

    GroupListController.$inject =
        [
            'Group',
            '$mdDialog',
            '$state',
            'EntitySearchHelper'
        ];

    function GroupListController(Group,
                                 $mdDialog,
                                 $state,
                                 EntitySearchHelper) {

        let vm = this;
        vm.$state = $state;
        vm.groups = [];
        vm.$mdDialog = $mdDialog;
        vm.fetchGroups = fetchGroups;
        vm.groupSearch = EntitySearchHelper.getDefaultSearch(Group);
        vm.groupSearch.config.emptyResultMessages = true;
        vm.groupSearch.search();

        function fetchGroups() {
            vm.isLoading = true;
            Group.query(function (groupsCollection) {
                vm.groups = groupsCollection.data;
                vm.isLoading = false;
            });
        }

    }
})();