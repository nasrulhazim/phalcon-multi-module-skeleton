<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<?php echo $this->tag->stylesheetLink('css/bootstrap.min.css'); ?>  
		<?php echo $this->assets->outputCss(); ?> 
	</head>
	<body>
		<div class="container">
			<?php echo $this->getContent(); ?>
		</div>
		<?php echo $this->tag->javascriptInclude('js/jquery-1.11.2.js'); ?>
		<?php echo $this->tag->javascriptInclude('js/boostrap.min.js'); ?>
		<?php echo $this->assets->outputJs(); ?>
	</body>
</html>