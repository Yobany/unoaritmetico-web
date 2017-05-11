class AppHeaderController{
    constructor($sce, $auth, $state, $window){
        'ngInject';

        this.$sce = $sce;
        this.$auth = $auth;
        this.$state = $state;
        this.$window = $window;
    }

    $onInit(){
        this.isAuthenticated = this.$auth.isAuthenticated();
    }

    historyBack(){
        this.$window.history.back();
    }

    logout(){
        this.$auth.logout();
        this.$state.go('app.landing', {}, {reload:true});
    }
}

export const AppHeaderComponent = {
    templateUrl: './views/app/components/app-header/app-header.component.html',
    controller: AppHeaderController,
    controllerAs: 'vm',
    bindings: {}
};
