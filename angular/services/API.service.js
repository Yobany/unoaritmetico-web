export class APIService {
    constructor(Restangular, ToastService, $window, $state, $auth) {
        'ngInject';
        let headers = {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        };
        return Restangular.withConfig(function(RestangularConfigurer) {
            RestangularConfigurer
                .setBaseUrl('/api/')
                .setDefaultHeaders(headers)
                .setErrorInterceptor(function(response) {
                    if(response.status === 401){
                        $auth.logout();
                        $state.go('app.login',{},{reload:true});
                    }
                    if (response.status === 500) {
                        return ToastService.error(response.responseText)
                    }
                    if (response.status === 400) {
                        return ToastService.error(response.data.message)
                    }
                })
                .addResponseInterceptor(function(apiResponse) {
                    let transformedResponse;

                    if(typeof apiResponse.data !== 'undefined'){
                        transformedResponse = apiResponse.data;
                    }else{
                        transformedResponse = apiResponse;
                    }

                    if(typeof apiResponse.meta !== 'undefined'){
                        transformedResponse.meta = apiResponse.meta;
                    }

                    return transformedResponse;
                })
                .addFullRequestInterceptor(function(element, operation, what, url, headers) {
                    let token = $window.localStorage.satellizer_token;
                    if (token) {
                        headers.Authorization = 'Bearer ' + token;
                    }
                });
        });
    }
}
