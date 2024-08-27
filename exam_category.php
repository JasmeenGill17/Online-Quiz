<?php 
include "header.php";
include "connection.php";
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>ADD EXAM</h1>
                    </div>
                </div>
            </div>
           
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
            <div class="col-lg-6">
                        <div class="card">
                            <form name="form1" action="" method="post">
                            <div class="card-header"><strong>Add Exam</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">New Exam Category</label><input type="text" name="examname" placeholder="Add exam category" class="form-control"></div>
                                <div class="form-group"><label for="vat" class=" form-control-label">Exam Time in Minutes</label><input type="text" name="examtime" placeholder="Exam Time in Minutes" class="form-control"></div>
                                <div class="form-group">
                                    <input class="btn btn-success" type="submit" name="submit1" value="Add Exam" >
                                </div>
                            </div>  
            </div>
        </div>                        
        
        <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">EXAM CATEGORIES</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Exam Name</th>
                                            <th scope="col">Exam Time</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $count=0;
                                    $res=mysqli_query($link,"select * from exam_category");
                                    while($row=mysqli_fetch_array($res)){
                                        $count=$count+1;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $count; ?></th>
                                                <td><?php echo $row["category"]; ?></td>
                                                <td><?php echo $row["exam_time_in_minutes"]; ?></td>
                                                <td><a href="edit_exam.php? id=<?php echo $row["id"]; ?>">EDIT</a></td>
                                                <td><a href="delete.php? id=<?php echo $row["id"]; ?>"> DELETE</a></td>
                                            </tr>
                                        <?php
                                    }
                                    ?>

                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </form>

<?php

if(isset($_POST["submit1"])){
    mysqli_query($link,"insert into exam_category(id,category,exam_time_in_minutes) values(NULL,'$_POST[examname]','$_POST[examtime]')") or die(mysqli_error($link));

    ?>
    <script type="text/javascript">
        alert("WOW! Exam Added Successfully");
        window.location.href=window.location.href;
    </script>
    <?php
}

?>

<?php include "footer.php";?>