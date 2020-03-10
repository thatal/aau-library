<?php
    // $query is passed from parrent file where this file is included.
    // $conn is passed from parrent file where this file is included.
    if(!isset($query)){
        die("<h2 class='text-danger text-center'>query not found.</h2>");
    }
    $query_run  = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Designation/Roll No</th>
                    <th>Type</th>
                    <th>Entry Time</th>
                    <th>Exit Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(mysqli_num_rows($query_run) > 0):
                        $counter = 1;
                        while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <tr>
                    <td><?= $counter;?></td>
                    <td><?= $row["name"] ?? "NA";?></td>
                    <td><?= $row["user_type"] == "student" ? $row["roll_no"] ?? "NA": $row["designation"] ?? "NA";?></td>
                    <td><?= ucwords($row["user_type"]);?></td>
                    <td><?= date("d/m/Y h:i a",strtotime($row["entry_date_time"]));?></td>
                    <td>
                        <?php
                            if($row["exit_date_time"]){
                                echo date("d/m/Y h:i a",strtotime($row["entry_date_time"]));
                            }else{
                                echo '<button class="btn btn-primary btn-sm">Exit</button>';
                            }
                        ?>
                    </td>
                </tr>
                <?php
                        }
                    else:
                ?>
                <tr>
                    <td colspan="6">
                        <h4 class="text-danger text-center">Sorry! No records found.</h4>
                    </td>
                </tr>
                <?php
                    endif;
                ?>
            </tbody>
        </table>
    </div>