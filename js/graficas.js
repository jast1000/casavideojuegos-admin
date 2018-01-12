google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(function() {
	var graphics = [graficarVentasMeses, graficarJuegosCategoria, graficasVentasConsolaSemana];
	graphics.forEach(function(x) {
		x();
	});
});

var graficasVentasConsolaSemana = function() {
	var data = new google.visualization.DataTable();
      data.addColumn('string', 'Día');
      data.addColumn('number', 'Xbox');
      data.addColumn('number', 'Play Station');
      data.addColumn('number', 'Nintendo');
      var days = [
        ['Domingo'],    
        ['Lunes'],   
        ['Martes'],
        ['Miércoles'],
        ['Jueves'],
        ['Viernes'],
        ['Sábado']
      ];
      days.forEach(function(day) {
      	day.push(getNumberRandomConsolas());
      	day.push(getNumberRandomConsolas());
      	day.push(getNumberRandomConsolas());
      });

      data.addRows(days);

      var options = {
      	title: "Compras de videojuegos por consola de los últimos 7 días",
        hAxis: {
          title: 'Días'
        },
        vAxis: {
          title: 'Compras'
        },
        series: {
          1: {curveType: 'function'}
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart-consolas'));
      chart.draw(data, options);
   
}

var graficarVentasMeses = function() {
	var data = google.visualization.arrayToDataTable([
        ['Mes', 'Ventas',],
        ['Septiembre 2017', getNumberRandomVentas()],
        ['Octubre 2017', getNumberRandomVentas()],
        ['Noviembre 2017', getNumberRandomVentas()],
        ['Diciembre 2017', getNumberRandomVentas()],
        ['Enero 2018', getNumberRandomVentas()]
     ]);

    var options = {
        title: 'Total de ventas de últimos 5 meses',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Total $',
          minValue: 0
        },
        vAxis: {
          title: 'Meses'
        },
        legend: { position: "none" }
    };

    var chart = new google.visualization.BarChart(document.getElementById('chart-ventas'));

    chart.draw(data, options);
}

var graficarJuegosCategoria = function () {
	var data = google.visualization.arrayToDataTable([
	  ['Categoria', 'Juegos comprados'],
	  ['Deporte', getNumberRandomCategorias()],
	  ['Carreras', getNumberRandomCategorias()],
	  ['Disparos', getNumberRandomCategorias()],
	  ['Aventura', getNumberRandomCategorias()],
	  ['Clásicos', getNumberRandomCategorias()]
	]);
	var chart = new google.visualization.PieChart(document.getElementById('chart-compras'));
	chart.draw(data,  {title: 'Categorias de juegos comprados - Enero 2018'});
}

function getNumberRandomConsolas() {
	return Math.floor((Math.random() * 50) + 1);
}

function getNumberRandomVentas() {
	return Math.floor((Math.random() * 100000) + 1);
}

function getNumberRandomCategorias() {
	return Math.floor((Math.random() * 100) + 1);
}