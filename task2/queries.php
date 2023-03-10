<?php
	echo '<link rel="stylesheet" href="style.css">';

class Queries
{
	public $conn;
	function __construct($conn)
	{

			$this->conn = $conn;
	}

	public function query1()
{
    $sql = 'SELECT employee_details_table.employee_first_name      
        FROM employee_salary_table      
        INNER JOIN employee_details_table ON employee_salary_table.employee_id = employee_details_table.employee_id      
        WHERE employee_salary_table.employee_salary > 50000;';
    $result = mysqli_query($this->conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<table><tr><th>First Name</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['employee_first_name'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Empty result";
    }
}

	
	public function query2()
	{
		$sql = 'SELECT employee_last_name
		FROM employee_details_table
		WHERE graduation_percentile > 70.00;';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
				echo "<table><tr><th>Last name</th></tr>";
				while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr><td>" . $row['employee_last_name'] . "</td></tr>";
				}
				echo "</table>";
		} else {
				echo "empty result";
		}
	}
	
	public function query3()
	{
		$sql = 'SELECT employee_code_name
		from employee_code_table
		join employee_salary_table ON employee_code_table.employee_code=employee_salary_table.employee_code
		join employee_details_table ON employee_details_table.employee_id=employee_salary_table.employee_id
		where Graduation_percentile <70.00;';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
				echo "<table><tr><th>Employee Code Name</th></tr>";
				while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr><td>" . $row['employee_code_name'] . "</td></tr>";
				}
				echo "</table>";
		} else {
				echo "empty result";
		}
	}
	public function query4()
	{
		$sql = 'SELECT CONCAT(employee_first_name," ",employee_last_name) AS full_name 
		from employee_details_table
		join employee_salary_table ON employee_salary_table.employee_id=employee_details_table.employee_id
		join employee_code_table ON employee_code_table.employee_code=employee_salary_table.employee_code
		where employee_code_table.employee_domain!="Java";';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
				echo "<table><tr><th>Full Name</th></tr>";
				while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr><td>" . $row['full_name'] . "</td></tr>";
				}
				echo "</table>";
		} else {
				echo "empty result";
		}
	}
	public function query5()
	{
		$sql = 'SELECT employee_code_table.employee_domain, SUM(employee_salary_table.employee_salary) as total_salary 
		FROM employee_code_table 
		JOIN employee_salary_table ON employee_code_table.employee_code = employee_salary_table.employee_code 
		GROUP BY employee_code_table.employee_domain;';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
				echo "<table><tr><th>Employee Domain</th><th>Sum</th></tr>";
				while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr><td>" . $row['employee_domain'] . "</td><td>" . $row['total_salary'] . "</tr>";
				}
				echo "</table>";
		} else {
				echo "empty result";
		}
	}
	public function query6()
	{
		$sql = 'SELECT employee_code_table.employee_domain, SUM(employee_salary_table.employee_salary) as total_salary 
		FROM employee_code_table 
		JOIN employee_salary_table ON employee_code_table.employee_code = employee_salary_table.employee_code 
		WHERE employee_salary_table.employee_salary >= 30000
		GROUP BY employee_code_table.employee_domain;';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
				echo "<table><tr><th>Employee Domain</th><th>Sum</th></tr>";
				while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr><td>" . $row['employee_domain'] . "</td><td>" . $row['total_salary'] . "</tr>";
				}
				echo "</table>";
		} else {
				echo "empty result";
		}
	}
	public function query7()
	{
		$sql = 'SELECT employee_salary_table.employee_id 
		FROM employee_salary_table 
		LEFT JOIN employee_code_table ON employee_salary_table.employee_code = employee_code_table.employee_code 
		WHERE employee_code_table.employee_code IS NULL;';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
				echo "<table><tr><th>Employee Id</th></tr>";
				while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr><td>" . $row['employee_id'] . "</td></tr>";
				}
				echo "</table>";
		} else {
				echo "empty result";
		}
	}

	public function employee_code_table(){
		$sql = 'SELECT * FROM  employee_code_table';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
				echo "<table>
								<tr>
									<th>employee_code_table</th>
								</tr>
								<tr>
									<th>employee_code</th><th>employee_code_name</th><th>employee_domain</th>
								</tr>";
				while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr><td>" . $row['employee_code'] . "</td>";
						echo "<td>" . $row['employee_code_name'] . "</td>";
						echo "<td>" . $row['employee_domain'] . "</td></tr>";
				}
				echo "</table>";
		} else {
				echo "Empty result";
		}
}

	public function employee_salary_table(){
		$sql = 'SELECT * FROM  employee_salary_table';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
				echo "<table>
				<tr>
					<th>employee_salary_table</th>
				</tr>
				<tr>
					<th>employee_id</th><th>employee_salary</th><th>employee_code</th>
				</tr>";
				while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr><td>" . $row['employee_id'] . "</td>";
						echo "<td>" . $row['employee_salary'] . "</td>";
						echo "<td>" . $row['employee_code'] . "</td></tr>";
				}
				echo "</table>";
		} else {
				echo "Empty result";
		}
}

public function employee_details_table(){
	$sql = 'SELECT * FROM  employee_details_table';
	$result = mysqli_query($this->conn, $sql);
	if (mysqli_num_rows($result) > 0) {
			echo "<table>
			<tr>
				<th>employee_details_table</th>
			</tr>
			<tr>
				<th>employee_id</th><th>employee_first_name</th><th>employee_last_name</th><th>graduation_percentile</th>
			</tr>";
			while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>" . $row['employee_id'] . "</td>";
					echo "<td>" . $row['employee_first_name'] . "</td>";
					echo "<td>" . $row['employee_last_name'] . "</td>";
					echo "<td>" . $row['graduation_percentile'] . "</td></tr>";
			}
			echo "</table>";
	} else {
			echo "Empty result";
	}
}

}
?>