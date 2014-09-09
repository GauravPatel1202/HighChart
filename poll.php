<!doctype html>

<? if ( $_POST['submit'] && $_POST['nobots'] == '' ) {
	// Process Form
	$_POST['dataviz'] = serialize($_POST['dataviz']);
	unset($_POST['submit']);
	unset($_POST['nobots']);
	$completed = true;
	$fp = fopen('results.csv', 'a');
	fputcsv($fp, $_POST);
	fclose($fp);
} ?>


<html lang="en">

	<head>
		<meta charset="utf-8">

		<title>Highcharts How-To - ONA14</title>

		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<link rel="stylesheet" href="css/reveal.min.css">
		<link rel="stylesheet" href="css/theme/default.css" id="theme">

		<!-- For syntax highlighting -->
		<link rel="stylesheet" href="lib/css/zenburn.css">

		<style>
			html, body {
				width: auto;
				height: auto;
				overflow: auto;
			}
			form {
			color: #FFF;
			width: 80%;
			margin: 20px auto 100px;
			font-family: "Lato", sans-serif;
			font-size: 1.4em;
			max-width:400px;
			line-height: 1.4;
			}
			form div {
				margin-bottom:30px;
			}
			label {
				display:block;
			}
			.click {
				cursor:pointer;
				padding-top: 8px;
			}
			.click span {
				width: 17px;
				height: 17px;
				border:1px solid black;
				border-radius: 50%;
				background: #eee;
				display: inline-block;
				margin-right: 10px;
				position: relative;
				top: 2px;
			}
			input[type=checkbox]:checked + span {
				background: #46A23E;
				-webkit-box-shadow: inset 0px 0px 5px 0px rgba(0,0,0,0.75);
				-moz-box-shadow: inset 0px 0px 5px 0px rgba(0,0,0,0.75);
				box-shadow: inset 0px 0px 5px 0px rgba(0,0,0,0.75);
			} 
			input[type="checkbox"] {
				position: absolute;
				left: -150000px
			}
			select {
			font-size: 1em;
			background: #FFF;
			display: block;
			margin: 10px 0 0;
			width: 100%;
			}
			input[type=text] {
				font-size: 0.9em;
				padding: 5px 2%;
				border-radius: 6px;
				border: 1px solid #CCC;
				margin-top: 10px;
				width: 96%;
			}
			input[type="submit"] {
			width: 100%;
			padding: 11px;
			font-size: 0.8em;
			background: #C2C2C2;
			border: 1px solid #333;
			border-radius: 6px;
			color: #FFF;
			text-shadow: -1px -1px 0px #777;
			text-transform: uppercase;
			}
			input[type="submit"]:hover {
				background:#B8B8B8;
			}
			input[type="submit"]:active {
				position: relative;
				left:1px;
				top:1px;
				outline: 0;
			}
		</style>

	</head>

	<body>

		<? if ( $completed == true ) { ?>

		<form>
			<h3>You rock</h3>
			<p>Thanks for taking the <a href="http://ona14.journalists.org/sessions/highcharts/#.VA8c3WRdW-U">Highcharts How-To</a> poll. I hope to see you in the session!</p>
			<p>See up-to-the-minute results on the <a href="http://adam.slides/Highcharts-Presentation/dashboard.php">dashboard</a>, or wait to see them in the session.</p>
		</form>


		<? } else { ?>
		

		<form method="post">
			<h3>Dataviz poll</h3>
			<p></p>
			<div>
				<label>Have you ever used Highcharts?</label>
				<select name="highcharts">
					<option></option>
					<option>Yes</option>
					<option>No</option>
				</select>
			</div>
			<div>
				<label>What other tools have you used for data visualization?</label>
				<label class="click"><input type="checkbox" name="dataviz[]" value="Google Charts"><span></span>Google Charts</label>
				<label class="click"><input type="checkbox" name="dataviz[]" value="D3.js"><span></span>D3.js</label>
				<label class="click"><input type="checkbox" name="dataviz[]" value="Raphael.js"><span></span>Raphael.js</label>
				<label class="click"><input type="checkbox" name="dataviz[]" value="Mapbox"><span></span>Mapbox</label>
				<label class="click"><input type="checkbox" name="dataviz[]" value="Leaflet"><span></span>Leaflet</label>
				<label class="click"><input type="checkbox" name="dataviz[]" value="CartoDB"><span></span>CartoDB</label>
			</div>
			<div>
				<label>How well do you know Javascript or jQuery?</label>
				<select name="javascript">
					<option></option>
					<option>0</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
				</select>
			</div>
			<div>
				<label>What CMS does your organization use?</label>
				<select name="cms">
					<option></option>
					<option>WordPress</option>
					<option>Drupal</option>
					<option>Joomla</option>
					<option>Other</option>
				</select>
			</div>
			<div>
				<label>If other, please enter name of CMS:</label>
				<input type="text" name="cms_other" placeholder="Optional" />
			</div>
			<div>
				<label>Are you going to the Highcharts session on Saturday?</label>
				<select name="attendance">
					<option></option>
					<option>Yes</option>
					<option>No</option>
				</select>
			</div>

			<input type="submit" name="submit" value="Submit your answers" />
			<input type="hidden" name="nobots" value="" />
		</form>
		<? } ?>
	</body>
</html>