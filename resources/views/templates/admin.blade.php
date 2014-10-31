@include('templates.partials.admin.header')
	
	<div id="app-sidebar" class="uk-width-1-4">
		@yield('sidebar')
	</div>
	<div id="app-content" class="uk-width-3-4">
		@yield('content')
	</div>
@include('templates.partials.admin.footer')