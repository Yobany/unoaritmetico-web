class StudentListController{
    constructor(API, $mdDialog, $state){
        'ngInject';
        this.API = API;
        this.$mdDialog = $mdDialog;
        this.$state = $state;
    }

    $onInit(){
        this.students = [];
        this.fetchStudents();
    }

    confirmDeletion(student) {
        let confirm = this.$mdDialog.confirm()
            .title('¿Deseas eliminar el estudiante "' + student.name + '"')
            .textContent('Todas las partidas relacionadas a este estudiante se eliminaran')
            .ariaLabel('Confirmar operación')
            .ok('SI')
            .cancel('NO');

        let component = this;

        this.$mdDialog.show(confirm).then(function() {
            student.remove().then(()=>{
                component.fetchStudents();
            }, () => {});
        });
    }

    create() {
        this.$mdDialog.show({
            template: '<md-dialog flex="60" aria-label="estudiantes"><student-form></student-form></md-dialog>',
            clickOutsideToClose:true
        }).then( () => this.fetchStudents(), () => {});
    }

    edit(student){
        this.$mdDialog.show({
            template: "<md-dialog flex='60' aria-label='estudiantes'><student-form studentid='"+student.id+"'></student-form></md-dialog>",
            clickOutsideToClose:true
        }).then(() => this.fetchStudents(), () => {});
    }

    fetchStudents(){
        this.isLoading = true;
        this.API.all('students').getList().then((results)=>{
            this.students = results;
            this.isLoading = false;
        }, () => {});
    }
}

export const StudentListComponent = {
    templateUrl: './views/app/components/student-list/student-list.component.html',
    controller: StudentListController,
    controllerAs: 'vm',
    bindings: {}
};
