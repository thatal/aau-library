<?php
    date_default_timezone_set("Asia/Kolkata");
    require_once "includes/common-functions.php";
    require_once "includes/connection.php";
    if(!getFormValue("type")){
        die('<span class="text-danger">Please select a user type.</span>');
    }
    if(!getFormValue("id_card_no")){
        die('<span class="text-danger">Please enter a valid id card no.</span>');
    }
    $query = "SELECT * FROM user_info where id_card_no = '".getFormValue("id_card_no")."' and type ='".getFormValue("type")."' limit 1";
    $query_run = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(!mysqli_num_rows($query_run)){
        die('<span class="text-danger">Records not found.</span>');
    }
    $row = mysqli_fetch_assoc($query_run);
    echo json_encode($row);
?>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="input\u\1" class="form-control" value="<?= $row["name"]?>" required="required">
</div>
<div class="form-group">    
    <label for="name">Name</label>    
    <input type="text" name="name" id="input\u\1" class="form-control" value="<?= $row["name"]?>" required="required"> 
</div>
