class GroupListController{
    constructor(API, $mdDialog, $state){
        'ngInject';
        this.API = API;
        this.$mdDialog = $mdDialog;
        this.$state = $state;
    }

    $onInit(){
        this.groups = [];
        this.API.all('groups').getList().then((results)=>{
            this.groups = results;
        });
    }


    confirmDeletion(group) {
        let confirm = this.$mdDialog.confirm()
            .title('¿Deseas eliminar el grupo ' + group.name)
            .textContent('Todos los alumnos pertenecientes al grupo se eliminaran')
            .ariaLabel('Confirmar operación')
            .ok('SI')
            .cancel('NO');

        let component = this;

        this.$mdDialog.show(confirm).then(function() {
            group.remove().then(()=>{
                component.$state.reload();
            });
        });
    }

    createGroup(ev) {
        let confirm = this.$mdDialog.prompt()
            .title('Crear nuevo grupo')
            .placeholder('Nombre')
            .ariaLabel('nombre')
            .targetEvent(ev)
            .ok('Guardar')
            .cancel('Cancelar');

        let component = this;

        this.$mdDialog.show(confirm).then((result) => {
            component.API.all('groups').post({name : result}).then(()=>{
                component.$state.reload();
            });
        });
    }
}

export const GroupListComponent = {
    templateUrl: './views/app/components/group-list/group-list.component.html',
    controller: GroupListController,
    controllerAs: 'vm',
    bindings: {}
}
