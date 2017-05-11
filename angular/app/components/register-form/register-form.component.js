class RegisterFormController {
	constructor($auth, ToastService, $state) {
		'ngInject';

		this.$auth = $auth;
		this.ToastService = ToastService;
		this.$state = $state;
	}

    $onInit(){
        this.firstName = '';
        this.lastName = '';
        this.email = '';
        this.password = '';
        this.passwordConfirmation = '';
        this.isRegistering = false;
        if(this.$auth.isAuthenticated()){
            this.$state.go('app.landing');
        }
    }

	register() {
		let user = {
			firstName : this.firstName,
			lastName: this.lastName,
			email: this.email,
			password: this.password,
			passwordConfirmation: this.passwordConfirmation
		};
        this.isRegistering = true;
		this.$auth.signup(user)
			.then(() => {
				this.ToastService.show('Te hemos enviado un correo de confirmación, activa tu cuenta');
                this.isRegistering = false;
                this.$state.go('app.landing');
			})
			.catch(this.failedRegistration.bind(this));
	}



	failedRegistration(response) {
        this.isRegistering = false;
		if (response.status === 422) {
			for (let error in response.data.errors) {
				return this.ToastService.error(response.data.errors[error][0]);
			}
		}
		if(response.status === 400){
            this.ToastService.error(response.data.message);
		}
        this.ToastService.error(response.responseText);
	}
}

export const RegisterFormComponent = {
	templateUrl: './views/app/components/register-form/register-form.component.html',
	controller: RegisterFormController,
	controllerAs: 'vm',
	bindings: {}
};
