const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'April', 'May', 'June','Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
    datasets: [{
      label: 'Sales',
      data: [3000, 2000, 500, 1000, 2000, 500, 1000, 2000, 500, 1000, 400, 5000],
      borderWidth: 1,
      backgroundColor: '#DB975F', // Bar fill color
      borderColor: '#DB975F', // Bar border color
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
