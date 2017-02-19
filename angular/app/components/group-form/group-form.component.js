class GroupFormController{
    constructor($mdDialog, API){
        'ngInject';
        this.$mdDialog = $mdDialog;
        this.API = API;
    }

    $onInit(){
        if(this.groupid){
            this.API.one("groups", this.groupid).get().then((result)=>{
                this.group = result;
            });
        }else{
            this.group = {
                name : null
            };
        }
        this.action = (this.groupid) ? "Editar" : "Agregar";
    }

    save() {
        this.API.all('groups').post(this.group).then(() => {
            this.$mdDialog.hide();
        }, () => {});
    }

    update(){
        let updatedGroup = this.API.one("groups", this.group.id);
        updatedGroup.name = this.group.name;
        updatedGroup.put().then(() => {
            this.$mdDialog.hide();
        }, () => {});
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
        groupid : '@'
    }
};
