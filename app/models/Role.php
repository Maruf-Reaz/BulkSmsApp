<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 12/6/2018
 * Time: 1:54 PM
 */

namespace App\Models;


use App\Libraries\Model;
use App\Libraries\Database;
use App\Models\Account\Accountant;

class Role extends Model {
	protected static $table_name = 'db_roles';
	protected static $db_fields = [ 'id', 'name' ];

	public $db_object;
	/*Properties*/
	public $id;
	public $name;

	public function __construct() {
		$this->db_object = new Database();
	}

	public static function getRolesByNames( $role_names = [] ) {
		$roles = [];
		foreach ( $role_names as $name ) {
			$role    = self::GetInstance()->getRoleByName( $name );
			$roles[] = $role;
		}

		return $roles;
	}

	public function getRoleByName( $role_name ) {
		$this->db_object->query( 'SELECT * FROM db_roles WHERE name=:name LIMIT 1' );
		$this->db_object->bind( ':name', $role_name );
		$result = $this->db_object->single();

		return $result;

	}

	public function getAllByGroupId( $group_id ) {
		if ( self::GetInstance()->isExist( 'id', $group_id ) ) {
			$role_name = self::getRoleById( $group_id );
			$data      = [];
			switch ( $role_name ) {
				//Role id=4 => Teachers
				case "Teacher":
					$teachers = Teacher::GetInstance()->getAll();
					$data[]   = $teachers;
					break;
				case "Student":
					$students = Student::GetInstance()->getAll();
					$data[]   = $students;
					break;
				case "Accountant":
					$accountants = Accountant::GetInstance()->getAll();
					$data[]      = $accountants;
					break;
				case "Guardian":
					$guardians = Guardian::GetInstance()->getAll();
					$data[]    = $guardians;
					break;

				default:
					$data = [];
			}

			return $data;
		}

	}

	public static function getRoleById( $id = 0 ) {
		return self::GetInstance()->getById( $id )->name;
	}

	public function getByGroupId( $group_id, $person_id ) {
		if ( self::GetInstance()->isExist( 'id', $group_id ) ) {
			$role_name = self::getRoleById( $group_id );
			$data      = [];

			switch ( $role_name ) {
				//Role id=4 => Teachers
				case "Teacher":
					if ( Teacher::GetInstance()->isExist( 'id', $person_id ) ) {
						$teachers = Teacher::GetInstance()->getById( $person_id );
						$data[]   = $teachers;
						break;
					}
					break;
				case "Student":
					if ( Student::GetInstance()->isExist( 'id', $person_id ) ) {
						$students = Student::GetInstance()->getAll();
						$data[]   = $students;
						break;
					}
					break;
				case "Accountant":
					if ( Accountant::GetInstance()->isExist( 'id', $person_id ) ) {
						$accountants = Accountant::GetInstance()->getAll();
						$data[]      = $accountants;
						break;
					}
					break;

				case "Guardian":
					if ( Accountant::GetInstance()->isExist( 'id', $person_id ) ) {
						$guardians = Guardian::GetInstance()->getAll();
						$data[]    = $guardians;
						break;
					}

					break;
				default:
					$data = [];
			}

			return $data;
		}

	}

	public function getByGroupIdAndRegNo( $group_id, $reg_no ) {

		if ( self::GetInstance()->isExist( 'id', $group_id ) ) {
			$role_name = self::getRoleById( $group_id );
			$data      = [];

			switch ( $role_name ) {
				//Role id=4 => Teachers
				case "Teacher":
					if ( Teacher::GetInstance()->isExist( 'registration_no', $reg_no ) ) {
						$teachers = Teacher::GetInstance()->getByField( 'registration_no', $reg_no );
						$data[]   = $teachers;
						break;
					}
					break;
				case "Student":
					if ( Student::GetInstance()->isExist( 'registration_no', $reg_no ) ) {
						$students = Student::GetInstance()->getByField( 'registration_no', $reg_no );
						$data[]   = $students;
						break;
					}
					break;
				case "Accountant":
					if ( Accountant::GetInstance()->isExist( 'registration_no', $reg_no ) ) {
						$accountants = Accountant::GetInstance()->getByField( 'registration_no', $reg_no );
						$data[]      = $accountants;
						break;
					}
					break;
				case "Guardian":
					if ( Accountant::GetInstance()->isExist( 'registration_no', $reg_no ) ) {
						$guardians = Guardian::GetInstance()->getByField( 'registration_no', $reg_no );
						$data[]    = $guardians;
						break;
					}

					break;
				default:
					$data = [];
			}

			return $data;
		}

	}

	public function getAllByGroupName( $role_name ) {
		if ( self::GetInstance()->isExist( 'name', $role_name ) ) {
			$data = [];
			switch ( $role_name ) {
				//Role id=4 => Teachers
				case "Teacher":
					$teachers = Teacher::GetInstance()->getAll();
					$data[]   = $teachers;
					break;
				case "Student":
					$students = Student::GetInstance()->getAll();
					$data[]   = $students;
					break;
				case "Accountant":
					$accountants = Accountant::GetInstance()->getAll();
					$data[]      = $accountants;
					break;
				case "Guardian":
					$guardians = Guardian::GetInstance()->getAll();
					$data[]    = $guardians;
					break;

				default:
					$data = [];
			}

			return $data;
		}

	}

}