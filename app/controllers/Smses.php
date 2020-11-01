<?php

namespace App\Controllers;

use App\Models\Sms\Sms;
use App\Models\Sms\Template;
use App\Libraries\Validation;
use App\Libraries\Controller;
use App\Models\File;

class Smses extends Controller {
	private $file;

	public function __construct() {
		$this->file = new File();
		$this->middleware( [ 'Authentication' ] )->all();
		$this->middleware( [ 'Roles' ] )->all()->hasRole( [
			'all' => [ 'Admin' ],
		] );
	}

	public function index() {
		$templates = Template::GetInstance()->getAll();
		$data      = [
			'templates' => $templates,
		];
		$this->view( 'smses/templates/index', $data );
	}


	public function addTemplate() {
		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'name' )->value( $_POST['title'] )->pattern( 'text' )->required();
			$validation->name( 'body' )->value( $_POST['body'] )->pattern( 'text' )->required();


			if ( $validation->isSuccess() ) {
				$template        = new Template();
				$template->title = trim( $_POST['title'] );
				$template->body  = trim( $_POST['body'] );


				if ( $template->create() ) {
					redirect( 'Smses/index' );
				} else {
					die( 'Something went Wrong' );
				}

			} else {
				echo $validation->displayErrors();
			}
		} else {

			$this->view( 'smses/templates/add' );
		}
	}

	public function showTemplate( $id = 0 ) {
		$template = new Template();
		$template = $template->getById( $id );
		$data     = [
			'template' => $template,
		];
		$this->view( 'smses/templates/edit', $data );
	}

	public function editTemplate() {

		if ( POST ) {
			$validation = new Validation();
			$validation->name( 'title' )->value( $_POST['title'] )->pattern( 'text' )->required();
			$validation->name( 'body' )->value( $_POST['body'] )->pattern( 'text' )->required();

			if ( $validation->isSuccess() ) {
				$template        = new Template();
				$template->id    = trim( $_POST['id'] );
				$template->title = trim( $_POST['title'] );
				$template->body  = trim( $_POST['body'] );

				if ( $template->update() ) {
					redirect( 'Smses/index' );
				} else {
					die( 'Something went Wrong' );
				}


			} else {
				echo $validation->displayErrors();
			}

		}
	}

	public function sendSms() {
		$templates = Template::GetInstance()->getAll();
		$data      = [
			'csv'       => null,
			'templates' => $templates,
			'message'   => 1,
		];
		$this->view( 'smses/send_sms/send', $data );
	}

	public function showRecipient() {
		if ( POST ) {

			$csv_mimetypes = array(
				'text/csv',
				'application/csv',
				'application/excel',
				'application/ods',
				'application/vnd.ms-excel',
				'application/vnd.msexcel',
			);
			if ( in_array( $_FILES['file']['type'], $csv_mimetypes ) ) {

				$this->file->attach_file( $_FILES['file'] );
				$this->file->file_name  = uniqid() . '.csv';
				$this->file->upload_dir = 'file/csv';
				if ( $this->file->save() ) {
					$file = fopen( URLROOT . "/file/csv/" . $this->file->file_name, "r" );
					while ( ! feof( $file ) ) {
						$csv_data[] = ( fgetcsv( $file ) );
					}
					fclose( $file );
					$column_check = array_key_exists( 1, $csv_data[0] );
					if ( $column_check ) {
						$templates = Template::GetInstance()->getAll();
						$data      = [
							'csv'       => null,
							'templates' => $templates,
							'message'   => "The file has more than one column",
						];
						$this->view( 'smses/send_sms/send', $data );
					} else {
						$templates = Template::GetInstance()->getAll();
						$data      = [
							'csv'       => $csv_data,
							'templates' => $templates,
							'message'   => 1,
						];
						$this->view( 'smses/send_sms/send', $data );
					}
				} else {
					$templates = Template::GetInstance()->getAll();
					$data      = [
						'csv'       => null,
						'templates' => $templates,
						'message'   => "File was not saved",
					];
					$this->view( 'smses/send_sms/send', $data );
				}

			} else {
				$templates = Template::GetInstance()->getAll();
				$data      = [
					'csv'       => null,
					'templates' => $templates,
					'message'   => "File was not a csv file",
				];
				$this->view( 'smses/send_sms/send', $data );
			}

		} else {
			$templates = Template::GetInstance()->getAll();
			$data      = [
				'csv'       => null,
				'templates' => $templates,
				'message'   => 1,
			];
			$this->view( 'smses/send_sms/send', $data );
		}


	}

	public function submitRecipients() {
		if ( POST ) {
			$recipients       = $_POST['send_checkbox'];
			$recipient_number = count( $recipients );
			$message_body     = trim( $_POST['body'] );
			if ( $recipients == null OR $message_body == "" ) {
				$templates = Template::GetInstance()->getAll();
				$data      = [
					'csv'        => null,
					'templates' => $templates,
					'message'   => 1,
				];
				$this->view( 'smses/send_sms/send', $data );
			} else {
				Sms::GetInstance()->addSmsHistory( $recipient_number, $message_body );
				$result    = Sms::GetInstance()->sendSmsToRecipients( $recipients, $message_body );
				$templates = Template::GetInstance()->getAll();
				$data      = [
					'csv'       => null,
					'templates' => $templates,
					'message'   => $result,
				];
				$this->view( 'smses/send_sms/send', $data );
			}

		} else {
			$templates = Template::GetInstance()->getAll();
			$data      = [
				'csv'       => null,
				'templates' => $templates,
				'message'   => 1,
			];
			$this->view( 'smses/send_sms/send', $data );
		}
	}

	public function getSmsBody() {
		$sms_body = Template::GetInstance()->getBodyById( $_POST['template'] );
		if ( $sms_body == false ) {
			$sms_body->body = "";
		}

		return jsonResult( $sms_body );

	}

	public function getSmsHistory() {
		$sms_histories = Sms::GetInstance()->getAllSmsHistory();
		$data          = [
			'sms_histories' => $sms_histories,
		];
		$this->view( 'smses/send_sms/sms_history', $data );

	}

	public function sendIndividualSms() {

		if ( POST ) {
			$recipient_phone_no = trim( $_POST['phone_no'] );
			$recipient_number = 1;
			$message_body     = trim( $_POST['body'] );
			Sms::GetInstance()->addSmsHistory( $recipient_number, $message_body );
			$result    = Sms::GetInstance()->sendSms( $recipient_phone_no, $message_body );
			$templates = Template::GetInstance()->getAll();
			$data      = [
				'templates' => $templates,
				'message'   => $result,
			];
			$this->view( 'smses/send_sms/individual_sms', $data );


		}
		else{
			$templates = Template::GetInstance()->getAll();
			$data      = [
				'templates' => $templates,
				'message'   => 1,
			];
			$this->view( 'smses/send_sms/individual_sms', $data );
		}
	}

	public function checkBody() {
		$body =  $_GET['body'];
		$count = strlen($body);
		/*if ($count>=160)
		{
			return jsonResult( "Sms body exceeds 160 characters, it will cost double" );
		}*/
	/*	else{*/
			return jsonResult(true);
		/*}*/
	}
}