<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="{{ asset('assets/admin/css/uikit.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/admin/css/app.css') }}" />

        <script src="{{ asset('assets/library/jquery-2.1.1.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/uikit.min.js') }}"></script>
    </head>
    <body>

    	<nav class="uk-navbar">

            <a class="uk-navbar-brand" href="#">Hexfic</a>

            <ul class="uk-navbar-nav">
            	<li><a href="#"><i class="uk-icon-home"></i> Dashboard</a></li>
                <li class="uk-parent" data-uk-dropdown>
                    <a href=""><i class="uk-icon-car"></i> Status</a>
                    <div class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
                            <li><a href="#"><i class="uk-icon-eye"></i> View All</a></li>
                            <li><a href="#"><i class="uk-icon-plus"></i> Add New</a></li>
                        </ul>
                    </div>

                </li>
                <li class="uk-parent" data-uk-dropdown>
                    <a href="#"><i class="uk-icon-map-marker"></i> Places</a>
                    <div class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
                            <li><a href="#"><i class="uk-icon-eye"></i> View All</a></li>
                            <li><a href="#"><i class="uk-icon-plus"></i> Add New</a></li>
                        </ul>
                    </div>

                </li>

            </ul>

            <div class="uk-navbar-content uk-navbar-flip  uk-hidden-small">
                <div class="uk-button-group">
                    <a class="uk-button uk-button-primary" href="#">Hein Zaw Htet</a>
                    <button class="uk-button uk-button-danger">Logout</button>
                </div>
            </div>

        </nav>

        <div class="uk-container">
            <div id="app-body" class="uk-grid uk-grid-divider">