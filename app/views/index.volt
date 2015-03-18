<!DOCTYPE html>
<html>
	<head>
		<title>{{ title }}</title>
		{{ stylesheet_link("css/bootstrap.min.css") }}
		{{ stylesheet_link("css/app.css") }} 
		{{ assets.outputCss() }} 
	</head>
	<body>
		<!-- <h1>Main Layout</h1> -->
		<div class="container">
			{{ content() }}
		</div>
		{{ javascript_include("js/jquery-1.11.2.min.js") }}
		{{ javascript_include("js/bootstrap.min.js") }}
		{{ assets.outputJs() }}
	</body>
</html>