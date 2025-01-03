<?php 
include_once('../../class/auth.php');
require('../../config/config.php');


$newswitch=new Auth($pdo);
$newswitch->switchActive($id);

header("location:../../dashboard/admin/clients.php");

// $newObjectswitch=new 

?>