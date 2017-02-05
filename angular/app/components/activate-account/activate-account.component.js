class ActivateAccountController {
    constructor(API, ToastService, $state, $stateParams) {
        'ngInject';

        this.API = API;
        this.$state = $state;
        this.ToastService = ToastService;
        this.$stateParams = $stateParams;
    }

    $onInit(){
        if(typeof this.$stateParams.token == 'undefined'){
            this.$state.go('app.landing');
        }else{
            this.verifyToken(this.$stateParams.token);
        }
    }

    verifyToken(token) {
        this.API.all('auth').get('activate', {
            token
        }).then(() => {
            this.ToastService.show('Tu cuenta esta ahora activada, inicia sesión');
            this.$state.go('app.login');
        }, () => {
            this.$state.go('app.landing');
        });
    }
}

export const ActivateAccountComponent = {
    templateUrl: './views/app/components/activate-account/activate-account.component.html',
    controller: ActivateAccountController,
    controllerAs: 'vm',
    bindings: {}
};
