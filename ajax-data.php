<?php
    date_default_timezone_set("Asia/Kolkata");
    require_once "includes/common-functions.php";
    require_once "includes/connection.php";
    sleep(1);
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
?>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="<?= $row["name"]?>" required="required" readonly>
</div>

<?php if($row["type"] == "employee"):?>
    <div class="form-group">    
        <label for="designation">Designation</label>    
        <input type="text" name="designation" id="designation" class="form-control" value="<?= $row["designation"]?>" readonly required="required"> 
    </div>
<?php else: ?>
    <div class="form-group">    
        <label for="roll_no">Roll No</label>    
        <input type="text" name="roll_no" id="roll_no" class="form-control" value="<?= $row["roll_no"]?>" readonly required="required"> 
    </div>
<?php endif; ?>
    <div class="form-group">    
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>