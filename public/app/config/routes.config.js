(function() {
    'use strict';

    angular
        .module('app')
        .config(RoutesConfig);

    RoutesConfig.$inject = ['$stateProvider','$urlRouterProvider'];

    function RoutesConfig($stateProvider, $urlRouterProvider) {

        $urlRouterProvider.otherwise('/');

        /*
         data: {auth: true} would require JWT auth
         However you can't apply it to the abstract state
         or landing state because you'll enter a redirect loop
         */

        $stateProvider
            .state('app', {
                abstract: true,
                data: {},
                views: {
                    header: {
                        templateUrl: 'app/module/core/header.page.html',
                        controller: 'AppHeaderController',
                        controllerAs: 'vm'
                    },
                    footer: {
                        templateUrl: 'app/module/core/footer.page.html'
                    },
                    main: {}
                }
            })
            .state('app.landing', {
                url: '/',
                views: {
                    'main@': {
                        templateUrl: 'app/module/core/core.page.html'
                    }
                }
            })
            .state('app.login', {
                url: '/login',
                views: {
                    'main@': {
                        templateUrl: 'app/module/login/login.page.html',
                        controller: 'LoginController',
                        controllerAs: 'vm'
                    }
                }
            })
            .state('app.register', {
                url: '/register',
                views: {
                    'main@': {
                        templateUrl: 'app/module/register/register.page.html',
                        controller: 'RegisterController',
                        controllerAs: 'vm'
                    }
                }
            })
            .state('app.activate', {
                url: '/auth/activate?token',
                views: {
                    'main@': {
                        templateUrl: 'app/module/account/activate-account.page.html',
                        controller: 'ActivateAccount',
                        controllerAs: 'vm'
                    }
                }
            })
            .state('app.forgot_password', {
                url: '/auth/recover',
                views: {
                    'main@': {
                        templateUrl: 'app/module/password/forgot-password.page.html',
                        controller: 'ForgotPasswordController',
                        controllerAs: 'vm'
                    }
                }
            })
            .state('app.reset_password', {
                url: '/auth/reset?token',
                views: {
                    'main@': {
                        templateUrl: 'app/module/password/reset-password.page.html',
                        controller: 'ResetPasswordController',
                        controllerAs: 'vm'
                    }
                }
            })
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
            .state('app.students', {
                url: '/students?page&per_page',
                views: {
                    'main@': {
                        templateUrl: 'app/module/students/student-list.page.html',
                        controller: 'StudentListController',
                        controllerAs: 'vm'
                    }
                }
            })
            .state('app.student-details', {
                url: '/students/:id',
                views: {
                    'main@': {
                        templateUrl: 'app/module/students/student-details.page.html',
                        controller: 'StudentDetailsController',
                        controllerAs: 'vm'
                    }
                }
            });
    }
})();