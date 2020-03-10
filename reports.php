<?php
require_once "includes/common-functions.php";
require_once "includes/header.php";
$where_condition = "";
if(getFormValue("type")){
    $where_condition .= " user_type = '".getFormValue('type')."'";
}
if (!getFormValue("date_from") && !getFormValue("date_to")) {
    if ($where_condition != "") {
        $where_condition .= " AND";
    }
    $date_default = date("Y-m-d", strtotime(date("Y-m-d") . " -1 week"));    
    $where_condition .= " date(entry_date_time) >= '".$date_default."'";
}

if(getFormValue("date_from")){
    if($where_condition != ""){
        $where_condition .= " AND";
    }
    $where_condition .= " date(entry_date_time) >= '".getFormValue('date_from')."'";
}
if(getFormValue("id_card_no")){
    if($where_condition != ""){
        $where_condition .= " AND";
    }
    $where_condition .= " id_card_no LIKE '%".getFormValue('id_card_no')."%'";
}
if(getFormValue("date_to")){
    if ($where_condition  != "") {
        $where_condition .= " AND";
    }
    $where_condition .= " date(entry_date_time) <= '".getFormValue('date_to')."'";
}

if ($where_condition != "") {
    $where_condition .= " AND";
}

$query = "SELECT * FROM daily_records WHERE {$where_condition} exit_date_time is not null order by exit_date_time DESC";

?>
<div class="container-fluid">

    <div class="container">
        <h4>
        <span class="glyphicon glyphicon-filter" aria-hidden="true"></span>
         Filter</h4>

        <form action="" method="GET" role="form">
            <div class="row">
                <div class="col-md-3">
                    
                    <label for="type" class="control-label">
                    <span class="glyphicon glyphicon-barcode" aria-hidden="true"></span>
                     ID Card No</label>
                    
                    <input type="text" name="id_card_no" id="id_card_no" class="form-control" value="<?= getFormValue("id_card_no");?>" placeholder="ID CARD NO">
                    
                    
                    
                </div>
                <div class="col-md-3">
                    
                    <label for="type" class="control-label">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                     Type</label>
                    
                    <select name="type" id="type" class="form-control">
                        <option value="">-- Select One --</option>
                        <option value="employee" <?php if(getFormValue("type") == "employee") echo "selected"; ?>>Employee</option>
                        <option value="student"  <?php if (getFormValue("type") == "student") echo "selected"; ?>>Student</option>
                    </select>
                    
                    
                </div>
                <div class="col-md-3">
                    
                    <label for="type" class="control-label">
                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                     Entry Date From</label>
                    
                    <input type="date" name="date_from" id="input_date_from" class="form-control" value="<?php echo (getFormValue("date_from")? getFormValue("date_from") : $date_default);?>" title="">
                    
                </div>
                <div class="col-md-3">
                    
                    <label for="type" class="control-label">
                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                     Entry Date To</label>
                    
                    <input type="date" name="date_to" id="input_date_to" class="form-control" value="<?php echo (getFormValue("date_to"));?>" title="">
                    
                </div>
                <div class="col-md-3" style="margin-top: 25px;">
                    
                    <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                     Search</button>
                                        
                </div>
            </div>
            
        </form>

    </div>
    <hr>
    <div class="container">
        <h4>
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
         Library Register</h4>
        <?php
            include "includes/records.php";
        ?>
    </div>

</div>

<?php
require_once "includes/footer.php";
?>