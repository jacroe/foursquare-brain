{{include file="header.tpl" include_nav=true}}
	<div class="row">
		<div class="col-md-12">
		<h1>Checkins and Meals for {{$place->name}}</h1>
			<table class="table table-striped table-hover table-condensed" id="placesTable">
				<thead>
					<tr>
						<th>Date</th>
						<th>Meal</th>
						<th>Comments</th>
						<th>Rating</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
{{foreach from=$checkins key=i item=checkin}}
					<tr>
						<td>{{$checkin->time}}</td>
						<td>{{$checkin->meal}}</td>
						<td>{{$checkin->comments}}</td>
						<td>{{if $checkin->rating == 5}}*giggles*{{elseif $checkin->rating == 4}}Mmm...{{elseif $checkin->rating == 3}}Meh{{elseif $checkin->rating == 2}}Blech{{else}}...hergh{{/if}}</td>
						<td><a class="btn btn-success" href="editCheckin.php?id={{$checkin->id}}">Edit</a></td>
					</tr>
{{/foreach}}
				</tbody>
			</table>
		</div>
	</div>
{{include file="footer.tpl"}}