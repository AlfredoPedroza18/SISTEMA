
Highcharts.chart('container-grafica_diasTarda', {

    chart: {
        type: 'column'
    },
    title: {
        text: 'Dias que tarda el invetigardor en realizar e estudio'
    },
    subtitle: {
        text: 'Promedio en Realizar ESE.'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Promedio en Realizar ESE'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true
                
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> ESE total<br/>'
    },

    series: [{
        name: 'Brands',
        colorByPoint: true,
        data:response.grafica_diasTarda
    }]
});

