<?php
include_once('../../class/auth.php');
require('../../config/config.php');



if (isset($_GET['id'])) {
    $id = $_GET['id']; 
} else {
    die('error id');
}

try {
    $newswitch = new Auth($pdo);
    if (!$newswitch->switchActive($id)) {
        throw new Exception('failed to update');
    }
    header("Location: ../../dashboard/admin/clients.php");
    exit;
} catch (Exception $e) {
    error_log($e->getMessage());
    die('errrrrro');
}
?>
