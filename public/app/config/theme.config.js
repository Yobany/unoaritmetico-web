(function() {
    'use strict';

    angular
        .module('app')
        .config(ThemeConfig);

    ThemeConfig.$inject = ['$mdThemingProvider'];

    function ThemeConfig($mdThemingProvider) {
        /* For more info, visit https://material.angularjs.org/#/Theming/01_introduction */
        $mdThemingProvider.theme('default')
            .primaryPalette('indigo')
            .accentPalette('pink')
            .warnPalette('red');

        $mdThemingProvider.theme('warn');
    }
})();
