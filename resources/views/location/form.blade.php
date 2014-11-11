<div class="uk-form-row">
	<div class="uk-form-icon">
		<i class="uk-icon-info-circle"></i>
		{!! Form::text('name', Input::get('name'), array('placeholder' => 'Name', 'class' => 'uk-form-width-large') ) !!}
	</div>
</div>
<div class="uk-form-row">
	<div class="uk-form-icon">
		<i class="uk-icon-map-marker"></i>
		{!! Form::text('lat', Input::get('lat'), array('placeholder' => 'Latitude', 'class' => 'uk-form-width-small') ) !!}
	</div>
	<div class="uk-form-icon">
		<i class="uk-icon-map-marker"></i>
		{!! Form::text('lon', Input::get('lon'), array('placeholder' => 'Longitude', 'class' => 'uk-form-width-small') ) !!}
	</div>
</div>
<div class="uk-form-row">
	<div class="uk-form-icon">
		<i class="uk-icon-info-circle"></i>
		{!! Form::text('township', Input::get('township'), array('placeholder' => 'Township', 'class' => 'uk-form-width-large') ) !!}
	</div>
</div>
<div class="uk-form-row">
	<button type="submit" class="uk-button uk-button-primary"><i class="uk-icon-check"></i> Submit</button>
	<button type="reset" class="uk-button uk-button-default"><i class="uk-icon-close"></i> Reset</button>
</div>