<!doctype html>
<!--[if IE 8]>	<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>{{ app.sitename|e }}</title>

	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="{{ 'styles/global.css'|static }}">
</head>
<body>
	{% set active = active|default(null) %}
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="{{ path('homepage') }}">{{ app.sitename|e }}</a>
				<div class="nav-collapse">
					<ul class="nav">
						<li {% if 'homepage' == active %}class="active"{% endif %}><a href="{{ path('homepage') }}">Homepage</a></li>
						{% if is_granted('IS_AUTHENTICATED_FULLY') %}
							<li {% if 'account' == active %}class="active"{% endif %}><a href="{{ path('logout') }}">{{ 'Logout'|trans }}</a></li>
						{% else %}
							<li {% if 'account' == active %}class="active"{% endif %}><a href="{{ path('login') }}">{{ 'Login'|trans }}</a></li>
						{% endif %}
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>

	<div class="container">
		<div id="main" role="main" class="container">
			{% set alertTypeAvaillable = [ 'info', 'success', 'warning', 'error'] %}
			{% for alert in alertTypeAvaillable %}
				{% for message in app.session.getFlashBag.get(alert) %}
					<div class="alert alert-{{ alert }}" >
						<button class="close" data-dismiss="alert">×</button>
						{{ message|trans }}
					</div>
				{% endfor %}
			{% endfor %}
			{% block content %}
			{% endblock %}
		</div>
	</div>

</body>
</html>