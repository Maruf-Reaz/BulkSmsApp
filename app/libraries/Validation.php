<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 9/21/2018
 * Time: 10:05 AM
 */

namespace App\Libraries;

/**
 * Validation
 *
 * Simple PHP class for validation.
 *
 * @author Davide Cesarano <davide.cesarano@unipegaso.it>
 * @copyright (c) 2016, Davide Cesarano
 * @license https://github.com/davidecesarano/Validation/blob/master/LICENSE MIT License
 * @link https://github.com/davidecesarano/Validation
 */

class Validation {

	/**
	 * @var array $patterns
	 */
	public $patterns = array(
		'uri'      => '[A-Za-z0-9-\/_?&=]+',
		'url'      => '[A-Za-z0-9-:.\/_?&=#]+',
		'alpha'    => '[\p{L}]+',
		'words'    => '[\p{L}\s]+',
		'alphanum' => '[\p{L}0-9]+',
		'int'      => '[0-9]+',
		'float'    => '[0-9\.,]+',
		'tel'      => '(^(\+8801|8801|01|008801))[1-9]{1}(\d){8}$',
		'text'     => '[\p{L}0-9\s-.,;:!"%&()?+\'°#\/@]+',
		'file'     => '[\p{L}\s0-9-_!%&()=\[\]#@,.;+]+\.[A-Za-z0-9]{2,4}',
		'folder'   => '[\p{L}\s0-9-_!%&()=\[\]#@,.;+]+',
		'address'  => '[\p{L}0-9\s.,()°-]+',
		'date_dmy' => '[0-9]{1,2}\-[0-9]{1,2}\-[0-9]{4}',
		'date_ymd' => '[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}',
		'email'    => '[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+'
	);


	/**
	 * @var array $errors
	 */
	public $errors = array();

	/**
	 * Check if the value is
	 * an integer number
	 *
	 * @param mixed $value
	 *
	 * @return boolean
	 */
	public static function is_int( $value ) {
		if ( filter_var( $value, FILTER_VALIDATE_INT ) ) {
			return true;
		}
	}

	/**
	 * Check if the value is
	 * a number float
	 *
	 * @param mixed $value
	 *
	 * @return boolean
	 */
	public static function is_float( $value ) {
		if ( filter_var( $value, FILTER_VALIDATE_FLOAT ) ) {
			return true;
		}
	}

	/**
	 * Check if the value is
	 * a letter of the alphabet
	 *
	 * @param mixed $value
	 *
	 * @return boolean
	 */
	public static function is_alpha( $value ) {
		if ( filter_var( $value, FILTER_VALIDATE_REGEXP, array( 'options' => array( 'regexp' => "/^[a-zA-Z]+$/" ) ) ) ) {
			return true;
		}
	}

	/**
	 * Check if the value is
	 * a letter or a number
	 *
	 * @param mixed $value
	 *
	 * @return boolean
	 */
	public static function is_alphanum( $value ) {
		if ( filter_var( $value, FILTER_VALIDATE_REGEXP, array( 'options' => array( 'regexp' => "/^[a-zA-Z0-9]+$/" ) ) ) ) {
			return true;
		}
	}

	/**
	 * Check if the value is
	 * an url
	 *
	 * @param mixed $value
	 *
	 * @return boolean
	 */
	public static function is_url( $value ) {
		if ( filter_var( $value, FILTER_VALIDATE_URL ) ) {
			return true;
		}
	}

	/**
	 * Check if the value is
	 * one sets
	 *
	 * @param mixed $value
	 *
	 * @return boolean
	 */
	public static function is_uri( $value ) {
		if ( filter_var( $value, FILTER_VALIDATE_REGEXP, array( 'options' => array( 'regexp' => "/^[A-Za-z0-9-\/_]+$/" ) ) ) ) {
			return true;
		}
	}

	/**
	 * Check if the value is
	 * true or false
	 *
	 * @param mixed $value
	 *
	 * @return boolean
	 */
	public static function is_bool( $value ) {
		if ( filter_var( $value, FILTER_VALIDATE_BOOLEAN ) ) {
			return true;
		}
	}

	/**
	 * Check if the value is
	 * an e-mail
	 *
	 * @param mixed $value
	 *
	 * @return boolean
	 */
	public static function is_email( $value ) {
		if ( filter_var( $value, FILTER_VALIDATE_EMAIL ) ) {
			return true;
		}
	}

	/**
	 * Field name
	 *
	 * @param string $name
	 *
	 * @return $this
	 */
	public function name( $name ) {

		$this->name = $name;

		return $this;

	}

	/**
	 * Value of the field
	 *
	 * @param mixed $value
	 *
	 * @return $this
	 */
	public function value( $value ) {

		$this->value = $value;

		return $this;

	}

	/**
	 * File
	 *
	 * @param mixed $value
	 *
	 * @return $this
	 */
	public function file( $value ) {

		$this->file = $value;

		return $this;

	}

	/**
	 * Pattern to be applied to the recognition
	 * of the regular expression
	 *
	 * @param string $name nome del pattern
	 *
	 * @return $this
	 */
	public function pattern( $name ) {

		if ( $name == 'array' ) {

			if ( ! is_array( $this->value ) ) {
				$this->errors[] = 'Format of ' . $this->name . ' not valid.';
			}

		} else {

			$regex = '/^(' . $this->patterns[ $name ] . ')$/u';
			if ( $this->value != '' && ! preg_match( $regex, $this->value ) ) {
				$this->errors[] = 'Format of ' . $this->name . ' not valid.';
			}

		}

		return $this;

	}

	/**
	 * Custom pattern
	 *
	 * @param string $pattern
	 *
	 * @return $this
	 */
	public function customPattern( $pattern ) {

		$regex = '/^(' . $pattern . ')$/u';
		if ( $this->value != '' && ! preg_match( $regex, $this->value ) ) {
			$this->errors[] = 'Format of ' . $this->name . ' not valid.';
		}

		return $this;

	}

	/**
	 * Required field
	 *
	 * @return $this
	 */
	public function required() {

		if ( ( isset( $this->file ) && $this->file['error'] == 4 ) || ( $this->value == '' || $this->value == null ) ) {
			$this->errors[] = 'Field ' . $this->name . ' is required.';
		}

		return $this;

	}

	/**
	 * Minimum length
	 * of the value of the field
	 *
	 * @param int $length
	 *
	 * @return $this
	 */
	public function min( $length ) {

		if ( is_string( $this->value ) ) {

			if ( strlen( $this->value ) < $length ) {
				$this->errors[] = 'Value of field ' . $this->name . ' is lower than the minimum value';
			}

		} else {

			if ( $this->value < $length ) {
				$this->errors[] = 'Value of field ' . $this->name . ' is lower than the minimum value';
			}

		}

		return $this;

	}

	/**
	 * Maximum length
	 * of the value of the field
	 *
	 * @param int $length
	 *
	 * @return $this
	 */
	public function max( $length ) {

		if ( is_string( $this->value ) ) {

			if ( strlen( $this->value ) > $length ) {
				$this->errors[] = 'Value of field ' . $this->name . ' is greater than the maximum value';
			}

		} else {

			if ( $this->value > $length ) {
				$this->errors[] = 'Value of field ' . $this->name . ' is greater than the maximum value';
			}

		}

		return $this;

	}

	/**
	 * Compare with the value of
	 * another field
	 *
	 * @param mixed $value
	 *
	 * @return $this
	 */
	public function equal( $value ) {

		if ( $this->value != $value ) {
			$this->errors[] = 'Field value ' . $this->name . ' not corresponding.';
		}

		return $this;

	}

	/**
	 * Maximum file size
	 *
	 * @param int $size
	 *
	 * @return $this
	 */
	public function maxSize( $size ) {

		if ( $this->file['error'] != 4 && $this->file['size'] > $size ) {
			$this->errors[] = 'File ' . $this->name . ' is larger than' . number_format( $size / 1048576, 2 ) . ' MB.';
		}

		return $this;

	}

	/**
	 * File extension (format)
	 *
	 * @param string $extension
	 *
	 * @return $this
	 */
	public function ext( $extension ) {
		if ( $this->file['error'] != 4 && pathinfo( $this->file['name'], PATHINFO_EXTENSION ) != $extension && strtoupper( pathinfo( $this->file['name'], PATHINFO_EXTENSION ) ) != $extension ) {
			$this->errors[] = 'File format ' . $this->name . ' is' . $extension . ' not valid';
		}

		return $this;

	}

	/**
	 * Purifies to prevent XSS attacks
	 *
	 * @param string $string
	 *
	 * @return string
	 */
	public function purify( $string ) {
		return htmlspecialchars( $string, ENT_QUOTES, 'UTF-8' );
	}

	/**
	 * View errors in Html format
	 *
	 * @return string $html
	 */
	public function displayErrors() {

		$html = '<ul>';
		foreach ( $this->getErrors() as $error ) {
			$html .= '<li>' . $error . '</li>';
		}
		$html .= '</ul>';

		return $html;

	}

	/**
	 * Validation errors
	 *
	 * @return array $this->errors
	 */
	public function getErrors() {
		if ( ! $this->isSuccess() ) {
			return $this->errors;
		}
	}

	/**
	 * Validated fields
	 *
	 * @return boolean
	 */
	public function isSuccess() {
		if ( empty( $this->errors ) ) {
			return true;
		}
	}

	/**
	 * View validation result
	 *
	 * @return booelan|string
	 */
	public function result() {

		if ( ! $this->isSuccess() ) {

			foreach ( $this->getErrors() as $error ) {
				echo "$error\n";
			}
			exit;

		} else {
			return true;
		}

	}

}