document.addEventListener("DOMContentLoaded", function(){
    const nombreid = document.getElementById("nombreid");
    const apellidoid = document.getElementById("apellidoid");
    const nombreuid = document.getElementById("nombreuid");
    const contraid = document.getElementById("contraid");
    
    const editable = document.getElementById("editable");
    const cancelable = document.getElementById("cancelable");
    const guardable = document.getElementById("guardable");
    const regresable = document.getElementById("regresable");

    let valornombreid = nombreid.value;
    let valorapellidoid = apellidoid.value;
    let valornombreuid = nombreuid.value;
    let valorcontraid = contraid.value;

    editable.addEventListener("click", function() {
        valornombreid = nombreid.value;
        valorapellidoid = apellidoid.value;
        valornombreuid = nombreuid.value;
        valorcontraid = contraid.value;
        nombreid.disabled = false;
        apellidoid.disabled = false;
        nombreuid.disabled = false;
        contraid.disabled = false;
        editable.classList.add("hidden");
        cancelable.classList.remove("hidden");
        guardable.classList.remove("hidden");
        regresable.classList.add("hidden");
    });

    guardable.addEventListener("click", function() {
        nombreid.disabled = true;
        apellidoid.disabled = true;
        nombreuid.disabled = true;
        contraid.disabled = true;
        editable.classList.remove("hidden");
        cancelable.classList.add("hidden");
        guardable.classList.add("hidden");
        regresable.classList.remove("hidden");
    });

    cancelable.addEventListener("click", function() {
        nombreid.value = valornombreid;
        apellidoid.value = valorapellidoid;
        nombreuid.value = valornombreuid;
        contraid.value = valorcontraid;
        nombreid.disabled = true;
        apellidoid.disabled = true;
        nombreuid.disabled = true;
        contraid.disabled = true;
        editable.classList.remove("hidden");
        cancelable.classList.add("hidden");
        guardable.classList.add("hidden");
        regresable.classList.remove("hidden");
    });
});