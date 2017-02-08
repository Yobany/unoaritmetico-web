class StudentListController{
    constructor(API, $mdDialog, $state){
        'ngInject';
        this.API = API;
        this.$mdDialog = $mdDialog;
        this.$state = $state;
    }

    $onInit(){
        this.students = [];
        this.API.all('students').getList().then((results)=>{
            this.students = results;
        });
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
                component.$state.reload();
            });
        });
    }

    createGroup(ev) {
        let confirm = this.$mdDialog.prompt()
            .title('Crear nuevo estudiante')
            .placeholder('Nombre')
            .ariaLabel('nombre')
            .targetEvent(ev)
            .ok('Guardar')
            .cancel('Cancelar');

        let component = this;

        this.$mdDialog.show(confirm).then((result) => {
            component.API.all('students').post({name : result}).then(()=>{
                component.$state.reload();
            });
        });
    }
}

export const StudentListComponent = {
    templateUrl: './views/app/components/student-list/student-list.component.html',
    controller: StudentListController,
    controllerAs: 'vm',
    bindings: {}
}
