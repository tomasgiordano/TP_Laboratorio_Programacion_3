function AdministrarValidaciones():void 
{
    ValidarCamposVacios("Dni");
    ValidarCamposVacios("Nombre");
    ValidarCamposVacios("Apellido");
    ValidarCamposVacios("Legajo");
    ValidarCamposVacios("Sueldo");

    /*let campos:NodeListOf<HTMLElement>=document.getElementsByName("Elementos");
    for(let i=0;i<campos.length;i++){
        ValidarCamposVacios(campos[i].id);
    }*/

    if(!(ValidarRangoNumerico(1000000,55000000,parseInt((<HTMLInputElement>document.getElementById("Dni")).value)))){
        alert("Dni incorrecto");
    }

    if(!(ValidarRangoNumerico(100,150,parseInt((<HTMLInputElement>document.getElementById("Legajo")).value)))){
        alert("Legjao incorrecto");
    }

    if(!(ValidarCombo("cboSexo","---"))){
        alert("Seleccione un sexo");
    }

    let radio=ObtenerTurnoSeleccionado();
    let sueldo : number =parseInt((<HTMLInputElement>document.getElementById("Sueldo")).value);
    
    if(!(ValidarRangoNumerico(8000,ObtenerSueldoMaximo(radio),sueldo))){
        alert("Sueldo invalido");
    }
    
    
}

function ValidarCamposVacios(idCampo:string):boolean {

    if((<HTMLInputElement> document.getElementById(idCampo)).value.length!=0){
       
        return true;
    }
    alert("El campo "+ idCampo +" esta vacio");
    return false;
}


function ValidarRangoNumerico(min:number,max:number,valor:number):boolean{

    if(valor>=min&&valor<=max)
    {
        return true;
    }    
    return false;
}

function ValidarCombo(id:string,valorIncorrecto:string):boolean{
    if((<HTMLInputElement>document.getElementById(id)).value!=valorIncorrecto){
        return true;
    }
    return false;
}

function ObtenerTurnoSeleccionado():string{
    
       
        
        let checks : HTMLCollectionOf<HTMLInputElement> = <HTMLCollectionOf<HTMLInputElement>><unknown> document.getElementsByName("radios");
        let seleccionados : string = "";
         
        for(let i=0;i<checks.length;i++){
            let input = checks[i];

            if(input.checked===true){
                seleccionados+=input.id;
            }
        }

        return seleccionados;

   
}


function ObtenerSueldoMaximo(turno:string):number{
    switch(turno){
        case "Mañana":
            return 20000;
            break;

        case "Tarde":
            return 18500;
            break;

        case "Noche":
            return 25000;
            break;
            
    }

    return -1;
}


