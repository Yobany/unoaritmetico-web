export function RoutesConfig($stateProvider, $urlRouterProvider) {
    'ngInject';

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
                    templateUrl: getView('header')
                },
                footer: {
                    templateUrl: getView('footer')
                },
                main: {}
            }
        })
        .state('app.landing', {
            url: '/',
            views: {
                'main@': {
                    templateUrl: getView('landing')
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
        });
}
