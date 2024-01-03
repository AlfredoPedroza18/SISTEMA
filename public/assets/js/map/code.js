      google.charts.load('upcoming', {
        'packages': ['geochart']
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['State', 'Accent'],
          ['Baja California', 100],
          ['Sonora', '100'],
          ['Chihuahua', '100'],
          ['Coahuila', '100'],
          ['Nuevo León', '100'],
          ['Tamaulipas', '100'],
          ['Sinaloa', '100'],
          ['Nayarit', '100'],
          ['Durango', '100'],
          ['Zacatecas', '400'],
          ['Jalisco', '400'],
          ['Colima', '400'],
          ['Tlaxcala', '400'],
          ['Aguascalientes', '400'],
          ['Zacatecas', '400'],
          ['San Luis Potosí', '400'],
          ['Puebla', '400'],
          ['Guanajuato', '400'],
          ['Querétaro', '400'],
          ['Hidalgo', '400'],
          ['Morelos', '400'],
          ['Estado de México', 400],
          ['Distrito Federal', 400],
          ['Baja California Sur', '200'],
          ['Michoacán', '200'],
          ['Guerrero', '200'],
          ['Oaxaca', '200'],
          ['Veracruz', '200'],
          ['Tabasco', '200'],
          ['Campeche', '300'],
          ['Chiapas', '200'],
          ['Quintana Roo', '300'],
          ['Yucatán', '300']
        ]);

        var options = {
          region: 'MX', // Mexico
          resolution: 'provinces',
          colorAxis: {
            //     	minValue=100,
            //     maxValue=400,
            values: [100, 200, 300, 400],
            colors: ['green', 'yellow', 'violet', 'orange']
          },
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#eeeeee',
          defaultColor: '#f5f5f5',
        };

        var chart = new google.visualization.GeoChart(document.getElementById('geochart-colors'));
        chart.draw(data, options);
      };
