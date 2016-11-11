<?php
/*
Plugin Name: SearchWP Stemmer
Description: Add additionnals stemmers to SearchWP.
Version: 1.0.1
Author: BeAPI
Author URI: https://beapi.fr
Text Domain: searchwp-stemmer

Copyright (c) 2013-2016 BeAPI

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

namespace Bea\SearchWP\Stemmer;

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SWP_STEMMER_VERSION', '1.0.1' );

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	/**
	 * Composer-generated autoload file.
	 */
	require_once __DIR__ . '/vendor/autoload.php';
}

function load_searchwp_stemmer() {
	new SearchWP_Stemmer_Loader();
}
add_action( 'plugins_loaded', __NAMESPACE__.'\\load_searchwp_stemmer' );
