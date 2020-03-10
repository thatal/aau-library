<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
require_once "includes/connection.php";
require_once "includes/common-functions.php";
$id = getFormValue("id");
if(!$id){
    $_SESSION["error"] = "Please select a valid request.";
    header("Location: index.php");
    die();
}
$query = "UPDATE daily_records set exit_date_time = '".date('Y-m-d H:i:s')."' where id = {$id}";
$query_run = mysqli_query($conn, $query) or die(mysqli_error($conn));
if($query_run){
    $_SESSION["success"] = "User Successfully exit.";
    header("Location: index.php");
    die();
}
$_SESSION["error"] = "Whoops! Something went wrong.";
header("Location: index.php");
die();
