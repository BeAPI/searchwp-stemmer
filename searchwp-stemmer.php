<?php
/*
Plugin Name: SearchWP Stemmer
Description: Add additionnals stemmers to SearchWP.
Version: 1.0.0
Author: BeAPI
Author URI: https://beapi.fr
Text Domain: searchwp-stemmer

Copyright 2013-2016 BeAPI

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, see <http://www.gnu.org/licenses/>.
*/

namespace Bea\SearchWP\Stemmer;

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SWP_STEMMER_VERSION', '1.0.0' );

require( __DIR__ . '/vendor/autoload.php' );

function load_searchwp_stemmer() {
	new SearchWP_Stemmer_Loader();
}
add_action( 'plugins_loaded', __NAMESPACE__.'\\load_searchwp_stemmer' );