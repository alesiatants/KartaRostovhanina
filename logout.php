<?php
include("head.php");
if(isset($_SESSION['user']['login'])){
$obj = new TProfileRepository();
$obj->logout();}else{
	header("Location:login.php");
}
include("footer.php");
?>