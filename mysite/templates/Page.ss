<!DOCTYPE html>
<html lang="$ContentLocale">
  <head>
		<% base_tag %>
		<title><% if MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title<% if SiteConfig.Tagline %> | $SiteConfig.Tagline<% end_if %></title>
		$MetaTags(false)
		<link rel="shortcut icon" href="/favicon.ico" />
		<!--[if lte IE 8]><style type="text/css">@import url($ThemeDir/css/ie8.css);</style><![endif]-->
		<!--[if lte IE 7]><style type="text/css">@import url($ThemeDir/css/ie7.css);</style><![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="header">
				<h1>$SiteConfig.Title</h1>
				<ul class="navigation">
					<% control Menu(1) %>
						<li <% if LinkOrSection == section %>class="current"<% end_if %>><a href="$Link" title="$Title.XML">$MenuTitle</a></li>
					<% end_control %>
				</ul>
				<div class="clear"><!-- --></div>
			</div>
			<div class="layout">
				$Layout
			</div>
			<div class="footer">
			</div>
		</div>
	</body>
</html>