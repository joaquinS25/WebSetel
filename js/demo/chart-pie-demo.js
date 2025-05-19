// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = 'rgb(0, 0, 0)';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Arregladas", "Malogradas", "Cuarentena"],
    datasets: [{
      data: [50, 15, 5],
      backgroundColor: ['#4CAF50', '#F44336', '#FFC107'],
      hoverBackgroundColor: ['#388E3C', '#D32F2F', '#FFA000'],
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
      display: false,
    },
    cutoutPercentage: 80,
  },
});
