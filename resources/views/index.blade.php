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
</div>


<script type="text/javascript" src="http://localhost/jquery.js"></script>
<script type="text/javascript" src="http://localhost/bw/bootstrap.min.js"></script>
<script type="text/javascript">

	(function( $ ) {
		$(document).ajaxSend(function(e, xhr, options) {
  			var token = $("meta[name='csrf-token']").attr("content");
  			xhr.setRequestHeader("X-CSRF-Token", token);
		});
		$.Status = function( element ) {
			this.$element = $( element ); // top-level element
			this.init();
		};

		$.Status.prototype = {
			init: function() {
				this.$formAddToCart = this.$element.find( "form.add-to-cart" );
				this.$url = "http://localhost:8000/api/v1/status";

				navigator.geolocation.getCurrentPosition(this.getLocation);

				this.fetch();
			},
			getLocation: function (location) {
    			var $lat = location.coords.latitude;
				var $lon = location.coords.longitude;
			},
			fetch: function () {
				var self = this;
				$.ajax({
					type: 'GET',
					url: self.$url,
					data: {
						lat : self.$lat,
						lon : self.$lon
					},
					success: function(response) {
						console.log(response);
					},
				})
			}
		};

		$(function() {
			var status = new $.Status( "#app" ); // object's instance
		});

	})( jQuery );
</script>
</body>
</html>