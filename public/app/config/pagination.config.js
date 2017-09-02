(function() {
    'use strict';

    angular
        .module('app')
        .config(paginationConfig);

    paginationConfig.$inject = ['uibPaginationConfig'];

    function paginationConfig(uibPaginationConfig) {
        uibPaginationConfig.maxSize = 5;
        uibPaginationConfig.boundaryLinks = true;
        uibPaginationConfig.firstText = '«';
        uibPaginationConfig.previousText = '‹';
        uibPaginationConfig.nextText = '›';
        uibPaginationConfig.lastText = '»';
    }
})();