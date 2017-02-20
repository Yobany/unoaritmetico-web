class LoginFormController {
    constructor($auth, ToastService, $state) {
        'ngInject';

        this.$auth = $auth;
        this.ToastService = ToastService;
        this.$state = $state;
    }

    $onInit(){
        this.email = '';
        this.password = '';
        this.isLoginIn = false;
        if(this.$auth.isAuthenticated()){
            this.$state.go('app.landing');
        }
    }

    login() {
        let user = {
            email: this.email,
            password: this.password
        };

        this.isLoginIn = true;

        this.$auth.login(user)
            .then((response)=> {
                this.$auth.setToken(response.data.meta.token);
                this.isLoginIn = false;
                this.$state.go('app.landing', {}, {reload:true});
            })
            .catch(this.failedLogin.bind(this));
    }

    failedLogin(response) {
        this.isLoginIn = false;
        if (response.status === 422) {
            for (let error in response.data.errors) {
                return this.ToastService.error(response.data.errors[error][0]);
            }
        }
        if(response.status === 401){
            return this.ToastService.error(response.data.message);
        }
        this.ToastService.error(response.statusText);
    }
}

export const LoginFormComponent = {
    templateUrl: './views/app/components/login-form/login-form.component.html',
    controller: LoginFormController,
    controllerAs: 'vm',
    bindings: {}
};
