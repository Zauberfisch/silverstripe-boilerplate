<header>
    <h1>$SiteConfig.Title</h1>
    <nav>
        <ul>
			<% loop $Menu('1') %>
                <li <% if $LinkOrSection == 'section' %>class="current"<% end_if %>>
                    <a href="$Link" title="$Title.XML">$MenuTitle</a>
                </li>
			<% end_loop %>
        </ul>
    </nav>
    <div class="clear"></div>
</header>