<?php
// include('../../dashboard/admin/admin.php');
include('../../config/config.php');
include("../../class/products_maager.php");

if (isset($_POST['delete'])) {
$id=$_POST['id_delete'];

$newdelete=new ProductsManager($pdo);

$newdelete->deleteProduct($id);

header('location:../../dashboard/admin/admin.php');
}

?>