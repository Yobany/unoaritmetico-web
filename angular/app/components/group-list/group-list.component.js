class GroupListController{
    constructor(API, $mdDialog, $state){
        'ngInject';
        this.API = API;
        this.$mdDialog = $mdDialog;
        this.$state = $state;
    }

    $onInit(){
        this.groups = [];
        this.fetchGroups();
    }

    confirmDeletion(group) {
        let confirm = this.$mdDialog.confirm()
            .title('¿Deseas eliminar el grupo "' + group.name + '"')
            .textContent('Todos los alumnos pertenecientes al grupo se eliminaran')
            .ariaLabel('Confirmar operación')
            .ok('SI')
            .cancel('NO');

        this.$mdDialog.show(confirm).then(() => remove(group), () => {});

        let component = this;
        let remove = (group) => {
            group.remove().then(() => {
                component.fetchGroups();
            }, () => {});
        }
    }

    create() {
        this.$mdDialog.show({
            template: '<md-dialog flex="60" aria-label="grupos"><group-form></group-form></md-dialog>',
            clickOutsideToClose:true
        }).then( () => this.fetchGroups(), () => {});
    }

    edit(group){
        this.$mdDialog.show({
            template: "<md-dialog flex='60' aria-label='grupos'><group-form groupid='" + group.id + "'></group-form></md-dialog>",
            clickOutsideToClose:true
        }).then(() => this.fetchGroups(), () => {});
    }

    fetchGroups(){
        this.isLoading = true;
        this.API.all('groups').getList().then((results)=>{
            this.groups = results;
            this.isLoading = false;
        }, () => {});
    }
}

export const GroupListComponent = {
    templateUrl: './views/app/components/group-list/group-list.component.html',
    controller: GroupListController,
    controllerAs: 'vm',
    bindings: {}
};
