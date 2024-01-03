Highcharts.chart('container-cliente', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Clientes'
    },
    subtitle: {
        text: '# ESE por Cliente.'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total de # de ESE'
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
        data:response.grafica_clientes
    }]
});