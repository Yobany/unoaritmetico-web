(function () {
    'use strict';

    angular
        .module('app')
        .filter('CapitalizeFilter', CapitalizeFilter);

    CapitalizeFilter.$inject = [];

    function CapitalizeFilter(input) {
        return (input) ? input.replace(/([^\W_]+[^\s-]*) */g, function (txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        }) : '';
    }
})();