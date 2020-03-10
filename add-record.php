<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
require_once "includes/common-functions.php";
require_once "includes/connection.php";
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $_SESSION["error"] = "Whoops! method not allowed.";
    header("Location: index.php");
    die();
}
$type        = getFormValue("type");
$id_card_no  = getFormValue("id_card_no");
$name        = getFormValue("name");
$designation = getFormValue("designation");
$roll_no     = getFormValue("roll_no");
if (!in_array($type, ["employee", "student"])) {
    $_SESSION["error"] = "Type field is required.";
    header("Location: index.php");
    die();
}
if (!getFormValue("id_card_no")) {
    $_SESSION["error"] = "ID card no field is required.";
    header("Location: index.php");
    die();
}
if (!getFormValue("name")) {
    $_SESSION["error"] = "name field is required.";
    header("Location: index.php");
    die();
}
$data = [
    "id_card_no"      => $id_card_no,
    "user_type"       => $type,
    "name"            => $name,
    "roll_no"         => $roll_no,
    "designation"     => $designation,
    "entry_date_time" => date("Y-m-d H:i:s"),
];
$already_exist_query = "SELECT id_card_no from daily_records where id_card_no = {$id_card_no} and exit_date_time is null";

$already_exist_query_run = mysqli_query($conn, $already_exist_query) or die(mysqli_error($conn));
if (mysqli_num_rows($already_exist_query_run) > 0) {
    $_SESSION["error"] = "ID car no already in library. Please check.";
    header("Location: index.php");
    die();
}
$query     = insert_query("daily_records", $data);
$query_run = mysqli_query($conn, $query) or die(mysqli_error($conn));
if ($query_run) {
    $_SESSION["success"] = "Successfuly Added.";
    header("Location: index.php");
    die();
} else {
    $_SESSION["error"] = "Whoops! Something went wrong. Try again later.";
    header("Location: index.php");
    die();
}
