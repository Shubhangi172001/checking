<?php
session_start();
include('function.php');
if(isset($_SESSION['ADMIN_ID']))
{
	header('pages?page=$2y$10$nkHtSfI59wxsInTVFFo42u00tef/bJmAYpzAhqDhezZ7k1THAjIrK');
	
}
if(!isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['ADMIN_ID']);
	redirect('pages?page=$2y$10$nkHtSfI59wxsInTVFFo42u00tef/bJmAYpzAhqDhezZ7k1THAjIrK');
}
?>
