(function() {
    'use strict';

    angular
        .module('app')
        .config(RoutesConfig);

    RoutesConfig.$inject = ['$stateProvider'];

    function RoutesConfig($stateProvider) {
        $stateProvider
            .state('app.groups', {
                url: '/groups',
                data: {auth: true},
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
                        size: 'md',
                        resolve: {
                            entity: function () {
                                return {
                                    name: null
                                };
                            }
                        }
                    }).result.then(function() {
                        $state.go('^', null, { reload: true });
                    }, function() {
                        $state.go('^');
                    });
                }]
            })
            .state('app.groups.edit', {
                url: '/{groupid}/edit',
                onEnter: ['$stateParams', '$state', '$uibModal', function($stateParams, $state, $uibModal) {
                    $uibModal.open({
                        templateUrl: 'app/module/groups/group-form.page.html',
                        controller: 'GroupFormController',
                        controllerAs: 'vm',
                        size: 'md',
                        resolve: {
                            entity: ['Group', function(Group){
                                return Group.get({ id: $stateParams.groupid }).$promise;
                            }]
                        }
                    }).result.then(function() {
                        $state.go('^', null, { reload: true });
                    }, function() {
                        $state.go('^');
                    });
                }]
            })
            .state('app.groups.remove', {
                url: '/{groupid}/delete',
                onEnter: ['$stateParams', '$state', '$uibModal', function($stateParams, $state, $uibModal) {
                    $uibModal.open({
                        templateUrl: 'app/module/groups/group-delete.page.html',
                        controller: 'GroupDeleteController',
                        controllerAs: 'vm',
                        size: 'md',
                        resolve: {
                            entity: ['Group', function(Group) {
                                return Group.get({id : $stateParams.groupid}).$promise;
                            }]
                        }
                    }).result.then(function() {
                        $state.go('^', null, { reload: true });
                    }, function() {
                        $state.go('^');
                    });
                }]
            });
    }
})();