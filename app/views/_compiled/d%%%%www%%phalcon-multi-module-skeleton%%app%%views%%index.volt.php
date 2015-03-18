<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<?php echo $this->tag->stylesheetLink('css/bootstrap.min.css'); ?>
		<?php echo $this->tag->stylesheetLink('css/app.css'); ?> 
		<?php echo $this->assets->outputCss(); ?> 
	</head>
	<body>
		<!-- <h1>Main Layout</h1> -->
		<div class="container">
			<?php echo $this->getContent(); ?>
		</div>
		<?php echo $this->tag->javascriptInclude('js/jquery-1.11.2.min.js'); ?>
		<?php echo $this->tag->javascriptInclude('js/bootstrap.min.js'); ?>
		<?php echo $this->assets->outputJs(); ?>
	</body>
</html>