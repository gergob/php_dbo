<?php

class Department{
	private $dept_no;
	private $dept_name;

	public function __construct() {

	}

	public function getDeptNo() {
		return $this->dept_no;
	}

	public function getDeptName() {
		return $this->dept_name;
	}

	public function setDeptNo($dept_no) {
		$this->dept_no = $dept_no;
	}

	public function setDeptName($dept_name) {
		$this->dept_name = $dept_name;
	}

}


?>