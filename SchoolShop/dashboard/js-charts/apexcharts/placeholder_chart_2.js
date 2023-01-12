getData();

var sold = [];

async function getData() {
  const response = await fetch('http://localhost/projects/gitrepository/schoolshop/schoolshop/schoolshop/dashboard/api/category-sold.php');
  const data = await response.json();

  var length = data.length;
  
  for (let i = 0; i < length; i++) {
    sold.push(data[i].amount_sold);
  }
  
}


var placeholder2 = {
    series: sold,
    chart: {
        width: 500,
        type: 'pie',
    },
    labels: ['Fruits', 'Vegetables'],
}


var chart = new ApexCharts(document.querySelector("#chart_placeholder_2"), placeholder2);


chart.render();