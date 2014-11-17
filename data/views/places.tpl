{{include file="header.tpl" include_nav=true title="Places"}}
	<div class="row">
		<div class="col-md-12 col-sm-8">
			<h1>Places</h1>
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
						<td><a href="https://foursquare.com/v/{{$place->id}}" target=_blank>{{$place->name}}</a></td>
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