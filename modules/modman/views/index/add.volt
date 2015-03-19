<div class="row">
	<div class="box col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
		<h3>mod.man[module-manager]</h3>
		<h3><small>Add New Module</small></h3>
		{{ flash.output() }}
		{{ form('modman/index/add') }}
			<div class="form-group">
				{{ '<label>Name:</label>' }}
				{{ text_field('module_name','class': 'form-control') }}
			</div>
			<div class="form-group">
				{{ '<label>Description:</label>' }}
				{{ text_field('module_description','class': 'form-control') }}
			</div>
			<div class="form-group">
				{{ '<label>Namespace:</label>' }}
				{{ text_field('module_namespace','class': 'form-control') }}
			</div>
		<a href="{{ url('modman/index/index') }}" class="btn btn-danger pull-right">Cancel</a>
		{{ submit_button('Generate','class':'btn btn-success pull-right') }}
		{{ end_form() }}
	</div>
</div>