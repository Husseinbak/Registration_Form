<html>
<head>
	<title>Users Table</title>	
    <link rel="stylesheet" href="table.css">
</head>
<body>
	<h1>Users Table</h1>

	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Language</th>
				<th>Zipcode</th>
				<th>About</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "form_details";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// Fetch user data from the database
			$sql = "SELECT * FROM user_details";
			$result = $conn->query($sql);

			// Display user data in a table
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["name"] . "</td>";
					echo "<td>" . $row["email"] . "</td>";
					echo "<td>" . $row["phone"] . "</td>";
					echo "<td>" . $row["language"] . "</td>";
					echo "<td>" . $row["zipcode"] . "</td>";
					echo "<td>" . $row["about"] . "</td>";
					echo "</tr>";
				}
			} else {
				echo "0 results";
			}

			$conn->close();
			?>
		</tbody>
	</table>
</body>
</html>
