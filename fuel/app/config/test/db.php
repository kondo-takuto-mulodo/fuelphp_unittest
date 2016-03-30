<?php
/**
 * The test database settings. These get merged with the global settings.
 *
 * This environment is primarily used by unit tests, to run on a controlled environment.
 */

return array(
	'default' => array(
		'connection'  => array(
	      'dsn'        => "mysql:host=".getenv('HOST_MYSQL').";dbname=".getenv('MYSQL_DATABASE'),
	      'username'   => getenv("MYSQL_USER"),
	      'password'   => getenv("MYSQL_PASSWORD"),
		),
	),
);
