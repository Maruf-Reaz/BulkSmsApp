<?php

namespace App\Controllers;

use App\Libraries\Controller;
use App\Models\User;

class Users extends Controller {
	public function __construct() {
		$this->userModel = $this->model( 'User' );
	}

	public function register() {
		//Check for POST
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			//Process form

			//Sanitize POST Data
			$_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_URL );
			$data  = [
				'name'                   => trim( $_POST['name'] ),
				'email'                  => trim( $_POST['email'] ),
				'password'               => trim( $_POST['password'] ),
				'confirm_password'       => trim( $_POST['confirm_password'] ),
				'name_error'             => '',
				'email_error'            => '',
				'password_error'         => '',
				'confirm_password_error' => '',
			];

			//Validate Email
			if ( empty( $data['email'] ) ) {
				$data['email_error'] = 'Please enter email';
			} else {
				//Check email
				if ( $this->userModel->findUserByEmail( $data['email'] ) ) {
					$data['email_error'] = 'Email already taken';
				}
			}
			//Validate Name
			if ( empty( $data['name'] ) ) {
				$data['name_error'] = 'Please enter name';
			}
			//Validate Password
			if ( empty( $data['password'] ) ) {
				$data['password_error'] = 'Please enter Password';
			} elseif ( strlen( $data['password'] ) < 6 ) {
				$data['password_error'] = 'Password must be 6 Character long';
			}
			//Validate confirm Password
			if ( empty( $data['confirm_password'] ) ) {
				$data['confirm_password_error'] = 'Please confirm password';
			} elseif ( $data['password'] != $data['confirm_password'] ) {
				$data['confirm_password_error'] = 'Password do not match';
			}

			//Make sure no errors
			if ( empty( $data['email_error'] ) && empty( $data['name_error'] ) && empty( $data['password_error'] ) ) {
				//Validated
				//Hash the password
				$data['password'] = password_hash( $data['password'], PASSWORD_DEFAULT );

				//Register User
				if ( $this->userModel->register( $data ) ) {
					//Flash message
					flash( 'register_success', 'You are register and can log in now' );
					redirect( 'users/login' );
				} else {
					flash( 'register_failed', 'Sorry something went wrong', 'alert alert-danger' );

				}
			} else {
				//Load the view
				$this->view( 'users/register', $data );
			}

		} else {
			//Init Data
			$data = [
				'name'                   => '',
				'email'                  => '',
				'password'               => '',
				'confirm_password'       => '',
				'name_error'             => '',
				'email_error'            => '',
				'password_error'         => '',
				'confirm_password_error' => '',
			];
			//Load the view
			$this->view( 'users/register', $data );

		}
	}

	public function login() {
		//Check for POST
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			//Process form

			//Sanitize POST Data
			$_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_URL );
			$data  = [
				'email'          => trim( $_POST['email'] ),
				'password'       => trim( $_POST['password'] ),
				'email_error'    => '',
				'password_error' => '',
			];

			//Validate Email
			if ( empty( $data['email'] ) ) {
				$data['email_error'] = 'Please enter email';
			}
			//Validate Password
			if ( empty( $data['password'] ) ) {
				$data['password_error'] = 'Please enter Password';
			}

			//check for user/email
			if ( $this->userModel->findUserByEmail( $data['email'] ) ) {
				//user found
			} else {
				$data['email_error'] = 'No user found';
			}

			//Make sure no errors
			if ( empty( $data['email_error'] ) && empty( $data['password_error'] ) ) {
				//Validated
				//Check and set logged in user
				$loggedInUser = $this->userModel->login( $data['email'], $data['password'] );
				if ( $loggedInUser ) {
					//Create session
					$this->createUserSession( $loggedInUser );
				} else {
					$data['password_error'] = 'Username password incorrect';
				}
			} else {
				//Load the view with errors
				$this->view( 'users/login', $data );
			}

			$this->view( 'users/login', $data );
		} else {
			//Init Data
			if ( ! User::is_logged_in() ) {
				$data = [
					'email'          => '',
					'password'       => '',
					'email_error'    => '',
					'password_error' => '',
				];
				//Load the view
				$this->view( 'users/login', $data );
			} else {
				redirect( '' );
			}


		}
	}

	public function createUserSession( $user ) {
		$_SESSION['user_id']    = $user->id;
		$_SESSION['user_name']  = $user->username;
		$_SESSION['user_email'] = $user->email;
		redirect( '' );
	}

	public function logout() {
		unset( $_SESSION['user_id'] );
		unset( $_SESSION['user_name'] );
		unset( $_SESSION['user_email'] );
		session_destroy();
		redirect( 'users/login' );
	}

}