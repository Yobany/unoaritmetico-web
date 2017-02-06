class GroupListController{
    constructor(API){
        'ngInject';
        this.API = API;
    }

    $onInit(){
        this.groups = [];
        this.API.all('groups').getList().then((results)=>{
            this.groups = results;
        });
    }
}

export const GroupListComponent = {
    templateUrl: './views/app/components/group-list/group-list.component.html',
    controller: GroupListController,
    controllerAs: 'vm',
    bindings: {}
}
