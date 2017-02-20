class GameDetailsController{
    constructor(API, $mdDialog){
        'ngInject';
        this.API = API;
        this.$mdDialog = $mdDialog;
    }

    $onInit(){
        this.API.one("games", this.gameid).get().then((result) => {
            this.game = result;
        });
    }

    getDescription(card){
        let description = "";
        if(card.operation){
            description += "Operacion " + card.operation + " = " + card.result;
        }else if(card.power){
            description += "Poder " + card.power.name;
        }
        if(card.color){
            description += " Color " + card.color.name;
        }
        return description;
    }

    cancel(){
        this.$mdDialog.cancel();
    }
}

export const GameDetailsComponent = {
    templateUrl: './views/app/components/game-details/game-details.component.html',
    controller: GameDetailsController,
    controllerAs: 'vm',
    bindings: {
        gameid : '@'
    }
}
