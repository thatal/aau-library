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
                <div class="modal-body" id="modal-body">
                    
                    <div class="form-group">
                        
                        
                        <label for="type">Select User Type</label>
                        
                        <select name="type" id="type" class="form-control" required="required">
                            <option value="">--SELECT--</option>
                            <option value="student">Student</option>
                            <option value="employee">Employee</option>
                        </select>
                        
                        
                    </div>
                    <div class="form-group">                        
                        <div class="input-group">                            
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-barcode" aria-hidden="true"></span>
                            </div>
                            <input type="text" class="form-control required" required id="barcode" name="id_card_no" placeholder="Scan Barcode">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <button type="button" id="verify" class="btn btn-large btn-block btn-danger">Verify</button>
                    </div>
                    <div class="form-group" id="ajax-load">

                    </div>
                </div>
                <div class="modal-footer">
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
        // $modal.find("input[type='checkbox'],input[type='radio']").prop({
        //     "checked"   : false
        // });
        $modal.find("#ajax-load").html("");
        $modal.modal();
        $modal.find("#barcode").focus();
    }
    $(document).ready(function(){
        $("#verify").click(function() {
            $("#ajax-load").html("");
            $("#modal-body").block({ message: '<h4>Please wait...</h4>', css: { border: '3px solid #a00' } });
            var data = $(this).parents("form").serialize();
            var xhr = $.get("ajax-data.php",data);
            xhr.fail(function(){
                $("#modal-body").unblock();
                alert("Failed");
            })
            xhr.done(function(response) {
                $("#ajax-load").html(response);
                console.log(response);
                $("#modal-body").unblock();
            });
        });
    });
</script>
<?php 
    require_once "includes/footer.php";
?>