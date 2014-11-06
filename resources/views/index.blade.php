<!DOCTYPE html>
<html>
<head>
	<meta name='csrf-token' content="{!! csrf_token() !!}" />
	<title>hexfic</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/bw/bootstrap.min.css">
	<style type="text/css">
	.container {
		max-width: 500px;
	}
	.status-wrap {

	}
	.status-wrap .status-status {
		font-weight: bold;
	}
	.status-wrap .status-time {
		color: #999;
		margin-left: 5px;
	}
	.status-wrap hr {
		margin: 5px 0;
	}
	.status-wrap .status-comment {
		font-size: 13px;
		margin: 10px 0 0;
	}
	</style>
</head>
<body>

<div id="app" class="container">
	<div class="page-header">
  		<h1>Hexfix</h1>
	</div>
	<div class="page-body">
		<article class="status-wrap panel panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">8 Miles</h3>
			</div>
  			<div class="panel-body">
  				<span class="status-status">Very Bad</span>
  				<span href="#" class="status-time">30 minutes ago</span>
  				<hr>
  				<p class="status-comment">Pate chat pal</p>
  			</div>
		</article>
	</div>
	<article class="status-wrap panel panel-danger">
		<div class="panel-heading">
			<h3 class="panel-title">8 Miles</h3>
		</div>
			<div class="panel-body">
				<span class="status-status">Very Bad</span>
				<span href="#" class="status-time">30 minutes ago</span>
				<hr>
				<p class="status-comment">Pate chat pal</p>
			</div>
	</article>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Submit</h3>
		</div>
		<div class="panel-body">
			<form id="report-form">
				<div class="form-group">
					<input type="text" name="comment" class="form-control" placeholder="Comment" />
				</div>
				<div class="form-group">
					<select class="form-control" name="status">
						<option value="bad">Bad</option>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Submit">
				</div>
			</form>
		</div>
	</div>

</div>

<script type="text/javascript" src="http://localhost/jquery.js"></script>
<script type="text/javascript" src="http://localhost/bw/bootstrap.min.js"></script>
<script type="text/javascript">

	(function( $ ) {
		$(document).ajaxSend(function(e, xhr, options) {
  			// var token = $("meta[name='csrf-token']").attr("content");
  			// xhr.setRequestHeader("X-CSRF-Token", token);
		});
		$.Status = function( element ) {
			this.$element = $( element ); // top-level element
			this.init();
		};

		$.Status.prototype = {
			init: function() {
				this.$reportForm = this.$element.find( "#report-form" );
				this.$url = "http://localhost:8000/";

				navigator.geolocation.getCurrentPosition(this.getLocation);
				// this.fetch();
				this.submit();
			},
			getLocation: function (location) {
    			var $lat = location.coords.latitude;
				var $lon = location.coords.longitude;
			},
			fetch: function () {
				var self = this;
				$.ajax({
					type: 'POST',
					url: self.$url,
					data: {
						lat : self.$lat,
						lon : self.$lon
					},
					success: function(response) {
						console.log(response);
					},
				})
			},
			submit: function() {
				var self = this;
				self.$reportForm.on('submit', function(e) {
					e.preventDefault();

					// $.ajax({
					// 	type: 'POST',
					// 	url: self.$url,
					// 	data: {
					// 		comment : 'Aye Say',
					// 		status : 1000,
					// 	},
					// 	success: function(response) {
					// 		console.log(response);
					// 	},
					// })
					$.ajax({
						type: 'POST',
						url: self.$url,
						data: {
							phone : '095999058627',
							username : 'ssss',
							email : 'heinhtet@heinhtet.com',
							password : 'heinhtet',
							password_confirmation : 'heinhtet',
						},
						success: function(response) {
							console.log(response);
						},
					})
				});
			}
		};

		$(function() {
			var status = new $.Status( "#app" ); // object's instance
		});

	})( jQuery );
</script>
</body>
</html>