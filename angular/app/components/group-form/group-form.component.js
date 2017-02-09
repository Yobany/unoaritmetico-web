class GroupFormController{
    constructor($mdDialog, API){
        'ngInject';
        this.$mdDialog = $mdDialog;
        this.API = API;
    }

    $onInit(){
        if(typeof this.group == 'undefined'){
            this.group = {
                name : null
            };
        }
        this.action = (this.group.id) ? "Editar" : "Agregar";
    }

    save() {
        let component = this;
        this.API.all('groups').post(this.group).then(() => {
            component.$mdDialog.hide();
        }, () => {
            component.cancel();
        });
    }

    update(){
        let component = this;
        let updatedGroup = this.API.one("groups", this.group.id);
        updatedGroup.name = this.group.name;
        updatedGroup.put().then(() => {
            component.$mdDialog.hide();
        }, () => {
            component.cancel();
        });
    }

    cancel(){
        this.$mdDialog.cancel();
    }

    submit(){
        if(this.group.id){
            this.update();
        }else{
            this.save();
        }
    }
}

export const GroupFormComponent = {
    templateUrl: './views/app/components/group-form/group-form.component.html',
    controller: GroupFormController,
    controllerAs: 'vm',
    bindings: {
        group : '<'
    }
};
