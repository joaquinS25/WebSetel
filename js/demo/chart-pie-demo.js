Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = 'rgb(0, 0, 0)';

// Obtener datos reales desde PHP
fetch('datos_computadoras.php')
  .then(response => response.json())
  .then(data => {
    const ctx = document.getElementById("myPieChart");
    const myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Donadas", "Internadas"],
        datasets: [{
          data: [data.donadas, data.internadas], // solo dos valores
          backgroundColor: ['#4CAF50', '#F44336'], // verde y rojo
          hoverBackgroundColor: ['#388E3C', '#D32F2F'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: true,
        tooltips: {
          backgroundColor: "rgb(255, 255, 255)",
          bodyFontColor: "#858796",
          borderColor: 'dark',
          borderWidth: 2,
          xPadding: 15,
          yPadding: 15,
          displayColors: true,
          caretPadding: 10,
        },
        legend: {
          display: true,
        },
        cutoutPercentage: 80,
      },
    });
  })
  .catch(error => console.error('Error al obtener los datos:', error));
