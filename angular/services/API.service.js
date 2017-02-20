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
                        $state.go('app.landing',{},{reload:true});
                    }
                    if (response.status === 422) {
                        for (let error in response.data.errors) {
                            return ToastService.error(response.data.errors[error][0]);
                        }
                    }
                    if (response.status === 500) {
                        return ToastService.error(response.responseText)
                    }
                    if (response.status === 400) {
                        return ToastService.error(response.data.message)
                    }
                })
                .addResponseInterceptor(function(data) {
                    let extractedData;
                    if(typeof data.meta != 'undefined' && typeof data.data != 'undefined'){
                        extractedData = data.data;
                        extractedData.meta = data.meta;
                    }else{
                        extractedData = data;
                    }
                    return extractedData;
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
