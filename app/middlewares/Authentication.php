<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 11/15/2018
 * Time: 1:27 AM
 */

namespace App\Middlewares;


use App\Libraries\Middleware;
use App\Models\User;

class Authentication extends Middleware {

	public function execute() {
		if ( User::is_logged_in() ) {
			return true;
		}

		return false;
	}

	public function terminate() {
		redirect('login');
	}
}