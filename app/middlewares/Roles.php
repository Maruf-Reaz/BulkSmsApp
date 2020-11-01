<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 11/15/2018
 * Time: 2:01 AM
 */

namespace App\Middlewares;


use App\Libraries\Middleware;
use App\Models\User;

class Roles extends Middleware {
	/**
	 * This stores the registered actions and their corresponding roles
	 * @var array
	 */
	public $action_role = [];

	/**
	 * Sets actions and their corresponding roles
	 *
	 * @param $action_roles
	 */
	public function hasRole( $action_roles ) {
		foreach ( $action_roles as $key => $action_role ) {
			$this->action_role[ $key ] = $action_role;
		}
	}

	public function execute() {
		if ( $this->hasAccess() ) {
			return true;
		} else {
			return false;
		}

	}

	/**
	 * Checks if user has access to the called method
	 * @return bool
	 */
	private function hasAccess() {
		$current_method = $this->current_method;
		$user_role      = User::getUserRole();

		if ( array_key_exists( $current_method, $this->action_role ) ) {
			foreach ( $this->action_role [ $current_method ] as $role ) {
				if ( $role == $user_role ) {
					return true;
				}

			}

			return false;
		} elseif ( array_key_exists( 'all', $this->action_role ) ) {
			return in_array( $user_role, $this->action_role['all'] );
		}

	}

	public function terminate() {
		redirect( '' );
	}
}