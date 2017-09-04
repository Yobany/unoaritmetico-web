(function() {
    'use strict';

    angular
        .module('app')
        .filter('TrustHtmlFilter',TrustHtmlFilter);

    TrustHtmlFilter.$inject = ['$sce'];

    function TrustHtmlFilter(html) {
        return $sce.trustAsHtml(html);
    }
})();