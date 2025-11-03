<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SETEL 2025</title>
    <?php require("vista/estilos.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Ajuste visual del contenedor del gráfico */
        .chart-area {
            position: relative;
            height: 500px; /* altura más amplia */
            width: 100%;
            padding: 20px;
        }

        .card {
            overflow: hidden; /* evita que se salga el gráfico */
        }

        /* Opcional: ajustar el ancho del contenedor de la card */
        @media (min-width: 1200px) {
            .col-xl-9 {
                flex: 0 0 75%;
                max-width: 75%;
            }
        }
    </style>
</head>
<body>

<div id="wrapper">
    <?php require("vista/menuv.php"); ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-dark topbar mb-4 static-top shadow">
                <?php require("vista/menuh.php"); ?>
            </nav>

            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-1 text-gray-800">Panel principal</h1>
                    <h1 id="reloj" class="h3 mb-1 text-gray-800"></h1>
                </div>
                <hr class="sidebar-divider">

                <!-- Tarjetas -->
                <!--div class="row">
                    <div class="col-xl-2 col-md-6 mb-4">
                        <div class="card border-left-dark shadow h-100 py-2">
                            <div class="card-body">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Temperatura (°C)
                                </div>
                                <div id="temperatura" class="h5 mb-0 font-weight-bold text-secondary">Cargando...</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-6 mb-4">
                        <div class="card border-left-secondary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Hola</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                        </div>
                    </div>
                </div-->

                <!-- Tarjetas dinámicas de computadoras por sección -->
                <div class="row" id="tarjetas-secciones">
                    <!-- Aquí se cargarán las tarjetas con JS -->
                </div>


                <!-- Fila de gráficos -->
                <div class="row">
                    <!-- Gráfica de incidencias -->
                    <div class="col-xl-9 col-lg-8">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-secondary">Gráfica de Incidencias</h6>
                            </div>

                            <div class="px-4 pt-3 pb-0">
                                <label for="mesSelect" class="form-label fw-bold text-secondary">Seleccionar mes:</label>
                                <select id="mesSelect" class="form-control w-50">
                                    <option value="01">Enero</option>
                                    <option value="02">Febrero</option>
                                    <option value="03">Marzo</option>
                                    <option value="04">Abril</option>
                                    <option value="05">Mayo</option>
                                    <option value="06">Junio</option>
                                    <option value="07">Julio</option>
                                    <option value="08">Agosto</option>
                                    <option value="09">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>

                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Gráfico de pastel -->
                    <div class="col-xl-3 col-lg-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-secondary">Estado de computadoras - SETEL</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </div><!-- End of Main Content -->

        <footer class="sticky-footer bg-white">
            <div class="container my-auto text-center">
                <span>2025 &copy; Oficina de Economía del Ejército.</span>
            </div>
        </footer>
    </div>
</div>

<?php require("vista/scripts.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const ctx = document.getElementById("myAreaChart").getContext("2d");
    const mesSelect = document.getElementById("mesSelect");
    let chart;

    const colores = {
        "01": "rgba(255, 99, 132, 1)",
        "02": "rgba(54, 162, 235, 1)",
        "03": "rgba(255, 206, 86, 1)",
        "04": "rgba(75, 192, 192, 1)",
        "05": "rgba(153, 102, 255, 1)",
        "06": "rgba(255, 159, 64, 1)",
        "07": "rgba(255, 99, 71, 1)",
        "08": "rgba(46, 204, 113, 1)",
        "09": "rgba(52, 152, 219, 1)",
        "10": "rgba(231, 76, 60, 1)",
        "11": "rgba(241, 196, 15, 1)",
        "12": "rgba(155, 89, 182, 1)"
    };

    async function cargarGrafico(mes) {
        try {
            const year = new Date().getFullYear();
            const response = await fetch(`modelo/datos_incidencias.php?mes=${year}-${mes}`);
            if (!response.ok) throw new Error("Error en la respuesta del servidor");
            const data = await response.json();

            if (!data.dias.length) {
                if (chart) chart.destroy();
                Swal.fire({
                    icon: 'info',
                    title: 'Sin incidencias registradas',
                    text: `No hay incidencias registradas en el mes seleccionado.`,
                    confirmButtonColor: '#3085d6'
                });
                return;
            }

            if (chart) chart.destroy();

            const colorBorde = colores[mes] || "rgba(75, 192, 192, 1)";
            const colorFondo = colorBorde.replace("1)", "0.2)");

            chart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: data.dias,
                    datasets: [{
                        label: "Incidencias",
                        data: data.totales,
                        borderColor: colorBorde,
                        backgroundColor: colorFondo,
                        borderWidth: 2,
                        tension: 0.3,
                        pointRadius: 5,
                        pointHoverRadius: 7
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Permite que use todo el espacio disponible
                    plugins: {
                        legend: { display: true }
                    },
                    scales: {
                        x: { title: { display: true, text: "Día" } },
                        y: { title: { display: true, text: "Cantidad" }, beginAtZero: true }
                    }
                }
            });

        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'Error al cargar los datos',
                text: 'Verifica la conexión con el servidor o la base de datos.',
                confirmButtonColor: '#d33'
            });
        }
    }

    mesSelect.addEventListener("change", e => {
        cargarGrafico(e.target.value);
    });

    const mesInicial = String(new Date().getMonth() + 1).padStart(2, '0');
    mesSelect.value = mesInicial;
    cargarGrafico(mesInicial);
});
</script>

<script>
document.addEventListener("DOMContentLoaded", async () => {
    const contenedorTarjetas = document.getElementById("tarjetas-secciones");

    try {
        const response = await fetch("modelo/datos_tarjetas.php");
        if (!response.ok) throw new Error("No se pudo obtener la información");
        const data = await response.json();

        if (!Array.isArray(data) || data.length === 0) {
            contenedorTarjetas.innerHTML = `
                <div class="col-12 text-center text-muted">
                    No hay computadoras registradas en ninguna sección.
                </div>`;
            return;
        }

        contenedorTarjetas.innerHTML = data.map((item, index) => {
            const colores = [
                "border-left-primary",
                "border-left-success",
                "border-left-info",
                "border-left-warning",
                "border-left-danger",
                "border-left-secondary"
            ];
            const color = colores[index % colores.length];

            return `
                <div class="col-xl-2 col-md-6 mb-4">
                    <div class="card ${color} shadow h-100 py-2">
                        <div class="card-body">
                            <div class="text-xs font-weight-bold text-uppercase mb-1 text-dark">
                                ${item.seccion}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                ${item.total} Computadoras
                            </div>
                        </div>
                    </div>
                </div>`;
        }).join("");

    } catch (error) {
        console.error("Error al cargar tarjetas:", error);
        contenedorTarjetas.innerHTML = `
            <div class="col-12 text-center text-danger">
                Error al cargar las tarjetas.
            </div>`;
    }
});
</script>


</body>
</html>