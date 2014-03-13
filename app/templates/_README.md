# XplorePress

A Yeoman generator for [WordPress](http://wordpress.org/), designed to work with [Xplore's](http://www.xplore.net/) [Vagrant Boxes](https://vagrantcloud.com/xplore/).

## What it does

WordPress is installed from GitHub to `httpdocs/wp`.

A custom `index.php` is created to run WordPress from `httpdocs/wp` and themes and plugins from `httpdocs/wp-content`.

## Configuration

The default WordPress config expects a `vagrant` database on `localhost`, username `vagrant`, password `vagrant`.

<% if (useVagrant) { %>
The default WordPress admin account is `vagrant`, password `vagrant`.
<% } %>

<% if (useVagrant) { %>
## Customisation

You can use a custom database by exporting it and overwriting `puppet/modules/wordpress/files/wordpress-db.sql`.
<% } %>
