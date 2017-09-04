(function () {
    'use strict';

    angular
        .module('app')
        .controller('StudentListController', StudentListController);

    StudentListController.$inject =
        [
            'Student',
            'Group',
            'EntitySearchHelper'
        ];

    function StudentListController(Student,
                                   Group,
                                   EntitySearchHelper) {
        let vm = this;

        Group.query(function(groupCollection){
            vm.groups = groupCollection.data;
        });

        vm.studentSearch = EntitySearchHelper.getDefaultSearch(Student);
        vm.studentSearch.params.group = "T";
        vm.studentSearch.config.emptyResultMessages = true;
        vm.studentSearch.filterParams = function(params) {
            let allGroupsSelected = params.group && params.group === "T";
            if(allGroupsSelected){
                delete params.group;
            }
            return params;
        };
        vm.studentSearch.search();
    }
})();