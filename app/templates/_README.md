# <%= siteName %>

## What it does

WordPress is installed via <% if (wpMethod === 'git') { %>GitHub<% } else if (wpMethod === 'composer') { %>Composer <% } %> to `httpdocs/wp`.

A custom `index.php` is created to run WordPress from `httpdocs/wp` and themes and plugins from `httpdocs/wp-content`.

`.htaccess`, `index.php`, and `wp-config.php` are ignored in Git as they are automatically generated using our server management system.

## Configuration

The default WordPress config expects a `vagrant` database on `localhost`, username `vagrant`, password `vagrant`.<% if (useVagrant) { %>

The default WordPress admin account is `vagrant`, password `vagrant`.<% } %><% if (wpMethod === 'composer') { %>

Use the [WordPress Packagist](http://wpackagist.org/) to manage plugins via [Composer](https://getcomposer.org/).<% } %><% if (useVagrant) { %>

## How to use

Run `vagrant up` to run a local development machine, then browse to http://localhost:8080.

phpMyAdmin is available at http://localhost:8080/phpmyadmin.

## Customisation

Puppet installs a default WordPress database when provisioning. You can use a custom database by exporting it and overwriting `puppet/modules/wordpress/files/wordpress-db.sql`.<% } %>
