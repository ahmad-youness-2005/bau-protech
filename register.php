<?php require_once "opendb.php"; ?>
<?php 

$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
 echo "Error creating database: " . $conn->error;
}

$conn->select_db('myDB');

$sql = "CREATE TABLE MyGuests (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
 echo "Error creating table: " . $conn->error;
}


$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Mahmoud', 'Skafi', 'mahmoud.skafi@bau.edu.lb')";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 // output data of each row  
while($row = $result->fetch_assoc()) {
 	echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
 echo "0 results";
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 echo "<table><tr><th>ID</th><th>Name</th></tr>";   
// output data of each row  
while($row = $result->fetch_assoc()) {
 echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
  }  echo "</table>";
} else {
 echo "0 results";
}

$sql = "UPDATE MyGuests SET lastname='Pizza' WHERE id=1";
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
 echo "Error updating record: " . $conn->error;
}





?>