var placeholder2 = {
    series: [44, 54, 26, 37, 72],
    chart: {
        width: 500,
        type: 'pie',
    },
    labels: ['Category 1', 'Category 2', 'Category 3', 'Category 4', 'Category 5'],
}


var chart = new ApexCharts(document.querySelector("#chart_placeholder_2"), placeholder2);


chart.render();