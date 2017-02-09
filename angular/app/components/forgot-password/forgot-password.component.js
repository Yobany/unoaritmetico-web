class ForgotPasswordController {
    constructor(API, ToastService, $state) {
        'ngInject';

        this.API = API;
        this.$state = $state;
        this.ToastService = ToastService;
    }

    $onInit(){
        this.email = '';
        this.isSending = false;
    }

    submit() {
        this.isSending = true;
        this.API.all('auth/password/recover').post({
            email: this.email
        }).then(() => {
            this.isSending = false;
            this.ToastService.show(`Te hemos enviado un enlace para recuperar tu cuenta, revisa tu correo`);
            this.$state.go('app.landing');
        });
    }
}

export const ForgotPasswordComponent = {
    templateUrl: './views/app/components/forgot-password/forgot-password.component.html',
    controller: ForgotPasswordController,
    controllerAs: 'vm',
    bindings: {}
}
