<?php
echo "Hello there, this is a PHP Apache container";
//These are the defined authentication environment in the db service

// The MySQL service named in the docker-compose.yml.
$host = 'db';

// Database use name
$user = 'MYSQL_USER';

//database user password
$pass = 'MYSQL_PASSWORD';

// database name
$mydatabase = 'MYSQL_DATABASE';
// check the mysql connection status
$conn = new mysqli($host, $user, $pass, $mydatabase);

if ($conn->connect_errno) {
    die("Connect Error: " . $conn->connect_error);
}
else{
  echo "<br><br>";
  echo "\nConnected with MYSQL"; 
  echo "<br>";
	$sql = "create table users (id int(6), username VARCHAR(30) ,password VARCHAR(30))";
	if ($conn->query($sql) === TRUE) {
		echo "Table users created successfully";
		echo "<br>";
	}

	$sql = "insert into users (username, password) values ('Alice','this is my password'), ('Job','12345678')";
	
	if ($conn->query($sql) === TRUE) {
		echo "Data inserted successfully";
		echo "<br>";
	}
	$sql = 'SELECT * FROM users';
	
	if ($result = $conn->query($sql)) {
		while ($data = $result->fetch_object()) {
			$users[] = $data;
		}
	}
	
	foreach ($users as $user) {
		echo "<br>";
		echo $user->username . " " . $user->password;
		echo "<br>";
	}
}
echo "<br>";

echo extension_loaded("mongodb") ? "loaded\n" : "not loaded\n";

  //  // connect to mongodb
    $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017");

   echo "Connection to Mongo database successfully";



$filter = ['id' => 1];
$options = [
   'projection' => ['_id' => 0],
];
$query = new MongoDB\Driver\Query($filter, $options);
$rows = $manager->executeQuery('examplesdb.users', $query); // $mongo contains the connection object to MongoDB

print_r($rows->toArray());


?>