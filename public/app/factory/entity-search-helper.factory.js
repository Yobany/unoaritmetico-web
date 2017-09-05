(function () {
    'use strict';

    angular
        .module('app')
        .factory('EntitySearchHelper', EntitySearchHelper);

    EntitySearchHelper.$inject = ['ToastService'];

    function EntitySearchHelper(ToastService) {
        let factory = {};

        /**
         * @param service
         * @param method
         * @return {*}
         */
        factory.getDefaultSearch = function (service, method) {
            if (typeof method === 'undefined') {
                method = 'query';
            }
            return {
                params: {
                    page: 1,
                    size: 5
                },
                config: {
                    errorMessages: false,
                    emptyResultMessages: false
                },
                onSearchSuccess: function (results, headers) {},
                onSearchError: function (error) {},
                filterParams: function(params) { return params },
                results: [],
                isSearching: false,
                total: 0,
                search: function () {
                    let self = this;
                    self.isSearching = true;
                    service[method](self.filterParams(self.params), success, error);
                    function success(results) {
                        self.onSearchSuccess(results.data, results.meta);
                        self.total = parseInt(results.meta.pagination.count, 10);
                        self.results = results.data;
                        if(!results.data.length && self.config.emptyResultMessages){
                            ToastService.show('No se encontraron resultados');
                        }
                        self.isSearching = false;
                    }

                    function error(error) {
                        self.onSearchError(error);
                        if(self.config.errorMessages){
                            ToastService.show(error.data.message);
                        }
                        self.isSearching = false;
                    }
                }
            };
        };

        return factory;
    }
})();