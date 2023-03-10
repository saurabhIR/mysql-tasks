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
	<title>Sql Task 1</title>
</head>

<body>
	<?php $query->Venues(); ?>
	<?php $query->Teams(); ?>
	<?php $query->Matches(); ?>
	<p>Q1</p>
	<?php $query->query1(); ?>

</html>