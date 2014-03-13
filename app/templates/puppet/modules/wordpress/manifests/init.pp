# Configure WordPress

class wordpress::install {

	# copy wp config files
	file { '/vagrant/httpdocs/.htaccess':
		source => 'puppet:///modules/wordpress/.htaccess'
	}

	file { '/vagrant/httpdocs/index.php':
		source => 'puppet:///modules/wordpress/index.php'
	}

	file { '/vagrant/httpdocs/wp-config.php':
		source => 'puppet:///modules/wordpress/wp-config.php'
	}

	# import database for basic wordpress site
	file { '/tmp/wordpress-db.sql':
		source => 'puppet:///modules/wordpress/wordpress-db.sql'
	}

	exec { 'load-db':
		command => '/usr/bin/mysql -u vagrant -pvagrant vagrant < /tmp/wordpress-db.sql'
	}
}
