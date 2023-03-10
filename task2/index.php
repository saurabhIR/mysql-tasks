<?php
include "connection.php";
include "queries.php";
$query = new Queries($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Sql Task 2</title>
</head>

<body>
	<?php $query->employee_code_table(); ?>
	<?php $query->employee_salary_table(); ?>
	<?php $query->employee_details_table(); ?>
	<p>Q1</p>
	<?php $query->query1(); ?>
	<p>Q2</p>
	<?php $query->query2(); ?>
	<p>Q3</p>
	<?php $query->query3(); ?>
	<p>Q4</p>
	<?php $query->query4(); ?>
	<p>Q5</p>
	<?php $query->query5(); ?>
	<p>Q6</p>
	<?php $query->query6(); ?>
	<p>Q7</p>
	<?php $query->query7(); ?>



</html>