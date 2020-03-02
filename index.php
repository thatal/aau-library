<?php 
    require_once "includes/header.php";
?>

<div class="container">
    <h3>
    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
     Active List <span class="pull-right"><button class="btn btn-md btn-success" onClick="addMore(this)">
     <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
      Add More</button></span></h3>
    <?php include "includes/records.php";?>
</div>

<div class="modal fade" id="add-more">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Student/Employee</h4>
            </div>
            
            <form action="" method="POST" role="form">
                <div class="modal-body">
                    
                    <div class="form-group">
                        
                        <div class="radio">
                            <label>
                                <input type="radio" name="type" id="input" value="student" required checked="checked">
                                Student
                            </label>
                            <label>
                                <input type="radio" name="type" id="input" value="employee" required>
                                Employee
                            </label>
                        </div>
                        
                    </div>
                    <div class="form-group">                        
                        <div class="input-group">                            
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-barcode" aria-hidden="true"></span>
                            </div>
                            
                            <input type="text" class="form-control required" required id="barcode" placeholder="Scan Barcode">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-large btn-block btn-danger">Verify</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    addMore = function(obj){
        console.log("adMore")
        var $modal = $("#add-more");
        $modal.find("select, input").val("");
        $modal.find("input[type='checkbox'],input[type='radio']").prop({
            "checked"   : false
        });
        $modal.modal();
        $modal.find("#barcode").focus();
    }
</script>
<?php 
    require_once "includes/footer.php";
?>