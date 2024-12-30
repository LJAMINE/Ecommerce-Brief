<?php 

$servername="localhost";
$username="root";
$password="";
$dbname="ecommerce";

try {
    $dns="mysql:host=". $servername . ";dbname=" . $dbname;

$pdo=new PDO($dns,$username,$password);

echo 'good connexion';

} catch (PDOException $e) {
echo $e;
}
?>