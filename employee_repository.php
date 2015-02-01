<?php

require_once('department.php');
require_once('employee.php');

class EmployeesRepository {

	private $db;

	public function __construct($host, $database, $user, $password) {
		$this->db = new PDO("mysql:host=".$host.";dbname=".$database,$user,$password);
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function getAllDepartments() {
		$resultSet = $this->db->query("select * from departments");
		$result = $resultSet->fetchAll(PDO::FETCH_CLASS,"Department");

		return $result;
	}


}





?>