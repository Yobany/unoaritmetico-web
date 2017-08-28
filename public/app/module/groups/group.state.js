(function() {
    'use strict';

    angular
        .module('app')
        .config(RoutesConfig);

    RoutesConfig.$inject = ['$stateProvider'];

    function RoutesConfig($stateProvider) {
        $stateProvider
            .state('app.groups', {
                url: '/groups?page&per_page',
                views: {
                    'main@': {
                        templateUrl: 'app/module/groups/group-list.page.html',
                        controller: 'GroupListController',
                        controllerAs: 'vm'
                    }
                }
            })
            .state('app.groups.new', {
                url: '/new',
                onEnter: ['$stateParams', '$state', '$uibModal', function($stateParams, $state, $uibModal) {
                    $uibModal.open({
                        templateUrl: 'app/module/groups/group-form.page.html',
                        controller: 'GroupFormController',
                        controllerAs: 'vm',
                        backdrop: 'static',
                        size: 'lg',
                        resolve: {
                            entity: function () {
                                return {
                                    name: null
                                };
                            }
                        }
                    }).result.then(function() {
                        $state.go('app.groups', null, { reload: true });
                    }, function() {
                        $state.go('app.groups');
                    });
                }]
            });
    }
})();