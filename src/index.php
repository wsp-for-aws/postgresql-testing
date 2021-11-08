<?php
$dbType = getenv('DB_CONNECTION');

if (!$dbType) {
    die ("No DB_CONNECTION env was found");
}

if ($dbType !== 'postgres') {
    die ("Error, DB_CONNECTION environment variable is $dbType instead of postgres");
}

$dbHost = getenv('DB_HOST');
$dbPort = getenv('DB_PORT');
$dbName= getenv('DB_NAME');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');

$conn_string = "host=$dbHost port=$dbPort dbname=$dbName user=$dbUser password=$dbPassword";
$dbconn = pg_connect($conn_string)
or die("Cannot connect to db server\n");
echo "Successfully connected to database: " . pg_dbname();
pg_close($dbconn);
