<?
$user = 'root';
$password = 'root';
$db = 'libraria';
$host = 'localhost';
$port = 3306;
$link = mysqli_connect(
    "$host:$port",
    $user,
    $password,
    $db
);
?>