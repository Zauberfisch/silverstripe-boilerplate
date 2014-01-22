<!doctype html>
<!--[if lt IE 9]>
<html class="no-js lt-ie9" lang="$ContentLocale"> <![endif]-->
<!--[if gt IE 8]>
<html class="no-js ie9" lang="$ContentLocale"> <![endif]-->
<!--[if !IE]><!-->
<html class="no-js no-ie" lang="$ContentLocale"> <!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>$Title &raquo; $SiteConfig.Title <% if $SiteConfig.Tagline %> | $SiteConfig.Tagline<% end_if %></title>
	<% base_tag %>
	<meta name="viewport" content="width=device-width"/>
	$MetaTags('false')
	<link rel="shortcut icon" href="/favicon.ico"/>
</head>
<body>
<div class="page-container">
	<% include Header %>
	<div class="layout" role="main">
		$Layout
	</div>
	<% include Footer %>
</div>
</body>
</html>
