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
		$sql = "SELECT v.name AS 'Venue of match',
		m.date AS 'Date of match',
		t1.name AS 'Team 1 name',
		t2.name AS 'Team 2 name',
		t1.captain AS 'Captain of team 1',
		t2.captain AS 'Captain of team 2',
		m.toss_winner AS 'Toss won by',
		m.winner AS 'Match won by'
		FROM Matches m
		JOIN Venues v ON m.venue_id = v.id
		JOIN Teams t1 ON m.team1_id = t1.id
		JOIN Teams t2 ON m.team2_id = t2.id
		ORDER BY m.date;";
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
				echo "<table>
								<tr>
									<th>Venue of match</th>
									<th>Date of match</th>
									<th>Team 1 name</th>
									<th>Team 2 name</th>
									<th>Captain of team 1</th>
									<th>Captain of team 2</th>
									<th>Toss won by</th>
									<th>Match won by</th>
								</tr>";
				while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>
										<td>" . $row['Venue of match'] . "</td>
										<td>" . $row['Date of match'] . "</td>
										<td>" . $row['Team 1 name'] . "</td>
										<td>" . $row['Team 2 name'] . "</td>
										<td>" . $row['Captain of team 1'] . "</td>
										<td>" . $row['Captain of team 2'] . "</td>
										<td>" . $row['Toss won by'] . "</td>
										<td>" . $row['Match won by'] . "</td>
									</tr>";
				}
				echo "</table>";
		} else {
				echo "Empty result";
		}
}


	public function Venues(){
		$sql = 'SELECT * FROM  Venues';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
				echo "<table>
								<tr>
									<th>Venues</th>
								</tr>
								<tr>
									<th>id</th><th>name</th><th>location</th>
								</tr>";
				while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr><td>" . $row['id'] . "</td>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['location'] . "</td></tr>";
				}
				echo "</table>";
		} else {
				echo "Empty result";
		}
}

	public function Teams(){
		$sql = 'SELECT * FROM  Teams';
		$result = mysqli_query($this->conn, $sql);
		if (mysqli_num_rows($result) > 0) {
				echo "<table>
				<tr>
					<th>Teams</th>
				</tr>
				<tr>
					<th>id</th><th>name</th><th>captain</th>
				</tr>";
				while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr><td>" . $row['id'] . "</td>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['captain'] . "</td></tr>";
				}
				echo "</table>";
		} else {
				echo "Empty result";
		}
}

public function Matches(){
	$sql = 'SELECT * FROM  Matches';
	$result = mysqli_query($this->conn, $sql);
	if (mysqli_num_rows($result) > 0) {
			echo "<table>
			<tr>
				<th>Matches</th>
			</tr>
			<tr>
				<th>match_id</th><th>venue_id</th><th>date</th><th>team1_id</th><th>team2_id</th><th>toss_winner</th><th>winner</th>
			</tr>";
			while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>" . $row['match_id'] . "</td>";
					echo "<td>" . $row['venue_id'] . "</td>";
					echo "<td>" . $row['date'] . "</td>";
					echo "<td>" . $row['team1_id'] . "</td>";
					echo "<td>" . $row['team2_id'] . "</td>";
					echo "<td>" . $row['toss_winner'] . "</td>";
					echo "<td>" . $row['winner'] . "</td>";
					"</tr>";
			}
			echo "</table>";
	} else {
			echo "Empty result";
	}
}

}
?>