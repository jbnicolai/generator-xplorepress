# Configure WordPress

class wordpress::install {

	#import database for basic wordpress site
	file { '/tmp/wordpress-db.sql':
		source => 'puppet:///modules/wordpress/wordpress-db.sql'
	}

	exec { 'load-db':
		command => '/usr/bin/mysql -u vagrant -pvagrant vagrant < /tmp/wordpress-db.sql'
	}
}
