<% if SiteConfig.EnableGoogleAnalytics %>
    <% if enableGoogleAnalytics = No %>
    <% else %>   
        $SiteConfig.GoogleAnalyticsKey.RAW
    <% end_if %>
<% end_if %>