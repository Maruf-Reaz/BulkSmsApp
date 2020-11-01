<?php
/**
 * PDO Database Class
 * Connect to Database
 * Create prepare statement
 * Bind Values
 * Return rows and results
 */
namespace App\Libraries;

use PDO;

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $dbname = DB_NAME;

    private $db_handler;
    private $stmt;
    private $error;

    public function __construct() {
        $this->openConnection();
    }

    public function openConnection() {
        //Set DSN
        $dsn     = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
                PDO::ATTR_PERSISTENT,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        // Create PDO instance
        try {
            $this->db_handler = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            $this->db_handler->rollback();
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /*public static function get_instance() {
         static $db = null;

         if ($db === null) {
             $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
             $db  = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

             // Throw an Exception when an error occurs
             $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         }

        return new Database();
    }*/

    //

    public function query($sql) {
        $this->stmt = $this->db_handler->prepare($sql);
    }

    //Binding Value
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    //Execute the prepared statement

    public function resultSet() {
        $this->execute();

        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Get result set as array of objects

    public function execute() {
        return $this->stmt->execute();
    }

    //Get a single object

    public function single() {
        $this->execute();

        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //Get the row Count

    public function rowCount() {
        return $this->stmt->rowCount();
    }

    public function lastInsertId() {
        return $this->db_handler->lastInsertId();
    }

	//Get a single db record as assoc

	public function result() {
		$this->execute();

		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function results() {
		$this->execute();

		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}