<?php

include 'init.php';

$app->add('Header')->set('Dashboard');

$plane = $app->add(['View', 'template' => new \atk4\ui\Template('
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="js/graficas.js"></script>

	<div class="ui four column grid">
	  <div class="two column row">
	    <div class="column">
	    	<div class="ui segment">
	    		<div id="chart-ventas" style="width: 100%; height: 250px;"></div>
	    	</div>
	    </div>
	    <div class="column">
	    	<div class="ui segment">
	    		<div id="chart-compras" style="width: 100%; height: 250px;"></div>
	    	</div>
	    </div>
	  </div>
	  <div class="one column row">
	    <div class="column">
	    	<div class="ui segment">
	    		<div id="chart-consolas" style="width: 100%; height: 250px;"></div>
	    	</div>
	    </div>
	  </div>
	</div>
')]);