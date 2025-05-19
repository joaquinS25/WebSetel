function actualizarReloj() {
    const ahora = new Date();
    const horas = ahora.getHours().toString().padStart(2, '0');
    const minutos = ahora.getMinutes().toString().padStart(2, '0');
    const segundos = ahora.getSeconds().toString().padStart(2, '0');
    document.getElementById("reloj").textContent = `${horas}:${minutos}:${segundos}`;
}

// Actualizar cada segundo
setInterval(actualizarReloj, 1000);

// Mostrar la hora inmediatamente al cargar la página
document.addEventListener("DOMContentLoaded", actualizarReloj);