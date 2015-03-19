<!DOCTYPE html>
<html>
	<head>
		<title>{{ title }}</title>
		{{ stylesheet_link("css/bootstrap.min.css") }}
		{{ stylesheet_link("vendor/font-awesome/css/font-awesome.min.css") }}
		{{ stylesheet_link("css/app.css") }} 
		{{ assets.outputCss() }} 
	</head>
	<body>
		<!-- <h1>Main Layout</h1> -->
		<div class="container">
			{{ content() }}
		</div>
		<footer style="position: absolute; margin-left: auto;margin-right: auto;bottom: 0px;right: 7px; font-size: 9px;">
			<center>Maintained by <a href="http://nasrulhazim.wordpress.com">nasrulhazim.m</a></center>
		</footer>
		{{ javascript_include("js/jquery-1.11.2.min.js") }}
		{{ javascript_include("js/bootstrap.min.js") }}
		{{ assets.outputJs() }}
	</body>
</html>