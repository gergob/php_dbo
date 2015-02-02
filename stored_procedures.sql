
DROP PROCEDURE IF EXISTS SP_GET_EMPLOYEES_WITH_SALARIES_BETWEEN;

DELIMITER //

CREATE PROCEDURE SP_GET_EMPLOYEES_WITH_SALARIES_BETWEEN 
(IN p_start INT, 
 IN  p_end INT)
BEGIN
	SELECT e.first_name, e.last_name, max(s.salary) as salary
    FROM `employees` e, `salaries`s
	WHERE s.salary > p_start AND s.salary < p_end and s.emp_no=e.emp_no
	GROUP BY e.first_name, e.last_name;

END //
DELIMITER ;
