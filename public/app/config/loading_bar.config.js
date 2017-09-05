(function() {
    'use strict';

    angular
        .module('app')
        .config(LoadingBarConfig);

    LoadingBarConfig.$inject = ['cfpLoadingBarProvider'];

    function LoadingBarConfig(cfpLoadingBarProvider) {
        cfpLoadingBarProvider.includeSpinner = false;
    }
})();