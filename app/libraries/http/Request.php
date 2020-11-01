<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 11/13/2018
 * Time: 12:40 AM
 */

namespace App\Libraries\Http;


class Request {

	public static function url() {
		self::sanitize_request();

		return $_SERVER['QUERY_STRING'];
	}

	public static function sanitize_request() {
		$_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
		$_GET  = filter_input_array( INPUT_GET, FILTER_SANITIZE_STRING );
	}

	public static function get($var = "") {
        if ( ! is_array($_GET[$var])) {
            return (trim($_GET[$var]));
        } else {
            return $_GET[$var];
        }
    }

    public static function post($var = "") {
        if ( ! is_array($_POST[$var])) {
            return htmlentities(trim($_POST[$var]));
        } else {
            return $_POST[$var];
        }
    }

}