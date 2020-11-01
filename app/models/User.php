<?php

namespace App\Models;

use App\Libraries\Database;
use App\Libraries\Model;

class User extends Model {
	protected static $table_name = 'db_users';
	protected static $db_fields = [ 'id', 'designation_id', 'role', 'password', 'email', 'username' ];

	public $db_object;
	public $id;
	public $designation_id;
	public $role;
	public $password;
	public $email;
	public $username;
	private $db;

	public function __construct() {
		$this->db        = new Database();
		$this->db_object = new Database();
	}

	//Register User

	public static function is_logged_in() {
		if ( isset( $_SESSION['user_id'] ) ) {
			return true;
		} else {
			return false;
		}
	}

	public static function getUserRole() {
		$user_id   = self::getLoggedInUserId();
		$db_object = new Database();
		$db_object->query( 'SELECT db_users.id AS user_id, db_roles.name AS role_name FROM db_users LEFT JOIN db_roles ON db_users.role=db_roles.id WHERE db_users.id=:user_id' );
		$db_object->bind( ':user_id', $user_id );
		$result = $db_object->result();

		return $result['role_name'];
	}

	public static function getLoggedInUserId() {
		if ( isset( $_SESSION['user_id'] ) ) {
			return $_SESSION['user_id'];
		} else {
			return null;
		}
	}

	//Find User by Email

	public function register( $data ) {
		$this->db_object->query( 'INSERT INTO db_users (designation_id,email,password) VALUES (1,:email,:password)' );
		//Bind parameters
		/*  $this->db->bind(':name', $data['name']);*/
		$this->db_object->bind( ':email', $data['email'] );
		$this->db_object->bind( ':password', $data['password'] );
		if ( $this->db_object->execute() ) {
			return true;
		} else {
			return false;
		}
	}

	public function findUserByEmail( $email ) {
		$this->db_object->query( 'SELECT * FROM db_users WHERE email = :email' );
		$this->db_object->bind( ':email', $email );

		$row = $this->db_object->single();

		//Check row
		if ( $this->db_object->rowCount() > 0 ) {
			return true;
		} else {
			return false;
		}

	}

	public function findUserByUsername( $username ) {
		$this->db_object->query( 'SELECT * FROM db_users WHERE username = :username' );
		$this->db_object->bind( ':username', $username );

		$row = $this->db_object->single();

		//Check row
		if ( $this->db_object->rowCount() > 0 ) {
			return true;
		} else {
			return false;
		}

	}

	public function getUserById( $id ) {
		$this->db_object->query( 'SELECT * FROM users WHERE id = :id' );
		$this->db_object->bind( ':id', $id );

		$row = $this->db_object->single();

		return $row;

	}

	public function login( $email, $password ) {
		$this->db_object->query( 'SELECT * FROM db_users WHERE email=:email' );
		$this->db_object->bind( ':email', $email );

		$row = $this->db_object->single();

		$hashed_password = $row->password;


		if ( password_verify( $password, $hashed_password ) ) {
			return $row;
		} else {
			return false;
		}

	}
}