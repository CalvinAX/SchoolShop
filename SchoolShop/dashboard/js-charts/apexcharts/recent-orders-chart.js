const api_url = "http://localhost/projects/gitrepository/schoolshop/schoolshop/schoolshop/dashboard/api/recent-orders.php";

getData();

var date = [];

async function getData() {
  const response = await fetch(api_url);
  const data = await response.json();

  var length = data.length;
  
  for (let i = 0; i < length; i++) {
    date.push(data[i].date);
    i = i + 1;
  }
  
}

var options = {
  series: [{
    name: "Orders",
    data: [1, 2, 1, 2, 3, 4, 1, 4, 5]
  }],
  chart: {
    height: 370,
    width: 600,
    type: 'line',
    zoom: {
      enabled: false
    }
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'straight'
  },
  title: {
    text: 'Recent Orders',
    align: 'left',
    style: {
      color: '#fff'
    },
  },
  grid: {
    row: {
      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  xaxis: {
    categories: date,
    labels: {
      style: {
        color: '#fff'
      },
    },
    axisTicks: {
      show: true,
      borderType: 'solid',
      color: '#78909C',
    },
  }
};

var chart = new ApexCharts(document.querySelector("#recent-orders-chart"), options);
chart.render();


