document.addEventListener("DOMContentLoaded", function() {
    let nombreuc = document.getElementById("nombreuc");
    let enviar3 = document.getElementById("enviar3");

    function validarInput3() {
        let vale6 = nombreuc.value.trim();
        if (vale6 !== "") {
            enviar3.classList.remove("disabled");
        } else {
            enviar3.classList.add("disabled");
        }
    }
    nombreuc.addEventListener("input", validarInput3);
});