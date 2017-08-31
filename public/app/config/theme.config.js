(function() {
    'use strict';

    angular
        .module('app')
        .config(ThemeConfig);

    ThemeConfig.$inject = ['$mdThemingProvider'];

    function ThemeConfig($mdThemingProvider) {
        /* For more info, visit https://material.angularjs.org/#/Theming/01_introduction */
        $mdThemingProvider.theme('default')
            .primaryPalette('light-blue', {
                default: '600'
            })
            .accentPalette('deep-purple')
            .warnPalette('red');

        $mdThemingProvider.theme('warn');
    }
})();
