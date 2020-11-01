<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/4/2018
 * Time: 2:05 PM
 */

namespace App\Libraries\http;


class Response {

	public static function json( $data = "" ) {
		header( 'Content-Type: application/json' );
		echo json_encode( $data );
		exit;
	}

	public static function write( $data = "" ) {
		echo htmlspecialchars( $data, ENT_QUOTES, 'UTF-8' );
	}

}