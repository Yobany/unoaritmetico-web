class StudentDetailsController{
    constructor($stateParams, API, $mdDialog){
        'ngInject';
        this.$stateParams = $stateParams;
        this.API = API;
        this.$mdDialog = $mdDialog;
    }

    $onInit(){
        this.API.one("students", this.$stateParams.id).get().then((result) => {
            this.student = result;
        });
    }

    show(game){
        this.$mdDialog.show({
            template: "<md-dialog flex='60' aria-label='juegos'><game-details gameid='"+game.id+"'></game-details></md-dialog>",
            clickOutsideToClose:true
        }).then(() => {}, () => {});
    }
}

export const StudentDetailsComponent = {
    templateUrl: './views/app/components/student-details/student-details.component.html',
    controller: StudentDetailsController,
    controllerAs: 'vm',
    bindings: {}
};
