<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 11/15/2018
 * Time: 1:07 AM
 */

namespace App\Libraries;


class Middleware {
	/**
	 * stores the method name which will be filtered only
	 *
	 * @var array
	 */
	public $only = [];
	/**
	 * stores the method name which will not be filtered
	 *
	 * @var array
	 */
	public $except = [];
	/**
	 * current action name
	 *
	 * @var
	 */
	public $current_method;

	public function handle() {

	}

	/**
	 * @param $action
	 *
	 * @return bool
	 */
	public function isMethodRegistered( $action ) {
		$this->current_method = $action;
		if ( empty( $this->only ) && empty( $this->except ) ) {
			return true;
		}
		if ( empty( $this->only ) && in_array( $action, $this->except ) ) {
			return false;
		}

		if ( empty( $this->except ) && in_array( $action, $this->only  ) ) {
			return true;
		}

		if ( !empty( $this->except ) && !in_array( $action, $this->except  ) ) {
			return true;
		}

	}

	/**
	 *
	 */
	public function execute() {

	}

	/**
	 *
	 */
	public function terminate() {
	}
}