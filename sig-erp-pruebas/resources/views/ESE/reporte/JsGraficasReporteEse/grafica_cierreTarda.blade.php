
Highcharts.chart('container-grafica_cierreTarda', {

    chart: {
        type: 'column'
    },
    title: {
        text: 'Días que pasan desde la solicitud a la entrega'
    },
    subtitle: {
        text: 'Promedio en cerra ESE.'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Promedio en cerrar ESE'
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
        data:response.grafica_cierreInvest
    }]
});

