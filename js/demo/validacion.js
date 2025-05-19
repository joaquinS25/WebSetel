document.addEventListener("DOMContentLoaded", function() {
    let nombreu = document.getElementById("nombreu");
    let contra = document.getElementById("contra");
    let nombresc = document.getElementById("nombresc");
    let apellidosc = document.getElementById("apellidosc");
    let contrac = document.getElementById("contrac");
    let enviar = document.getElementById("enviar");
    let enviar2 = document.getElementById("enviar2");

    function validarInput() {
        let vale1 = nombreu.value.trim();
        let vale2 = contra.value.trim();
        if (vale1 !== "" && vale2 !== "") {
            enviar.classList.remove("disabled");
        } else {
            enviar.classList.add("disabled");
        }
    }
    nombreu.addEventListener("input", validarInput);
    contra.addEventListener("input", validarInput);
    function validarInput2() {
        let vale1 = nombreu.value.trim();
        let vale2 = contra.value.trim();
        let vale3 = nombresc.value.trim();
        let vale4 = apellidosc.value.trim();
        let vale5 = contrac.value.trim();
        if (vale1 !== "" && vale2 !== "" && vale3 !== "" && vale4 !== "" && vale5 !== "") {
            enviar2.classList.remove("disabled");
        } else {
            enviar2.classList.add("disabled");
        }
    }
    nombreu.addEventListener("input", validarInput2);
    contra.addEventListener("input", validarInput2);
    nombresc.addEventListener("input", validarInput2);
    apellidosc.addEventListener("input", validarInput2);
    contrac.addEventListener("input", validarInput2);
});