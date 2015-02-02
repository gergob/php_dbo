<?php

require_once('department.php');
require_once('employee.php');

class EmployeesRepository {

	private $db;
	private $errorMessageTemplate = '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span> %s </div>';

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
		$resultSet = $this->db->query("select * from employees limit 10");

		#the PDO::FETCH_CLASS parameter is used to return instances
		#of the class which is specified as second parameter
		$result = $resultSet->fetchAll(PDO::FETCH_CLASS,"Employee");

		return $result;
	}

	public function getEmployeesOlderThan($age) {
		$prepStatement = $this->db->prepare(
			"select * from employees e where ((DATEDIFF(NOW(), e.birth_date))/365) > :age"
		);
		$prepStatement->bindParam(":age", $age);

		$result = $prepStatement->execute();

		if($result) {
			return $prepStatement;
		}

		//in case the query was unsuccessful, return empty result
		return array();
	}

	public function getEmployeesWithSalariesBetween($min_salary, $max_salary) {
		$prepStatement = $this->db->prepare(
			"CALL SP_GET_EMPLOYEES_WITH_SALARIES_BETWEEN(?,?)"
		);
		$prepStatement->bindParam(1, $min_salary);
		$prepStatement->bindParam(2, $max_salary);

		$result = $prepStatement->execute();

		if($result) {
			return $prepStatement;
		}

		//in case the query was unsuccessful, return empty result
		return array();
	}

	public function formatErrorMessage($message) {
		return sprintf($this->errorMessageTemplate, $message);
	}


}





?>