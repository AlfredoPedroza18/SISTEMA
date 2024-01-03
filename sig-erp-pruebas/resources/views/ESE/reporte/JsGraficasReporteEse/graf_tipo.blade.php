
var gcategorias=new Array();
                     $.each(response.grafica_tipo,function(a,v){
                         gcategorias.push(response.grafica_tipo[a].name);
                     });

var  gtipo=new Array();
                        //----------------GRAFICAS-----------//
                         $.each(response.grafica_tipo,function(i,v){
                            
                                 gtipo.push(response.grafica_tipo[i].data);
                                 
                         });
                               
                               
Highcharts.chart('container-tipo', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Tipo de ESE'
    },
    xAxis: {
        categories: gcategorias
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total de ESE'
        }
    },
    legend: {
        reversed: true
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [
    {
       
        data: gtipo
    }
    

    ]
});