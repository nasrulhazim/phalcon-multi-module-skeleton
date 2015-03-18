<!DOCTYPE html>
<html>
	<head>
		<title>{{ title }}</title>
		{{ stylesheet_link("css/bootstrap.min.css") }}  
		{{ assets.outputCss() }} 
	</head>
	<body>
		<div class="container">
			{{ content() }}
		</div>
		{{ javascript_include("js/jquery-1.11.2.js") }}
		{{ javascript_include("js/boostrap.min.js") }}
		{{ assets.outputJs() }}
	</body>
</html>