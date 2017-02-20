class StudentDetailsController{
    constructor($stateParams, API, $window){
        'ngInject';
        this.$stateParams = $stateParams;
        this.API = API;
        this.$window = $window;
    }

    $onInit(){
        this.API.one("students", this.$stateParams.id).get().then((result) => {
            this.student = result;
            this.$window.console.log(result);
        });
    }

    show(game){

    }
}

export const StudentDetailsComponent = {
    templateUrl: './views/app/components/student-details/student-details.component.html',
    controller: StudentDetailsController,
    controllerAs: 'vm',
    bindings: {}
};
