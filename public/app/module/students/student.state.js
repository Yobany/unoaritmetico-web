/**
 * Created by pixco on 31/08/2017.
 */
(function() {
    'use strict';

    angular
        .module('app')
        .config(RoutesConfig);

    RoutesConfig.$inject = ['$stateProvider'];

    function RoutesConfig($stateProvider) {
        $stateProvider
            .state('app.students', {
                url: '/students',
                views: {
                    'main@': {
                        templateUrl: 'app/module/students/student-list.page.html',
                        controller: 'StudentListController',
                        controllerAs: 'vm'
                    }
                }
            })
            .state('app.students.new', {
                url: '/new',
                onEnter: ['$stateParams', '$state', '$uibModal', function($stateParams, $state, $uibModal) {
                    $uibModal.open({
                        templateUrl: 'app/module/students/student-form.page.html',
                        controller: 'StudentFormController',
                        controllerAs: 'vm',
                        size: 'md',
                        resolve: {
                            entity: function () {
                                return {
                                    name: null,
                                    age: null,
                                    group: {
                                        data: null
                                    }
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
            .state('app.students.edit', {
                url: '/{studentid}/edit',
                onEnter: ['$stateParams', '$state', '$uibModal', function($stateParams, $state, $uibModal) {
                    $uibModal.open({
                        templateUrl: 'app/module/students/student-form.page.html',
                        controller: 'StudentFormController',
                        controllerAs: 'vm',
                        size: 'md',
                        resolve: {
                            entity: ['Student', function(Student){
                                return Student.get({ id: $stateParams.studentid }).$promise;
                            }]
                        }
                    }).result.then(function() {
                        $state.go('^', null, { reload: true });
                    }, function() {
                        $state.go('^');
                    });
                }]
            })
            .state('app.students.detail', {
                url: '/{studentid}/detail',
                views: {
                    'main@': {
                        templateUrl: 'app/module/students/student-details.page.html',
                        controller: 'StudentDetailsController',
                        controllerAs: 'vm'
                    }
                },
                resolve: {
                    entity: ['Student', '$stateParams', function(Student, $stateParams) {
                        return Student.get({id : $stateParams.studentid}).$promise;
                    }]
                }
            })
            .state('app.students.remove', {
                url: '/{studentid}/delete',
                onEnter: ['$stateParams', '$state', '$uibModal', function($stateParams, $state, $uibModal) {
                    $uibModal.open({
                        templateUrl: 'app/module/students/student-delete.page.html',
                        controller: 'StudentDeleteController',
                        controllerAs: 'vm',
                        size: 'md',
                        resolve: {
                            entity: ['Student', function(Student) {
                                return Student.get({id : $stateParams.studentid}).$promise;
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