var placeholder1 = {
    chart: {
        type: 'bar',
        width: 600,
        
    },
    series: [{
        data: [{
            x: 'Category A',
            y: 10,
        }, {
            x: 'Category B',
            y: 15,
        }, {
            x: 'Category C',
            y: 8,
        }],
    }],
}


var chart = new ApexCharts(document.querySelector("#chart_placeholder_1"), placeholder1);

chart.render();