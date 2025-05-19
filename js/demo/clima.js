async function obtenerClima(idElemento) {
    const url = "https://api.open-meteo.com/v1/forecast?latitude=-12.04318&longitude=-77.02824&current=temperature_2m";
    
    try {
        const respuesta = await fetch(url);
        const datos = await respuesta.json();
        
        // Extraer la temperatura
        const temperatura = datos.current.temperature_2m;
        let iconos = "";
        if (temperatura >= 25) {
            icono = '🌡️ ';
        } else if (temperatura <= 11) {
            icono = '❄️ ';
        } else {
            icono = '⛅ ';
        }
        // Insertar la temperatura en el elemento con el ID proporcionado
        document.getElementById(idElemento).innerHTML = `${icono} ${temperatura}°C`;
    } catch (error) {
        console.error("Error obteniendo el clima:", error);
    }
}



// Llamar a la función pasando el ID del elemento HTML
obtenerClima("temperatura");
setInterval(() => {
    obtenerClima("temperatura");
}, 5 * 60 * 1000);