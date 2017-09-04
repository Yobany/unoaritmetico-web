(function () {
    'use strict';

    angular
        .module('app')
        .controller('GroupListController', GroupListController);

    GroupListController.$inject =
        [
            'Group',
            'EntitySearchHelper'
        ];

    function GroupListController(Group,
                                 EntitySearchHelper) {

        let vm = this;

        vm.groupSearch = EntitySearchHelper.getDefaultSearch(Group);
        vm.groupSearch.config.emptyResultMessages = true;
        vm.groupSearch.search();
    }
})();