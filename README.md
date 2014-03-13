# XplorePress

A Yeoman generator for [WordPress](http://wordpress.org/), designed to work with [Xplore's](http://www.xplore.net/) [Vagrant Boxes](https://vagrantcloud.com/xplore/).

## What it does

WordPress is checked out from GitHub to `httpdocs/wp`.  You can specify which version to install.

A custom `index.php` is created to run WordPress from `httpdocs/wp` and themes and plugins from `httpdocs/wp-content`.

You can optionally choose to create a [Vagrant](http://www.vagrantup.com/) config, defaulting to Xplore's [Debian 6.0.9 development box](https://vagrantcloud.com/xplore/debian-6.0.9).

## Configuration

The default WordPress config expects a `vagrant` database on `localhost`, username `vagrant`, password `vagrant`.

The default WordPress admin account is `vagrant`, password `vagrant`.

## Customisation

If you choose to use Vagrant, [Puppet](http://puppetlabs.com/) will install a default WordPress during provisioning.
You can use a custom database by exporting it and overwriting `puppet/modules/wordpress/files/wordpress-db.sql`.

## License

MIT
