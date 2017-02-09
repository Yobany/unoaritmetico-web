import {GroupFormComponent} from './app/components/group-form/group-form.component';
import {StudentListComponent} from './app/components/student-list/student-list.component';
import {GroupListComponent} from './app/components/group-list/group-list.component';
import {AppHeaderComponent} from './app/components/app-header/app-header.component';
import {AppRootComponent} from './app/components/app-root/app-root.component';
import {AppShellComponent} from './app/components/app-shell/app-shell.component';
import {ResetPasswordComponent} from './app/components/reset-password/reset-password.component';
import {ForgotPasswordComponent} from './app/components/forgot-password/forgot-password.component';
import {LoginFormComponent} from './app/components/login-form/login-form.component';
import {RegisterFormComponent} from './app/components/register-form/register-form.component';
import {ActivateAccountComponent} from './app/components/activate-account/activate-account.component';

angular.module('app.components')
	.component('groupForm', GroupFormComponent)
	.component('studentList', StudentListComponent)
	.component('groupList', GroupListComponent)
	.component('appHeader', AppHeaderComponent)
	.component('appRoot', AppRootComponent)
	.component('appShell', AppShellComponent)
	.component('resetPassword', ResetPasswordComponent)
	.component('forgotPassword', ForgotPasswordComponent)
	.component('loginForm', LoginFormComponent)
	.component('registerForm', RegisterFormComponent)
    .component('activateAccount', ActivateAccountComponent);

