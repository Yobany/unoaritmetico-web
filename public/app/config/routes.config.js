(function() {
    'use strict';

    angular
        .module('app')
        .config(RoutesConfig);

    RoutesConfig.$inject = ['$stateProvider','$urlRouterProvider'];

    function RoutesConfig($stateProvider, $urlRouterProvider) {
        let getView = (viewName) => {
            return `./views/app/pages/${viewName}/${viewName}.page.html`;
        };

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
                        templateUrl: 'app/module/core/header.page.html'
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
                        templateUrl: 'app/module/core/landing.page.html'
                    }
                }
            })
            .state('app.login', {
                url: '/login',
                views: {
                    'main@': {
                        templateUrl: getView('login')
                    }
                }
            })
            .state('app.register', {
                url: '/register',
                views: {
                    'main@': {
                        templateUrl: getView('register')
                    }
                }
            })
            .state('app.activate', {
                url: '/auth/activate?token',
                views: {
                    'main@': {
                        templateUrl: getView('activate-account')
                    }
                }
            })
            .state('app.forgot_password', {
                url: '/auth/recover',
                views: {
                    'main@': {
                        templateUrl: getView('forgot-password')
                    }
                }
            })
            .state('app.reset_password', {
                url: '/auth/reset?token',
                views: {
                    'main@': {
                        templateUrl: getView('reset-password')
                    }
                }
            })
            .state('app.groups', {
                url: '/groups?page&per_page',
                views: {
                    'main@': {
                        templateUrl: getView('group-list')
                    }
                }
            })
            .state('app.students', {
                url: '/students?page&per_page',
                views: {
                    'main@': {
                        templateUrl: getView('student-list')
                    }
                }
            })
            .state('app.student-details', {
                url: '/students/:id',
                views: {
                    'main@': {
                        templateUrl: getView('student-details')
                    }
                }
            });
    }
})();