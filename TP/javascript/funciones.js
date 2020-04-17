function AdministrarValidaciones() {
    /*let campos:NodeListOf<HTMLElement>=document.getElementsByName("Elementos");
    for(let i=0;i<campos.length;i++){
        ValidarCamposVacios(campos[i].id);
    }
    */
    ValidarCamposVacios("Dni");
    ValidarCamposVacios("Nombre");
    ValidarCamposVacios("Apellido");
    ValidarCamposVacios("Legajo");
    ValidarCamposVacios("Sueldo");
    if (!(ValidarRangoNumerico(1000000, 55000000, parseInt(document.getElementById("Dni").value)))) {
        alert("Dni incorrecto");
    }
    if (!(ValidarRangoNumerico(100, 150, parseInt(document.getElementById("Legajo").value)))) {
        alert("Legajo incorrecto");
    }
    if (!(ValidarCombo("Sexo", "Seleccione"))) {
        alert("Seleccione un sexo");
    }
    var radio = ObtenerTurnoSeleccionado();
    var sueldo = parseInt(document.getElementById("Sueldo").value);
    if (!(ValidarRangoNumerico(8000, ObtenerSueldoMaximo(radio), sueldo))) {
        alert("Sueldo invalido");
    }
}
function ValidarCamposVacios(idCampo) {
    if (document.getElementById(idCampo).value.length != 0) {
        return true;
    }
    alert("El campo " + idCampo + " esta vacio");
    return false;
}
function ValidarRangoNumerico(min, max, valor) {
    if (valor >= min && valor <= max) {
        return true;
    }
    return false;
}
function ValidarCombo(id, valorIncorrecto) {
    if (document.getElementById(id).value != valorIncorrecto) {
        return true;
    }
    return false;
}
function ObtenerTurnoSeleccionado() {
    var checks = document.getElementsByName("radios");
    var seleccionados = "";
    for (var i = 0; i < checks.length; i++) {
        var input = checks[i];
        if (input.checked === true) {
            seleccionados += input.id;
        }
    }
    return seleccionados;
}
function ObtenerSueldoMaximo(turno) {
    switch (turno) {
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
