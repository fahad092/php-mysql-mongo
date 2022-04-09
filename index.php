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

try {
  $conn = new PDO("mysql:host=localhost;dbname=$mydatabase", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully\n";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage() . "\n";
}
/*
$conn = new mysqli($host, $user, $pass, $mydatabase);

// select query
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
*/
echo extension_loaded("mongodb") ? "loaded\n" : "not loaded\n";

  //  // connect to mongodb
    $manager = new MongoDB\Driver\Manager("mongodb://root:password@mongo:27017");

   echo "Connection to database successfully";


// // Query Class
// $query = new MongoDB\Driver\Query(array('likes' => 100));

// // Output of the executeQuery will be object of MongoDB\Driver\Cursor class
// $cursor = $manager->executeQuery('examplesdb.examplesCol', $query);

// // Convert cursor to Array and print result
// print_r($cursor->toArray());

// foreach($cursor as $r){
//   print_($r);
// }

$filter = ['id' => 1];
$options = [
   'projection' => ['_id' => 0],
];
$query = new MongoDB\Driver\Query($filter, $options);
$rows = $manager->executeQuery('examplesdb.users', $query); // $mongo contains the connection object to MongoDB

print_r($rows->toArray());

   // select a database
  //  $db = $m->examplesdb;
 
  //  echo "Database examplesdb selected";
 

//  MongoDB connection

 // PHP version 7.4 used here
//  try {
//   // connect to OVHcloud Public Cloud Databases for MongoDB (cluster in version 4.4, MongoDB PHP Extension in 1.8.1)
//   $m = new MongoDB\Driver\Manager('mongodb://root:password@mongo:27017/admin?tls=true');
// //  if($m->connection_status) 
//     //echo "Mongo Conected to database successfully";
//     $db = $m->examplesdb;
//     $collection = $db->examplescol;

//     $cursor = $collection->find();
//   // iterate cursor to display title of documents
//   foreach ($cursor as $document) {
//   echo $document["title"] . "\n";
//  }
// }
// catch (Throwable $e) {
//   // catch throwables when the connection is not a success
//   echo "Captured Throwable for connection : " . $e->getMessage() . PHP_EOL;
// }



?>

