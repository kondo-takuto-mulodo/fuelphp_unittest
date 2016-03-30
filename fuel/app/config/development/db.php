<?php
/**
 * The development database settings. These get merged with the global settings.
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
