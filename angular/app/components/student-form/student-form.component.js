class StudentFormController{
    constructor($mdDialog, API){
        'ngInject';
        this.$mdDialog = $mdDialog;
        this.API = API;
    }

    $onInit(){
        if(typeof this.student == 'undefined'){
            this.student = {
                name : null,
                age : null,
                group : null
            };
        }
        this.groups = [];
        this.fetchGroups();
        this.action = (this.student.id) ? "Editar" : "Agregar";

    }

    save() {
        let component = this;
        this.student.group_id = this.student.group.id;
        this.API.all('students').post(this.student).then(() => {
            component.$mdDialog.hide();
        }, () => {});
    }

    update(){
        let component = this;
        let updatedStudent = this.API.one("students", this.student.id);
        updatedStudent.name = this.student.name;
        updatedStudent.age = this.student.age;
        updatedStudent.group_id = this.student.group.id;
        updatedStudent.put().then(() => {
            component.$mdDialog.hide();
        }, () => {});
    }

    cancel(){
        this.$mdDialog.cancel();
    }

    submit(){
        if(this.student.id){
            this.update();
        }else{
            this.save();
        }
    }

    fetchGroups(){
        this.API.all('groups').getList().then((results)=>{
            this.groups = results;
        });
    }
}

export const StudentFormComponent = {
    templateUrl: './views/app/components/student-form/student-form.component.html',
    controller: StudentFormController,
    controllerAs: 'vm',
    bindings: {
        student : '<'
    }
};
