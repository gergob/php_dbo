<?php

require_once('employee_repository.php');

try {

	$repo = new EmployeesRepository("localhost", "employees", "emp_user", "emp_user1234");
	$result = $repo->getAllDepartments();

	foreach ($result as $item){
		printf("%s=%s | ",$item->getDeptNo(),$item->getDeptName());
	}

}catch (PDOException $pdoEx) {
	echo $pdoEx->getMessage();
	die();
}

?>