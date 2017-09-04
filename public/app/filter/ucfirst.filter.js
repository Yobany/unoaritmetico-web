(function () {
    'use strict';

    angular
        .module('app')
        .filter('UcFirstFilter', UcFirstFilter);

    UcFirstFilter.$inject = ['$sce'];

    function UcFirstFilter(input) {
        if (!input) {
            return null;
        }
        return input.substring(0, 1).toUpperCase() + input.substring(1);
    }
})();