<?php

require_once 'connec.php';

session_start();

const BR = '<br> <br>';

// Create connection to database
$pdo = new \PDO(DSN, USER, PASS, [
    PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC
]);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll();
//$query = "INSERT INTO friend (firstname, lastname) VALUES ('Chandler', 'Bing')";
//$statement = $pdo->exec($query);

//$query = "DELETE FROM friend WHERE firstname='Chandler'";
//$statement = $pdo->exec($query);

foreach($friends as $friend) {
    echo $friend['firstname'] . ' ' . $friend['lastname'] . "<br>";
}

echo BR;