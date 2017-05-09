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
            let operationData = this.student.stadistics.operation;
            this.operationsGraph = {
                data: [
                    operationData.additionCount,
                    operationData.multiplicationCount,
                    operationData.divisionCount,
                    operationData.substractionCount],
                labels : ["Suma","Multiplicacion", "División","Resta"],
                options: {
                    legend: {
                        display: true,
                    }
                }
            };
            let gameData = this.student.stadistics.game;
            this.gamesGraph = {
                data: [gameData.winnedCount, gameData.lostCount],
                labels : ["Ganadas","Perdidas"],
                options: {
                    legend: {
                        display: true,
                    }
                }
            };
        });
    }

    show(game){
        this.$mdDialog.show({
            template: "<md-dialog flex='80' aria-label='juegos'><game-details gameid='"+game.id+"'></game-details></md-dialog>",
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
