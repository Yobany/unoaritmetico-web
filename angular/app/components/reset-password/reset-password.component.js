class ResetPasswordController {
    constructor(API, ToastService, $state, $stateParams) {
        'ngInject';

        this.API = API;
        this.$state = $state;
        this.ToastService = ToastService;
        this.$stateParams = $stateParams;
    }

    $onInit(){
        this.password = '';
        this.passwordConfirmation = '';
        if(typeof this.$stateParams.token === 'undefined'){
            this.$state.go('app.landing');
        }
    }

    submit() {
        let data = {
            token: this.$stateParams.token,
            password: this.password,
            passwordConfirmation: this.passwordConfirmation
        };

        this.API.all('auth/password/reset').post(data).then(() => {
            this.ToastService.show('Tu contraseña ha sido actualizada, inicia sesión');
            this.$state.go('app.login');
        });
    }
}

export const ResetPasswordComponent = {
    templateUrl: './views/app/components/reset-password/reset-password.component.html',
    controller: ResetPasswordController,
    controllerAs: 'vm',
    bindings: {}
}
