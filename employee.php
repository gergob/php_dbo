<?php

class Employee {

	private $first_name;
	private $last_name;
	private $birth_date;
	private $hire_date;
	private $emp_no;
	private $gender;

	//
	// GETTERS
	//

	public function getFirstName() {
		return $this->first_name;
	}

	public function getLastName() {
		return $this->last_name;
	}

	public function getBirthDate() {
		return $this->birth_date;
	}

	public function getHireDate() {
		return $this->hire_date;
	}

	public function getEmpNo() {
		return $this->emp_no;
	}

	public function getGender() {
		return $this->gender;
	}

	//
	// SETTERS
	//

	public function setGender($gender) {
		return $this->gender = $gender;
	}

	public function setEmpNo($emp_no) {
		return $this->emp_no = $emp_no;
	}

	public function setHireDate($hire_date) {
		return $this->hire_date = $hire_date;
	}

	public function setBirthDate($birth_date) {
		return $this->birth_date = $birth_date;
	}

	public function setLastName($last_name) {
		return $this->last_name = $last_name;
	}

	public function setFirstName($first_name) {
		return $this->first_name = $first_name;
	}

}



?>