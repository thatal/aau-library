<?php
function getFormValue(String $field_name)
{
    if (isset($_REQUEST[$field_name]) && trim($_REQUEST[$field_name]) != "") {
        return $_REQUEST[$field_name];
    }
    return null;
}
function generateForInsertion(array $lists)
{
    $query = "";
    $query .= "(`" . implode("`,`", array_keys($lists)) . "`)";
    $query .= " VALUES ('" . implode("','", array_values($lists)) . "')";
    return $query;
}
function insert_query($table_name = null, array $data)
{
    return "INSERT INTO {$table_name} " . generateForInsertion($data);
}
