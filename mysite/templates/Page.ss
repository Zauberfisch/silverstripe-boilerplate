<!doctype html>
<!--[if lt IE 7]>     <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="$ContentLocale"> <![endif]-->
<!--[if IE 7]>        <html class="no-js lt-ie9 lt-ie8" lang="$ContentLocale"> <![endif]-->
<!--[if IE 8]>        <html class="no-js lt-ie9" lang="$ContentLocale"> <![endif]-->
<!--[if gt IE 8]>     <html class="no-js gt-ie8" lang="$ContentLocale"> <![endif]-->
<!--[if !IE]><!-->    <html class="no-js no-ie" lang="$ContentLocale"> <!--<![endif]-->
    <head>
        <title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title<% if $SiteConfig.Tagline %> | $SiteConfig.Tagline<% end_if %></title>
        <% base_tag %>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width" />
        $MetaTags(false)
        <link rel="shortcut icon" href="/favicon.ico" />
    </head>
    <body>
        <div class="container">
            <% include Header %>
            <div class="layout" role="main">
                $Layout
            </div>
            <% include Footer %>
        </div>
    </body>
</html>