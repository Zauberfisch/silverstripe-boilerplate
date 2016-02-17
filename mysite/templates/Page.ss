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
	<%-- favicon.ico should contain size 16,24,32,48 and 64px, see https://github.com/audreyr/favicon-cheat-sheet/ --%>
	<%-- online converter tool from png to ico with multiple sizes: http://converticon.com/ --%>
	<link rel="shortcut icon" href="{$BaseURL}favicon.ico"/>
	<link rel="apple-touch-icon" href="{$BaseURL}favicon-180.png">
	<meta name="msapplication-TileImage" content="{$BaseURL}favicon-144.png">
	<meta name="msapplication-TileColor" content="#132136">
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
