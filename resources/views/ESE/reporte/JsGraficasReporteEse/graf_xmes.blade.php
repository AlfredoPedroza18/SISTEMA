Highcharts.chart('container-xmes', {
    chart: {
        type: 'column'
    },
    title: {
        text: '# ESE por Mes.'
    },
    subtitle: {
        text: '# ESE .'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total de # de ESE por Mes'
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
        data:getMes(response.graficaXmes)
    },]
});


