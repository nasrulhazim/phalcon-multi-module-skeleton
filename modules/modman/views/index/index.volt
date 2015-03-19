<h3>mod.man[module-manager]</h3>
<div class="row">
	<div class="box col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<a class="pull-right" title="Add New Module" href="{{ url('modman/index/add') }}"><i class="fa fa-3x fa-plus-square"></i> </span></a>
		<h3>Module List</h3>
		<table class="table table-condensed table-hover">
			<tr>
				<th>Name</th>
				<th>Descriptions</th>
				<th>Namespace</th>
				<th>Path</th>
			</tr>
			{% for key, value in modules %}
				<tr>
			    {{ '<td>'~ key ~'</td>' }}
			    {{ '<td>'~ value['description'] ~'</td>' }}
			    {{ '<td>'~ value['className'] ~'</td>' }}
			    {{ '<td>'~ value['path'] ~'</td>' }}
			    </tr>
			{% endfor  %}
		</table>
	</div>
</div>