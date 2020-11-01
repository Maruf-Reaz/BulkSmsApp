<?php


namespace App\Libraries;


class Model {
	/**
	 * override this field in your model to use getAll(),getById($id),save(),update(),delete() method
	 * */
	protected static $table_name;

	/**
	 * override this field in your model to use getAll(),getById($id),save(),update(),delete() method
	 * */

	protected static $db_fields = [];

	/**
	 * @var Database
	 **/
	protected $db_object;

	/**
	 * @param mixed $param
	 *
	 * @return $this
	 */
	public static function GetInstance( $param = null ) {
		$instance = new Static( $param );

		return $instance;
	}

	/**
	 * Use this method to get a object from database
	 *
	 * @param $id
	 *
	 * @return $this object single objcet from database ex- returns a record as object
	 */
	public function getById( $id ) {
		$sql = "SELECT * FROM " . static::$table_name . " WHERE id=:id";
		$this->db_object->query( $sql );
		$this->db_object->bind( ":id", $id );
		$result = $this->db_object->result();

		return $this->instantiate( $result );
	}

	private function instantiate( $record ) {

		$class  = get_called_class();
		$object = new $class();//will initialize a child object

		foreach ( $record as $attribute => $value ) {
			if ( $object->has_attribute( $attribute ) ) {
				$object->$attribute = $value;
			}
		}

		return $object;
	}

	/**
	 * Use this method to get a object from database
	 *
	 * @param $field_name
	 * @param $value
	 *
	 * @return $this object single objcet from database ex- returns a record as object
	 */
	public function getByField( $field_name, $value ) {
		$sql = "SELECT * FROM " . static::$table_name . " WHERE " . $field_name . "=:value";
		$this->db_object->query( $sql );
		$this->db_object->bind( ":value", $value );
		$result = $this->db_object->result();
		if ( $result ) {
			return $this->instantiate( $result );
		} else {
			return null;
		}
	}

	/*public static function getBySql($sql) {
		self::$db_object = self::get_instance();
		self::$db_object->query($sql);

		return self::$db_object->resultSet();
	}*/

	/**
	 * @returns All of the records as object from database
	 * */
	public function getAll() {
		$sql = "SELECT * FROM " . static::$table_name;
		$this->db_object->query( $sql );
		$results      = $this->db_object->results();
		$object_array = [];
		foreach ( $results as $result ) {
			$object_array[] = $this->instantiate( $result );
		}

		return $object_array;
	}

	/**
	 * Use this method to get a Database instance
	 *
	 * @returns a Database() object
	 * */
	/*public static function get_instance() {
		if ($this->db_object === null) {
			$this->db_object = new Database();

			return self::$db_object;
		} else {
			return self::$db_object;
		}
	}*/
	/**
	 *  use this method to save an object to db
	 */

	public function save() {
		return isset( $this->id ) ? $this->update() : $this->create();
	}

	/**
	 * use this method to update an object
	 * $item = new Item();
	 * $item->id=1;
	 * $item->name='foo';
	 * $item->update()
	 *
	 * @return bool
	 */
	public function update() {
		$attribute_pairs = [];
		$attributes      = $this->attributes();
		foreach ( $attributes as $key => $value ) {
			$attribute_pairs[] = "{$key}=:{$key}";
		}
		$sql = "UPDATE " . static::$table_name . " SET ";
		$sql .= join( ", ", $attribute_pairs );
		$sql .= " WHERE id =:id ";
		$this->db_object->query( $sql );
		foreach ( $attributes as $key => $value ) {
			$this->db_object->bind( ":{$key}", $value );
		}
		$this->db_object->bind( ":id", $this->id );
		if ( $this->db_object->execute() ) {
			return true;
		} else {
			return false;
		}
	}


	protected function attributes() {
		$attributes = [];
		foreach ( static::$db_fields as $field ) {
			if ( property_exists( $this, $field ) ) {
				$attributes[ $field ] = $this->$field;
			}
		}

		return $attributes;
	}

	/**
	 * use this method to create an object
	 * $item = new Item();
	 * $item->name='foo';
	 * $item->create()
	 *
	 * @return bool
	 */
	public function create() {
		$attributes = $this->attributes();
		$sql        = "INSERT INTO " . static::$table_name . " (";
		$sql        .= join( ", ", array_keys( $attributes ) );
		$sql        .= ") VALUES (:";
		$sql        .= join( ", :", array_keys( $attributes ) );
		$sql        .= ")";
		$this->db_object->query( $sql );
		foreach ( $attributes as $key => $value ) {
			$this->db_object->bind( ":{$key}", $value );
		}
		if ( $this->db_object->execute() ) {
			return true;
		} else {
			return false;
		}
	}

	public function delete() {
		$this->db_object->query( 'DELETE FROM ' . static::$table_name . ' WHERE id=:id' );
		$this->db_object->bind( ':id', $this->id );

		if ( $this->db_object->execute() ) {
			return true;
		} else {
			return false;
		}
	}

	public function isExist( $field, $value ) {
		$this->db_object->query( "SELECT * FROM " . static::$table_name . " WHERE " . $field . "=:value LIMIT 1" );
		$this->db_object->bind( ':value', $value );
		$ob = $this->db_object->single();
		if ( $ob ) {
			return true;
		} else {
			return false;
		}
	}
	public function isExistsExceptId( $field, $value,$id ) {
		$this->db_object->query( "SELECT * FROM " . static::$table_name . " WHERE " . $field . "=:value LIMIT 1 AND id!=:id" );
		$this->db_object->bind( ':value', $value );
		$this->db_object->bind( ':id', $id );
		$ob = $this->db_object->single();
		if ( $ob ) {
			return true;
		} else {
			return false;
		}
	}


	public function fieldsExist( $field_value ) {
		$keys     = array_keys( $field_value );
		$last_key = end( $keys );
		$sql      = "SELECT * FROM " . static::$table_name . " WHERE ";
		foreach ( $field_value as $key => $value ) {
			$sql .= $key . "=:" . $key;
			if ( $last_key != $key ) {
				$sql .= " AND ";
			}
		}
		$sql .= " LIMIT 1";
		$this->db_object->query( $sql );
		foreach ( $field_value as $key => $value ) {
			$this->db_object->bind( ':' . $key, $value );
		}
		$ob = $this->db_object->single();
		if ( $ob ) {
			return true;
		} else {
			return false;
		}
	}

	private function has_attribute( $attribute ) {
		$object_vars = get_object_vars( $this );

		return array_key_exists( $attribute, $object_vars );
	}

}