<?php

require_once('department.php');
require_once('employee.php');

class EmployeesRepository {

	private $db;

	public function __construct($host, $database, $user, $password) {
		try {
			$this->db = new PDO("mysql:host=".$host.";dbname=".$database,$user,$password);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch(PDOException $pdoEx) {
			echo $pdoEx->getMessage();
			die();
		}
		catch(Exception $ex) {
			echo $ex->getMessage();
			die();
		}
	}

	public function __destruct() {
		//close the connection if this still exists
		if($this->db) {
			$this->db = null;
		}
	}

	public function getAllDepartments() {
		$resultSet = $this->db->query("select * from departments");

		#the PDO::FETCH_CLASS parameter is used to return instances
		#of the class which is specified as second parameter
		$result = $resultSet->fetchAll(PDO::FETCH_CLASS,"Department");

		return $result;
	}

	public function getAllEmployees() {
		$resultSet = $this->db->query("select * from employees limit 100");

		#the PDO::FETCH_CLASS parameter is used to return instances
		#of the class which is specified as second parameter
		$result = $resultSet->fetchAll(PDO::FETCH_CLASS,"Employee");

		return $result;
	}


}





?>