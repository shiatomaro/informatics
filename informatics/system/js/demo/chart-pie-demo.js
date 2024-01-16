// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Call the data from sales_pie
$.ajax({
  url: './template/student_pie.php', // Replace with your actual endpoint
  method: 'GET',
  dataType:'JSON',
  success: function(response) {
    var status = response.labels; // Assuming the fetched data is in the 'data' property
    var student = response.data;
    console.log(response);

      // Replace the static data with the fetched monthly data
  myPieChart.data.labels = status;
  myPieChart.data.datasets[0].data = student;

  // Update the chart
  myPieChart.update();
}
});

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: [],
    datasets: [{
      data: [],
      backgroundColor: ['#F6C23E', '#1CC88A', '#E74A3B'],
      hoverBackgroundColor: ['#E5A53E', '#17A673', '#BF4A3B'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
