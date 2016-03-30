<?php
// Bootstrap the framework DO NOT edit this
require COREPATH.'bootstrap.php';

// Load ENV from .env by Dotenv
require realpath(__DIR__.'/../').'/vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(realpath(__DIR__.'/../../').'/');
$dotenv->load();


\Autoloader::add_classes(array(
	// Add classes you want to override here
	// Example: 'View' => APPPATH.'classes/view.php',
));

// Register the autoloader
\Autoloader::register();

/**
 * Your environment.  Can be set to any of the following:
 *
 * Fuel::DEVELOPMENT
 * Fuel::TEST
 * Fuel::STAGING
 * Fuel::PRODUCTION
 */
\Fuel::$env = (isset($_SERVER['FUEL_ENV']) ? $_SERVER['FUEL_ENV'] : \Fuel::DEVELOPMENT);

// Initialize the framework with the config file.
\Fuel::init('config.php');
