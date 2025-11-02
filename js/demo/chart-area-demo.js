// Configuración global de Chart.js
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

let ctx = document.getElementById("myAreaChart");
let myLineChart;

function cargarGrafico(mes) {
  fetch(`datos_incidencias.php?mes=${mes}`)
    .then(response => response.json())
    .then(data => {
      const labels = data.dias;
      const values = data.totales;

      if (myLineChart) {
        myLineChart.destroy(); // destruye el gráfico anterior para actualizar
      }

      myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: "Incidencias por día",
            lineTension: 0.3,
            backgroundColor: "rgba(255, 187, 0, 0.29)",
            borderColor: "#FF9800",
            pointRadius: 4,
            pointBackgroundColor: "#FF9800",
            pointBorderColor: "#FF9800",
            pointHoverRadius: 6,
            pointHoverBackgroundColor: "#FF9800",
            pointHoverBorderColor: "#FF9800",
            data: values,
          }],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          layout: { padding: { left: 10, right: 25, top: 25, bottom: 0 } },
          scales: {
            xAxes: [{
              time: { unit: 'day' },
              gridLines: { display: false, drawBorder: false },
              ticks: { maxTicksLimit: 10 },
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                maxTicksLimit: 6,
                padding: 10,
              },
              gridLines: {
                color: "rgba(200, 200, 200, 0.3)",
                zeroLineColor: "rgba(200, 200, 200, 0.3)",
                drawBorder: false,
              }
            }],
          },
          legend: { display: false },
          tooltips: {
            backgroundColor: "#fff",
            bodyFontColor: "#858796",
            titleFontColor: "#6e707e",
            borderColor: "#000",
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            mode: 'index',
            caretPadding: 10,
          },
        }
      });
    });
}

// Al cargar la página: mostrar el mes actual
document.addEventListener("DOMContentLoaded", function() {
  const inputMes = document.getElementById("filtroMes");
  const hoy = new Date().toISOString().slice(0, 7);
  inputMes.value = hoy;
  cargarGrafico(hoy);

  inputMes.addEventListener("change", function() {
    cargarGrafico(this.value);
  });
});
