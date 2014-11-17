{{include file="header.tpl" include_nav=true}}
	<div class="row marketing">
		<div class="col-lg-12">
			<h1>Edit checkin for <a href="https:/foursquare.com/v/{{$checkin->place->id}}" target=_blank>{{$checkin->place->name}}</a></h1>
{{foreach $msgs as $msg}}
			<div class="alert alert-{{if $msg.type}}{{$msg.type}}{{else}}danger{{/if}} alert-dismissable col-sm-offset-3 col-sm-9">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>{{$msg.title}}</strong> - {{$msg.body nofilter}}
			</div>
{{/foreach}}
			<form class="form-horizontal" role="form" method="POST" id="form-checkin">
				<input type="hidden" name="checkinID" value={{$checkin->id}} />
				<div class="form-group">
					<label for="meal" class="col-sm-3 control-label">Meal?</label>
					<div class="col-sm-9">
						<input type="text" name="meal" class="form-control mousetrap" id="meal" placeholder="Blue Plate Special" value="{{$checkin->meal}}" />
					</div>
				</div>
				<div class="form-group">
					<label for="comments" class="col-sm-3 control-label">Comments?</label>
					<div class="col-sm-9">
						<textarea class="form-control mousetrap" id="comments" name="comments" rows="3">{{$checkin->comments}}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="tags" class="col-sm-3 control-label">Rating?</label>
					<div class="col-sm-9">
						<select class="form-control" id="rating" name="rating">
						  <option value=5{{if $checkin->rating == 5}} selected{{/if}}>5 - *giggles*</option>
						  <option value=4{{if $checkin->rating == 4}} selected{{/if}}>4 - Mmmm...</option>
						  <option value=3{{if $checkin->rating == 3 || $checkin->rating == null}} selected{{/if}}>3 - Meh</option>
						  <option value=2{{if $checkin->rating == 2}} selected{{/if}}>2 - Blech</option>
						  <option value=1{{if $checkin->rating == 1}} selected{{/if}}>1 - ...hergh</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<div class="checkbox">
							<label><input type="checkbox" name="complete"{{if $checkin->complete}} checked{{/if}}> I'm done with this meal</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</div>
			</form>
		</div>
	</div>
{{include file="footer.tpl"}}