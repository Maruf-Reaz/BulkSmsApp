<?php

namespace App\Models\Sms;
use App\Libraries\Database;
use App\Libraries\Model;
class Template extends Model {
	protected static $table_name = "db_sms_templates";
	protected static $db_fields = [
		'id',
		'title',
		'body'
	];
	public $id;
	public $title;
	public $body;
	protected $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}
	public function getBodyById( $id ) {
		$this->db_object->query( 'SELECT * FROM db_sms_templates WHERE id=:id' );
		$this->db_object->bind( ':id', $id );
		$result = $this->db_object->single();
		return $result;
	}

}