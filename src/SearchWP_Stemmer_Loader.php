<?php

namespace Bea\SearchWP\Stemmer;

use Wamania\Snowball\Stem;

class SearchWP_Stemmer_Loader {

	/**
	 * Available stemmers.
	 *
	 * @var array
	 */
	private $available_stemmers = [
		'da_DK' => 'Danish', // Danish
		'nl_NL' => 'Dutch', // Dutch
		'nl_BE' => 'Dutch', // Dutch
		'fr_FR' => 'French', // French
		'fr_BE' => 'French', // French
		'fr_CA' => 'French', // French
		'fr_LU' => 'French', // French
		'de_DE' => 'German', // German
		'it_IT' => 'Italian', // Italian
		'no_NO' => 'Norwegian', // Norwegian
		'pt_PT' => 'Portuguese', // Portuguese
		'ro_RO' => 'Romanian', // Romanian
		'es_ES' => 'Spanish', // Spanish
		'sv_SE' => 'Swedish', // Swedish
	];

	/**
	 * Current WordPress locale.
	 *
	 * @var string
	 */
	protected $locale;

	/**
	 * Stemmer instance.
	 *
	 * @var Stem
	 */
	protected $stemmer_instance;

	/**
	 * SearchWP_Stemmer_Loader constructor.
	 */
	public function __construct() {

		$this->locale = get_locale();

		add_filter( 'searchwp_keyword_stem_locale', [ $this, 'can_stem_locale' ] );

		add_filter( 'searchwp_custom_stemmer', [ $this, 'stem' ] );
	}

	/**
	 * Tell SearchWP we have a custom stemmer for the current locale.
	 *
	 * @param bool $has_stemmer
	 *
	 * @return bool
	 */
	public function can_stem_locale( $has_stemmer ) {
		return in_array( $this->locale, array_keys( $this->available_stemmers ) );
	}

	/**
	 * Stem a word.
	 *
	 * @param string $unstemmed
	 *
	 * @return string
	 */
	public function stem( $unstemmed ) {
		if ( is_null( $this->stemmer_instance ) ) {
			$klass = sprintf( 'Wamania\Snowball\%s', $this->available_stemmers[ $this->locale ] ) ;
			$this->stemmer_instance = new $klass;
		}

		$stemmed = $this->stemmer_instance->stem( $unstemmed );

		return sanitize_text_field( $stemmed );
	}
}