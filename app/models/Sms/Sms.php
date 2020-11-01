<?php

namespace App\Models\Sms;

use App\Libraries\Model;
use App\Libraries\Database;
use Carbon\Carbon;

class Sms extends Model {

	protected $db_object;

	public function __construct() {
		$this->db_object = new Database();
	}

	public function sendSmsToRecipients( $recipients, $message_text ) {
		$numbers = "+";
		$to      = "";
		foreach ( $recipients as $recipient_number ) {
			$numbers .= $recipient_number . ",+";
			$len     = strlen( $numbers );
			$to      = substr( $numbers, 0, $len - 2 );

		}

		$message = $message_text;
		$to;
		$message;
		$result = $this->sendSms( $to, $message );

		return $result;
	}


	public function sendSms( $to, $message ) {
		$token = "a380a7ad7b19fd20c6a161cb114ba228";
		$url   = "http://api.greenweb.com.bd/api.php";
		$data  = array(
			'to'      => "$to",
			'message' => "$message",
			'token'   => "$token"
		); // Add parameters in key value
		$ch    = curl_init(); // Initialize cURL
		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_ENCODING, '' );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $data ) );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_FORBID_REUSE, 1 );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array( 'Connection: Close' ) );
		$smsresult = curl_exec( $ch );

		return $smsresult;
		//sendsms end//
	}

	public function getAllSmsHistory() {
		$this->db_object->query( 'SELECT * FROM db_sms_histories' );
		$result = $this->db_object->resultSet();
		return $result;
	}

	public function addSmsHistory( $sms_number, $message_body ) {
		$time = Carbon::now()->toDateTimeString();
		$this->db_object->query( 'INSERT INTO db_sms_histories (total_recipients, sent_message,time) VALUES (:total_recipients, :sent_message,:time)' );
		$this->db_object->bind( ':total_recipients', $sms_number );
		$this->db_object->bind( ':sent_message', $message_body );
		$this->db_object->bind( ':time', $time );
		$this->db_object->execute();

	}

}
