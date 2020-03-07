<?php
require_once "includes/header.php";
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
                    
                    <input type="date" name="date_from" id="input_date_from" class="form-control" value="<?php echo (getFormValue("date_from"));?>" title="">
                    
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