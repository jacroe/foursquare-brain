{{include file="header.tpl" include_nav=true}}
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-hover table-condensed" id="placesTable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Location</th>
						<th>Category</th>
						<th>Checkins</th>
					</tr>
				</thead>
				<tbody>
{{foreach from=$places key=i item=place}}
					<tr>
						<td>{{$place->name}}</td>
						<td>{{$place->location}}</td>
						<td>{{$place->category->name}}</td>
						<td><a href="checkins.php?id={{$place->id}}">{{$place->checkins}}</a></td>
					</tr>
{{/foreach}}
				</tbody>
			</table>
		</div>
	</div>
{{include file="footer.tpl"}}