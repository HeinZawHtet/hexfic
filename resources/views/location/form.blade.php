<div class="uk-form-row">
	<div class="uk-form-icon">
		<i class="uk-icon-info-circle"></i>
		{!! Form::text('name', Input::get('name'), array('placeholder' => 'Name', 'class' => 'uk-form-width-large') ) !!}
	</div>
</div>
<div class="uk-form-row">
	<div class="uk-form-icon">
		<i class="uk-icon-map-marker"></i>
		{!! Form::text('loc[lon]', Input::get('loc["lon"]'), array('placeholder' => 'Longitude', 'class' => 'uk-form-width-small') ) !!}
	</div>
	<div class="uk-form-icon">
		<i class="uk-icon-map-marker"></i>
		{!! Form::text('loc[lat]', Input::get('loc["lat"]'), array('placeholder' => 'Latitude', 'class' => 'uk-form-width-small') ) !!}
	</div>
</div>
<div class="uk-form-row">
	<button type="submit" class="uk-button uk-button-primary"><i class="uk-icon-check"></i> Submit</button>
	<button type="reset" class="uk-button uk-button-default"><i class="uk-icon-close"></i> Reset</button>
</div>